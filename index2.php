<?php
require_once('config.php');
require_once('core/controller.Class.php');
include('server.php');
include('uploadagain.php')
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
        
        <?php } ?>
    </div>
</body>
</html>



<!-- <button type="submit" class="btn btn-primary" name="login_user">Login</button>
            <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
            <p>Not yet a member?<a href="register.php">&nbsp Sign up &nbsp</a></p> -->