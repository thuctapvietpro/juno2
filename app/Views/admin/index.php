<?php $this->render('layout/backend/head'); ?>
    <div class="row">
    	<div class="col-sm-12">

    		<?php if (isset($session['success'])) { ?>
    			<div class="alert alert-success"><?php echo $session['success']; ?></div>
    			<?php unset($_SESSION['success']); ?>
    		<?php } ?>
        	<?php if (isset($session['err'])) { ?>
    			<div class="alert alert-danger"><?php echo $session['err']; ?></div>
    			<?php unset($_SESSION['err']); ?>
    		<?php } ?>

        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">#</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Username</td>
                    <td width="25%">Email</td>
                    <!-- <td width="5%">Level</td> -->
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
                
                
                <?php foreach ($user as $val): ?>
                	<tr>
	                	<td><?php echo $val['userid']; ?></td>
	                    <td><?php echo $val['fullname']; ?></td>
	                    <td><?php echo $val['username']; ?></td>
	                    <td><?php echo $val['email']; ?></td>
	                    <!-- <td><?php echo $val['userid']; ?></td> -->
	                    <td><a class="btn btn-primary"" href="index.php?controller=admin&action=edit&id=<?php echo $val['userid']; ?>">Edit</a></td>
	                    <td><a class="btn btn-warning" href="index.php?controller=admin&action=delete&id=<?php echo $val['userid']; ?>">Delete</a></td>
                	</tr>
                <?php endforeach; ?>
                
               
			</table>
            <div aria-label="Page navigation">
            	<ul class="pagination">
                	<!-- <li>
                    	<a aria-label="Previous" href="#">
                        	<span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li>
                    	<a href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      					</a>
      				</li> -->
      				<?php echo $pagi; ?>
                </ul>
            </div>
        </div>
    </div>
<?php $this->render('layout/backend/foot'); ?>
