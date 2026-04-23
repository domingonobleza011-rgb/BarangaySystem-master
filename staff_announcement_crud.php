<?php
   // Force errors to show so we can see the real problem
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
   require('classes/resident.class.php');
   
   $userdetails = $bmis->get_userdata();
   $bmis->validate_staff(); // Assuming this checks for authorized staff/admin
   
   // Handle Post Actions first
   if(isset($_POST['create_announce'])) {
       $bmis->create_announcement();
   }

   if(isset($_POST['delete_announcement'])) {
       $bmis->admin_delete_announcement();
   }

   // Fetch data AFTER actions
   $view = $bmis->view_announcement(); 
   $announcementcount = $bmis->count_announcement();

   $dt = new DateTime("now", new DateTimeZone('Asia/Manila'));
   $cdate = $dt->format('Y/m/d');   
?>

<?php include('dashboard_sidebar_start_staff.php'); ?>

<div class="container">
    <div class="row"> 
        <div class="col-md-12"> 
            <h1 class="mb-4 text-center">Event Announcement Page</h1>
        </div>
    </div>

    <hr><br>
      
    <div class="row"> 
        <div class="col-sm-6"> 
            <div class="card">
                <div class="card-header bg-primary text-white" style="font-size: 20px;"> Event Announcement Form </div>
                <div class="card-body">
                    <form method="post">
                        <div class="row"> 
                            <div class="col">
                                <h6><i class="fas fa-bullhorn"></i> Announcement Message</h6>
                                <br>
                                <textarea name="event" class="form-control" rows="6" placeholder="Enter Message Here" required></textarea>
                            </div>
                        </div>

                        <br><hr>

                        <div class="row"> 
                            <div class="col"> 
                                <input type="hidden" name="start_date" value="<?= $cdate?>">
                                <input name="addedby" type="hidden" value="<?= $userdetails['surname'] ?? $userdetails['lname']?>, <?= $userdetails['firstname'] ?? $userdetails['fname']?>">
                                <button type="submit" name="create_announce" class="btn btn-primary" style="margin-left: 34%; border-radius: 15px; width: 150px; font-size: 18px;"> Submit Entry </button>
                            </div>
                        </div>       
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6"> 
            <div class="card">
                <div class="card-header bg-info text-white" style="font-size: 20px;"> Current Announcement Posted </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead> 
                            <tr>
                                <th> Actions </th>
                                <th> Announcement </th>
                                <th> Date Posted </th>
                                <th> Added By </th>        
                            </tr>
                        </thead>
                        <tbody> 
                            <?php if(!empty($view) && is_array($view)): ?>
                                <?php foreach($view as $row): ?>
                                    <tr>
                                        <td>    
                                            <form action="" method="post">
                                                <input type="hidden" name="id_announcement" value="<?= $row['id_announcement'];?>">
                                                <button class="btn btn-danger" type="submit" name="delete_announcement"> Remove </button>
                                            </form>
                                        </td>
                                        <td> <?= htmlspecialchars($row['event']);?> </td>
                                        <td> <?= $row['start_date'];?> </td>
                                        <td> <?= htmlspecialchars($row['addedby']);?> </td>              
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="4">No announcements found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="row"> 
        <div class="col">             
            <div class="card">
                <div class="card-header bg-success text-white" style="font-size: 20px;"> Current Announcement Output </div>
                <div class="card-body">
                    <?php if (!empty($view)): ?>
                    <div class="alert alert-info alert-dismissible fade show" 
                        style="border-radius:30px; margin: 0 auto; width:75%; height:auto; min-height:180px; color: white; background-color:#3498DB;" role="alert">
                        <strong><h4>ANNOUNCEMENT!<h4><hr></strong> 
                        <br> 
                        <p> <?= htmlspecialchars($view[0]['event']); ?> </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

<?php include('dashboard_sidebar_end.php'); ?>
