<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Group34 Airlines</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>




<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">CS306 Group34 Airlines</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="trigger-btn" data-toggle="modal" href="#signupModal">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="trigger-btn" data-toggle="modal" href="#loginModal">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal HTML -->
<div id="loginModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <form action="methods2.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" required="required" name="username">
                    </div>
                    <div class="form-group">
                        <div class="clearfix">
                            <label>Password</label>
                            <a href="#" class="float-right text-muted"><small>Forgot?</small></a>
                        </div>

                        <input type="password" class="form-control" required="required" name="password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>



<div id="signupModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <form action="methods.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" required="required" name="email">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required="required" name="name">
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" required="required" name="surname">
                    </div>
                    <div class="form-group">
                        <label>Telephone Number</label>
                        <input type="text" class="form-control" required="required" name="telnum">
                    </div>
                    <div class="form-group">
                        <label>SSN</label>
                        <input type="text" class="form-control" required="required" name="ssn">
                    </div>

                    <div class="form-group">
                        <div class="clearfix">
                            <label>Password</label>
                            <a href="#" class="float-right text-muted"><small>Forgot?</small></a>
                        </div>

                        <input type="password" class="form-control" required="required" name="pswd">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- GIDIS GELIS -->
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">CS306 Group34 Airlines</h1>
            <h2 class="masthead-subheading mb-0">Will Make You Fly!</h2>
            <!-- YENI -->
            <div id="oneway">
                <form role="form" action="SearchResultOneway.php" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="from">From:</label>
                            <input type="text" class="form-control" id="from" name="from" placeholder="City or Code" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="to">To:</label>
                            <input type="text" class="form-control" id="to" name="to" placeholder="City or Code" required>
                        </div>
                    </div>
                    <hr >
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="depart">Depart:</label>
                            <input type="date" class="form-control" id="depart" name="depart" required>
                        </div>
                    </div>
                    <div class="row">
                        <hr >
                        <div class="col-sm-6">
                            <label for="class">Class:</label>
                            <select class="form-control" name="class">
                                <option value="Economy">Economy</option>
                                <option value="Business">Business</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="stop" value="nonstop" checked>Non-Stop
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="stop" value="1stop">1 Stop
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="btn-group">
                            <button type="reset"  class="btn btn-info" value="Reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</header>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="img/01.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">For those about to FLY...</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; CS306 Group34 2020<br>Yagiz Ismet Ugur<br>Ozgur Idis<br>Mahmut Aydiz<br>Umut Bakici</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

