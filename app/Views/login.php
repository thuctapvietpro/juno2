<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang đăng nhập</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#login{
	float:none;
	margin:50px auto;}
</style>
</head>
<body>

<div class="container">
	<div class="row">
    	<div id="login" class="col-xs-4">
        	<!-- <div class="alert alert-success">Logined success!</div> -->
            <?php if (isset($err)) { ?>
            <div class="alert alert-danger"><?php echo $err; ?></div>
            <?php } ?>
        	<form method="post" action="index.php?&controller=login&action=login">
            	<div class="form-group">
                	<label>Username</label>
                    <input required type="text" name="user" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input required type="text" name="pass" class="form-control" placeholder="Password" />
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
