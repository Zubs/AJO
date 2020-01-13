<?php include 'header.php'; ?>
<?php

  session_start();

  $fullname = $_SESSION['fullname'];

?>
<div class="jumbotron">
  <div class="jumbotron">
    <h2 class="page-header">Welcome, <?php echo $fullname; ?><a href="profile.php"><i class="fas fa-user-shield fa-2x" style="float: right;"></i></a></h2>
  </div>
  <div class="jumbotron">
    <div class="row">
      <div class="col-lg-4">
        <a href="collect.php"><i class="fas fa-money-bill-alt fa-10x"></i></a><br><br>
        <h3>Collect Payments</h3>
      </div>
      <div class="col-lg-4">
        <a href="newmember.php"><i class="fas fa-portrait fa-10x"></i></a><br><br>
        <h3>New Member</h3>
      </div>
      <div class="col-lg-4">
        <a href="newgroup.php"><i class="fas fa-users fa-10x"></i></a><br><br>
        <h3>New Group</h3>
      </div>
      <div class="col-lg-4">
        <a href="members.php"><i class="fas fa-user-edit fa-10x"></i></a><br><br>
        <h3>Manage Members</h3>
      </div>
      <div class="col-lg-4">
        <a href="groups.php"><i class="fas fa-tasks fa-10x"></i></a><br><br>
        <h3>Manage Groups</h3>
      </div>
      <div class="col-lg-4">
        <a href="https://google.com"><i class="fas fa-sign-out-alt fa-10x"></i></a><br><br>
        <h3>Log Out</h3>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>