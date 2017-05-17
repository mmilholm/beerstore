<?php

if(isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
	<button class="btn btn-info" name = "prod_id" type="submit" value="<?php echo $name['prod_id']; ?>"> Add </button>
		
<?php 

} else {

?>

<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $name['prod_id']; ?>">Add</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $name['prod_id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">WARNING!</h4>
        </div>
        <div class="modal-body">
          <p>You have have are not logged in. </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" formaction="login.php"> Log-in </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   
<?php } ?>