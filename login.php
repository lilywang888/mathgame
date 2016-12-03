<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Math Game</title>
    <link href="./Styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./Styles/mathgame.css" rel="stylesheet" media="screen">
</head>
<body>
    <?php
        $_SESSION['$allow'] = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((empty($_POST["email"])) || (empty($_POST["password"]))){
                $ErrMsg = "Invalid login credentials.";
            }
            elseif ((strcmp($_POST["email"],"a@a.a")==0) && (strcmp($_POST["password"],"aaa")==0)){
                $_SESSION['$allow'] = true;
                header("Location: index.php"); 
                die();
            }
            else {
                $ErrMsg = "Invalid login credentials.";
            }
        }
    
    ?>
    <div class="container">
        <div class="row">
             <div class="col-sm-12 title"><h1>Please login to play math game!</h1></div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-4 text-right">Email:</div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" size="6">
                </div>
                <div class="col-sm-5"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 text-right">Password:</div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" size="6">
                </div>
                <div class="col-sm-5"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
        <div class="row errmsg"><?php echo $ErrMsg;?></div>
    </div>
</body>
</html>