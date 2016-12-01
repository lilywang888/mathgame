<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Math Game</title>
    <link href="./Styles/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="container">
        <div class="row">
             <div class="col-sm-10 col-sm-offset-1"><h1>Please login to play math game!</h1></div>
             <div class="col-sm-1"></div>
        </div>
        <form action="http://1536.azurewebsites.net/authenticate.php" method="post" role="form" class="form-horizontal">
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
        <div class="row"></div>
    </div>
</body>
</html>