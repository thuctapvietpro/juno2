<?php $this->render('layout/backend/head'); ?>
    <div class="row">
    	<div class="col-sm-6">
        	<?php if (isset($err)){ ?>
            <div class="alert alert-danger"> <?php echo $err; ?> </div>
            <?php } ?>
        	<form method="post">
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                	<label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <input type="submit" name="add" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
    </div>
<?php $this->render('layout/backend/foot'); ?>
