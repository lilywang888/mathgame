<!DOCTYPE html>
<?php session_start();echo "<script>location.href='login.php'</script>";?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Math Game</title>
    <link href="./Styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./Styles/mathgame.css" rel="stylesheet" media="screen">
</head>
<body>
    <?php 
        if(isset($_SESSION['$count']))
             $_SESSION['$count']++;
        else
             $_SESSION['$count'] = 0;
         
         
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["result"])) {
                if(isset($_SESSION['$ErrMsg']))
                    $_SESSION['$ErrMsg']="Please enter result";
                else
                    $_SESSION['$ErrMsg']="";
            }
            elseif (!is_numeric($_POST["result"])) {
                if(isset($_SESSION['$ErrMsg']))
                    $_SESSION['$ErrMsg']="Please enter a number";
                else
                    $_SESSION['$ErrMsg']="";
            }
            elseif ($_SESSION['pr'] != $_POST["result"]) { 
                if(isset($_SESSION['$ErrMsg']))
                    $_SESSION['$ErrMsg']= "INCORRECT, " .$_SESSION['num1'] .$_SESSION['operatorstr'] .$_SESSION['num2'] ." is " 
                    .$_SESSION['pr'];
                else
                    $_SESSION['$ErrMsg']="";
            }
            else {
                if(isset($_SESSION['$countCorrect']))
                    $_SESSION['$countCorrect']++;
                else
                    $_SESSION['$countCorrect'] = 0;
                
                if(isset($_SESSION['$ErrMsg']))
                    $_SESSION['$ErrMsg']="Correct";
                else
                    $_SESSION['$ErrMsg']="";
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
                <div class="col-sm-2">
                    <?php 
                        $num1 = rand(0,20);
                        $_SESSION['num1'] = $num1; 
                        echo $num1;
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php 
                          $operator = rand(0,1);
                          $_SESSION['operator'] = $operator; 
                          if ($operator == 0) {
                             echo "+";
                          }
                          else {
                             echo "-";
                          }
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php 
                        $num2 = rand(0,20);
                        $_SESSION['num2'] = $num2; 
                        echo $num2;
                        if ($operator == 0) {
                             $_SESSION['operatorstr'] = "+";
                             $_SESSION['pr'] = $num1 + $num2; 
                          }
                          else {
                             $_SESSION['operatorstr'] = "-";
                             $_SESSION['pr'] = $num1 - $num2;
                          }
                    ?>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="result" name="result" placeholder="Enter answer" size="6">
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
        
        <div class="row errmsg"> <?php echo $_SESSION['$ErrMsg'];?> </div>
        <div class="score"> <?php echo "Score " .$_SESSION['$countCorrect'] ."/" .$_SESSION['$count'];?> </div>
       
    </div>
</body>
</html>