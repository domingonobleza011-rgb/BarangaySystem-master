<?php 
session_start();
require_once 'classes/main.class.php';
$main = new BMISClass();

$userdetails = $_SESSION['userdata'];
$resident_id = $userdetails['id_resident']; 

if (isset($_POST['send_to_admin'])) {
    $message_content = $_POST['admin_message_text'];
    
    // We call a new function in your class
    if ($main->sendMessageToAdmin($resident_id, $message_content)) {
        echo "<script>alert('Message sent to Admin!'); window.location.href='resident_messages.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: Could not send message.');</script>";
    }
}
if (!isset($_SESSION['userdata']['id_resident'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['delete_msg'])) {
    // This matches the 'name' attribute in your form
    $id_msg = $_POST['id_msg']; 
    
    // This calls the function you just fixed in main.class.php
    if ($main->deleteResidentMessage($id_msg)) { 
        echo "<script>alert('Message deleted successfully'); window.location.href='resident_messages.php';</script>";
        exit();
    }
}
$messages = $main->getResidentMessages($resident_id);
?>

<!DOCTYPE html> 
<html>
<head> 
    <title>Messages - Barangay San Pedro Iriga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color: #f8f9fa;"> 

    <nav class="navbar navbar-dark bg-primary sticky-top">
        <a class="navbar-brand" href="resident_homepage.php" style="margin-left: 20px;">Barangay San Pedro Management System</a>
        <div class="dropdown ms-auto" style="margin-right: 20px;">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <?php echo $userdetails['surname'] . ", " . $userdetails['firstname']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="resident_profile.php?id_resident=<?php echo $userdetails['id_resident'];?>"><i class="fas fa-user"></i> Profile</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="header text-center mb-5">
            <div class="text-end mb-3">
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
    Message Admin
</button>
</div> 
            <h2 class="fw-bold text-dark">Official Messages</h2>
            <p class="text-muted">Direct messages from the Barangay Administration.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light text-primary">
                                    <tr>
                                        <th class="py-3 px-4">Date Sent</th>
                                        <th class="py-3">Message</th>
                                        <th class="py-3 px-4 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php if(!empty($messages)): ?>
        <?php foreach($messages as $msg): ?>
            <?php 
                // This line automatically finds the right ID column name
                $actual_id = isset($msg['id_msg']) ? $msg['id_msg'] : (isset($msg['id_message']) ? $msg['id_message'] : null);
            ?>
            <tr>
                <td class="px-4 align-middle">
                    <small class="fw-bold"><?php echo date('M d, Y', strtotime($msg['date_sent'])); ?></small>
                </td>
                <td class="align-middle">
                    <span class="text-truncate d-inline-block" style="max-width: 300px;">
                        <?php echo htmlspecialchars($msg['message_text']); ?>
                    </span>
                </td>
                <td class="px-4 text-end align-middle">
                    <?php if($actual_id): ?>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-2" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#viewMsg<?php echo $actual_id; ?>">
                                Read Full
                            </button>
                            <form action="" method="POST" class="d-inline m-0" onsubmit="return confirm('Delete permanently?');">
                                <input type="hidden" name="id_msg" value="<?php echo $actual_id; ?>">
                                <button type="submit" name="delete_msg" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    <?php else: ?>
                        <span class="text-danger small">ID Error: Check DB column name</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" class="text-center py-5 text-muted">No messages found.</td>
        </tr>
    <?php endif; ?>
</tbody>
                            </table>
                        </div>
                    </div>
                </div>
<div class="text-center mt-4">
        <a href="resident_homepage.php" class="btn btn-light rounded-pill px-4 shadow-sm border">Back</a>
    </div>

    <?php if(!empty($messages)): ?>
        <?php foreach($messages as $msg): ?>
            <?php 
                // Ensure this matches the logic in your table row
                $actual_id = isset($msg['id_msg']) ? $msg['id_msg'] : (isset($msg['id_message']) ? $msg['id_message'] : null); 
            ?>
            
            <div class="modal fade" id="viewMsg<?php echo $actual_id; ?>" tabindex="-1" aria-labelledby="label<?php echo $actual_id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow border-0" style="border-radius: 15px;">
                        <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                            <h5 class="modal-title" id="label<?php echo $actual_id; ?>">
                                <i class="fas fa-envelope-open-text me-2"></i> Message Details
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge bg-light text-dark border">
                                    <i class="far fa-calendar-alt me-1"></i> 
                                    <?php echo date('F j, Y', strtotime($msg['date_sent'])); ?>
                                </span>
                                <span class="badge bg-light text-dark border">
                                    <i class="far fa-clock me-1"></i> 
                                    <?php echo date('h:i A', strtotime($msg['date_sent'])); ?>
                                </span>
                            </div>
                            <div class="p-3 bg-light rounded" style="min-height: 100px; white-space: pre-wrap;">
                                <?php echo htmlspecialchars($msg['message_text']); ?>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<div class="modal fade" id="sendMessageModal" tabindex="-1" aria-labelledby="sendLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow border-0" style="border-radius: 15px;">
                <form action="" method="POST">
                    <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                        <h5 class="modal-title" id="sendLabel">
                            <i class="fas fa-paper-plane me-2"></i> New Message to Admin
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Concern/Message</label>
                            <textarea name="admin_message_text" class="form-control" rows="5" placeholder="Describe your concern..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="send_to_admin" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            Send to Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>