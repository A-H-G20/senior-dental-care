<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <div class="container">

	<div class="row">	
						<div class="span3">
						<?php include('sidebar.php'); ?>
						</div>
						<div class="span9">
							<img src="../img/dr.jpg" class="img-rounded">
								<?php include('navbar_dasboard.php') ?>
						    <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Doctors Table</strong>
                            </div>
							<?php include('add_doctor.php');?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                            
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Major</th>  
                                        <th>Logo</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($conn,"select * from doctor")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['doctor_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                     <td><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
                                    
                                     <td><?php echo $row['major']; ?></td> 
                                     <td><img src="http://localhost/apr/admin/images/<?php echo $row['image'] ?>" alt="" height="30" width="30"></td>
                                    <td width="10">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                     
                                        <?php include('delete_doctor.php'); ?>
                                    <?php include('edit_doctor.php'); ?>
									</td>
									<?php include('toolttip_edit_delete.php'); ?>
									</tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
                            <div>
                                
                            </div>
							
<script type="text/javascript">
        $(document).ready( function() {
            $('.btn-danger').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Data?")){
                    $.ajax({
                        type: "POST",
                        url: "delete_service.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                        $(".del"+id).fadeOut('slow'); 
                        } 
                    }); 
                }else{
                    return false;}
            });				
        });
    </script>

						</div>
    </div>
<?php include('footer.php') ?>