<?php
require('../utility/utility.php');
if (isset($_SESSION['IS_LOGIN_ADMIN'])) {
    redirect('index.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="css/animate.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row py-5 mt-4 align-items-center">
                <!-- For Demo Purpose -->
                <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                    <img src="assets/images/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block" />
                    <h1>Log Into Your Account</h1>
                </div>
                <div class="col-md-7 col-lg-6 ml-auto">
                    <form action="" id="frm">
                        <div class="row">
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="
                      input-group-text
                      bg-white
                      px-4
                      border-md border-right-0
                    ">
                                        <i class="fa fa-envelope text-muted"></i>
                                    </span>
                                </div>
                                <input id="seller_email" type="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" />
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="
                      input-group-text
                      bg-white
                      px-4
                      border-md border-right-0
                    ">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="seller_password" type="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" />
                            </div>
                            <div class="form-group col-lg-12 mx-auto mb-3">
                                <input class="btn btn-block py-2 font-weight-bold" id="seller_login" value="Submit" style="background-color: #556ee6; color: #fff;" onclick="checklogin()" readonly />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/script.js"></script>
    </body>

    </html>

<?php
}
?>