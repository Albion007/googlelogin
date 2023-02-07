<?php
require_once('config.php');
require_once('core/controller.Class.php');
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:100px;">
    <?php if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                echo $Controller -> printData(intval($_COOKIE['id']));
                echo '<a href="logout.php">Logout</a>';
            }
            
        }else{ ?>
        <img src="img/gmail.png" alt="Logo" style="display: table; margin: 0 auto; max-width: 150px;" />
        
        <form action='index.php' method="POST">
        <?php include('errors.php'); ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="login_user">Login</button>
            <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
            <p>Not yet a member?<a href="register.php">&nbsp Sign up &nbsp</a></p>
        </form>
        
        <?php } ?>
    </div>
</body>
</html>



<!-- <button type="submit" class="btn btn-primary" name="login_user">Login</button>
            <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
            <p>Not yet a member?<a href="register.php">&nbsp Sign up &nbsp</a></p> -->