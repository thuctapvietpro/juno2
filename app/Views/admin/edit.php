<?php $this->render('layout/backend/head'); ?>
    <div class="row">
    	<div class="col-sm-6">
            <?php if (isset($err)){ ?>
        	<div class="alert alert-danger"> <?php echo $err; ?> </div>
            <?php } ?>
        	<form method="post">
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" value="<?php echo $user['fullname']; ?>" required />
                </div>
                <div class="form-group">
                	<label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $user['username']; ?>" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" value="<?php echo $user['password']; ?>" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email"  value="<?php echo $user['email']; ?>" required />
                </div>
                <!-- <div class="form-group">
                	<label>Level</label>
                    <select name="level" class="form-control">
                    	<option value="1">Admin</option>
                        <option value="2">Mod</option>
                        <option value="3" selected="selected">User</option>
                    </select>
                </div> -->
                <input type="submit" name="edit" value="Sửa" class="btn btn-primary" />
            </form>
        </div>
    </div>
<?php $this->render('layout/backend/foot'); ?>
