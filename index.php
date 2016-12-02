<!DOCTYPE html>
<?php session_start(); 
    if(isset($_SESSION['pr']))
      $_SESSION['pr']=$r;
    else
      $_SESSION['pr']=0;
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Math Game</title>
    <link href="./Styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./Styles/mathgame.css" rel="stylesheet" media="screen">
</head>
<body>
    <?php 
        $num1 = rand(0,20);
        $num2 = rand(0,20);
        $r = 0;
        $operator = rand(0,1);
        $operatorStr ="";
        switch ($operator)
        {
            case 0:
                $operatorStr = "+";
                $r = $num1 + $num2;
                break;
            case 1:
                $operatorStr = "-";
                $r = $num1 - $num2;
                break;
            /*case 2:
                $operatorStr = "*";
                $r = $num1 * $num2;
                break;
            case 3:
                $operatorStr = "/";
                $r = $num1 / $num2;
                break;
            */
            default:
                $operatorStr = "+";
        }
        
        $ErrMsg = ""; 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["result"])) {
                $ErrMsg = "Please enter result";
            }
            elseif (!is_numeric($_POST["result"])) {
                $ErrMsg = "Please enter a number";
            }
            elseif ($pr != $_POST["result"]) {
                $ErrMsg = "INCORRECT," . $num1 . "  " . $operatorStr . "  " . $num2 . " is " . $r;
            }
            else {
                $ErrMsg = "Correct";
            }

        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >  
                <hr/>  
                <button class="btnlogout" onclick="location.href='login.php'" >Logout</button>      
            </div>   
        </div>
        
        <div class="row">
             <div class="col-sm-6 col-sm-offset-3 title"><h1>Math Game</h1></div>        
             <div class="col-sm-3"></div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2"><?php echo $num1; $Snum1 = $num1?></div>
                <div class="col-sm-2"><?php echo $operatorStr?></div>
                <div class="col-sm-2"><?php echo $num2; $Snum2 = $num2?></div>
                <div class="col-sm-3"></div>
            </div>
        
            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="result" name="result" placeholder="" size="6">
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        <form>
        <div class="row"> <hr /> </div>
        
        <div class="row errmsg"> <?php echo $ErrMsg;?> </div>
       
    </div>
</body>
</html>