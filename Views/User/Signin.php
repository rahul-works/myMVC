<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='/Assets/Css/Signin.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                EQUITY PORTFOLIO
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form action="/User/signin" method="POST">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                            </div>
                            <div class="col-lg-12 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
</body>
</html>
