<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-add']))
{
  //echo '<pre>';
  global $wpdb;
  $message = "";
  $status = "";
//print_r($_POST);
$name = sanitize_text_field($_POST['name']);
$email = sanitize_text_field($_POST['email']);
$phone = sanitize_text_field($_POST['phone']);
$gender = sanitize_text_field($_POST['gender']);
$designation = sanitize_text_field($_POST['designation']);

$sql = $wpdb->insert("{$wpdb->prefix}ems_form_data",array(
  "name" => $name,
  "email" => $email,
  "phone" => $phone,
  "gender" => $gender,
  "designation" => $designation,
));
$last_inserted = $wpdb->insert_id;
if($last_inserted > 0)
{
  $message =  'record saved';
  $status = 1;
}
else
{ 
  $message = 'failed';
  $status = 0;
}
}
?>
<?php
if(!empty($message))
{
  if($status == 1)
  {
    ?>
    <div class="alert alert-success"><?=$message;?></div>
    <?php
  }
  else
  {
    ?>
    <div class="alert alert-danger"><?=$message;?></div>
    <?php 
  }
}
?>
<div class="container">
  <div class="row"><div class="col-sm-8">
  <h2>Add Employee</h2>

  <div class="panel panel-primary">
    <div class="panel-body">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?page=add-employee" method="post">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="email">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter email" name="phone">
    </div>  
    <div class="form-group">
      <label for="email">Gender:</label>
      <select name="gender" class="form-control">
        <option value="male">Male</option>
        <option value="female">Female</option>

</select>
    </div>  
    <div class="form-group">
      <label for="email">Designation:</label>
      <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation">
    </div>    
    <button type="submit" name="btn-add" class="btn btn-success">Submit</button>
  </form>
</div>
  </div>
</div>
</div>
</div>

