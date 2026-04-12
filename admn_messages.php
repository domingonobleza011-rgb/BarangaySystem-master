<?php
// 1. Setup and initialization
require_once 'classes/main.class.php'; 
$systemObject = new BMISClass();
$userdetails = $bmis->get_userdata(); 

if (isset($_POST['delete_msg'])) {
    $id = $_POST['id_admin_msg'];
    
    if ($systemObject->deleteMessage($id)) {
        // Redirect back to the messages page with a success message
        header("Location: admn_messages.php?status=deleted");
    } else {
        header("Location: admn_messages.php?status=error");
    }
    exit();
}

// 2. Fetch messages
$messages = $systemObject->viewMessages();
?>
<?php 
    include('dashboard_sidebar_start.php');
?>
<!DOCTYPE html> 
<html>
<head> 
    <title>Messages - Barangay San Pedro Iriga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
</head>
<div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Resident Messages</h2>
    
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">
            <table class="table table-hover text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3">Resident Name</th>
                        <th class="py-3">Message Preview</th>
                        <th class="py-3">Date Sent</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($messages)): ?>
                        <?php foreach ($messages as $msg): ?>
                            <tr>
                                <td class="align-middle">
                                    <?= htmlspecialchars($msg['fname'] . ' ' . $msg['lname']); ?>
                                </td>
                                
                                <td class="align-middle text-muted">
                                    <?= htmlspecialchars(substr($msg['message_text'], 0, 40)); ?>...
                                </td>
                                
                                <td class="align-middle">
                                    <?= date('M d, Y | h:i A', strtotime($msg['date_sent'])); ?>
                                </td>
                                
                               <td class="align-middle">
    <form action="delete_message.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
        <input type="hidden" name="id_admin_msg" value="<?= $msg['id_admin_msg']; ?>">
        <button type="submit" name="delete_msg" class="btn btn-danger btn-sm rounded-pill px-3">
            <i class="bi bi-trash-fill me-1"></i> Delete
        </button>
    </form>
</td>
                                
                                <td class="align-middle">
                                    <button class="btn btn-info btn-sm rounded-pill px-3 fw-bold" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#viewMsg<?= $msg['id_admin_msg']; ?>">
                                        <i class="bi bi-eye-fill me-1"></i> View
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="viewMsg<?= $msg['id_admin_msg']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-4">
                                        <div class="modal-header bg-info text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold">Message from <?= htmlspecialchars($msg['fname']); ?></h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4 text-start">
                                            <label class="text-muted small fw-bold">FULL NAME</label>
                                            <p class="h6 mb-3"><?= htmlspecialchars($msg['fname'] . ' ' . $msg['lname']); ?></p>
                                            
                                            <label class="text-muted small fw-bold">DATE RECEIVED</label>
                                            <p class="h6 mb-3"><?= date('F j, Y, g:i a', strtotime($msg['date_sent'])); ?></p>
                                            
                                            <hr>
                                            
                                            <label class="text-muted small fw-bold">MESSAGE CONTENT</label>
                                            <div class="bg-light p-3 rounded-3 mt-1">
                                                <?= nl2br(htmlspecialchars($msg['message_text'])); ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="py-5 text-muted fst-italic">No messages found in the records.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
<!-- responsive tags for screen compatibility -->
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<!-- custom css --> 
<link href="../BarangaySystem/customcss/regiformstyle.css" rel="stylesheet" type="text/css">
<!-- bootstrap css --> 
<link href="../BarangaySystem/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"> 
<!-- fontawesome icons -->
<script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
<script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
