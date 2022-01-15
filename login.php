<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Colossus Aquatic</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-10">

                <div class="card o-hidden border-1 shadow-lg my-5">
                    <div class="card-body p-1">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-1 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5 ">
                                    <div class="p-1">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-5">Selamat Datang</h1>
                                        </div>



                                        <form action="proses-login.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username..." required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password" required>
                                            </div>
                                            <div class="form-group">
                                                <a href="lupa_password.php ?>">Lupa Password</a>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary">login</button>

                                        </form>
                                        <hr>
                                        <!-- <div class="text-center"> 
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("img/Green-Branch-Background_1024.jpg", {
                speed: 500
            });
        </script>
</body>

</html>