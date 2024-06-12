<?php
global $wpdb;
$employees = $wpdb->get_results("select * from {$wpdb->prefix}ems_form_data",ARRAY_A);
//echo '<pre>';
//print_r($employees);
?>
<div class="container">
<div class="row"><div class="col-sm-10">
            
  <table class="table" id="tbl-employee">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Designation</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(count($employees) > 0)
      {
        foreach($employees as $employee)
        {
          echo '<tr><td>'.$employee['id'].'</td><td>'.$employee['name'].'</td><td>'.$employee['email'].'</td>
          <td>'.$employee['phone'].'</td><td>'.$employee['gender'].'</td>
          <td>'.$employee['name'].'</td><td><a href="javascript:void(0)" class="btn btn-warning">Edit</a>
           <a href="javascript:void(0)" class="btn btn-success">View</a><a href="javascript:void(0)" class="btn btn-danger">Delete</a></td></tr>';
        }
      }
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script src="<?php echo EMS_PLUGIN_URL; ?>assets/js/script.js"></script>


</body>
</html>
