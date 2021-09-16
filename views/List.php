<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view  User</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
      <div class="container">
      <a href="#" class="navbar brand">CRUD APPLICATION</a>

    </div>
    </div>
    <div class="container" style="padding-top:10px;">
    <div class="col-8"><h3>view User</h3></div>
   <div class="col-14">
   <div class="row">
      <div class="col-md-12">
      <?php
      $success=$this->session->userdata('success');
      if($success!=""){
        ?>
        <div class="alert alert-success"><?php echo $success;?></div>
        <?php
      }
      ?>

     <a href="<?php echo base_url().'index.php/user/create';?>" class="btn btn-primary">Create</a>
    <hr>
      <div class="col-md-12">
      <table class="table table-striped">
      <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
      
  
      <?php if(!empty($users))
      {foreach($users as $user){ 
          ?>
      <tr>
      <td><?php echo $user['user_id']?></td>
      <td><?php echo $user['name']?></td>
      <td><?php echo $user['email']?></td>
      


 <td>
  <a href="<?php echo  base_url().'index.php/user/edit/'.$user['user_id']?>" class="btn btn-secondary">Edit</a>
  </td>
  <td>
  <a href="<?php echo  base_url().'index.php/user/de/'.$user['user_id']; ?>" class="btn btn-danger">Delete</a>
  </td>
  </tr>
  <?php } } else { ?>
      <tr>
        <td colspan="$"> records not found</td>
        </tr>
        <?php } ?>
        


    
</body>
</html>
