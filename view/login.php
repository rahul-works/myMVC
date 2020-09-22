<html>
<head>
    <title>Login</title>
    <script src="../asset/js/jquery-3.5.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <link href="../asset/css/jquery.ui.css" type="text/css" rel="stylesheet" />
    <link href="../asset/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

</head>
<body>
    <div class="login-form">
        <form action="/login/record" method="get">
            <h2 class="text-center">Log in</h2>       
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required" name="user_name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required" name="pass_word">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div>        
        </form>
        <p class="text-center"><a href="#">Create an Account</a></p>
    </div>
</body>
</html>