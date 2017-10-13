<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="<?=base_url()?>assets/favicon.ico">

    <!-- Google Webfonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/icomoon.css">
    <!-- Simple Line Icons-->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/simple-line-icons.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css">
    <!-- Salvattore -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/salvattore.css">
    <!-- Theme Style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <!-- Modernizr JS -->
    <script src="<?=base_url()?>assets/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>assets/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body{
            margin-top: 65px !important;
        }
        #btnsearch{

        }
        .design{
            border: 2px outset #005500;
            box-shadow: inset #000000;
        }
        #log{
            color: #ffffff !important;
            border-radius: 0px !important;
            background-color: #005500 !important;

        }
        .navbar{
            background-color: #005500 !important;
        }

        .navbar a{
            color: #ffffff !important;
        }
        .navbar a:hover{
            color: #eee8d5 !important;
        }

        .navbar-brand{
            color: #ffffff !important;
        }
    </style>

</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WorkBOX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="#">Home</a></li>-->


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#" data-toggle="modal" data-target="#reg">Sign Up</a></li>
                <li class="active" data-toggle="modal" data-target="#login"><a href="#">Login <span class="sr-only">(current)</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<section class="jumbotron">


    <div class="container">
        <div class="col-md-6">
            <h1>Work Box COM.NG</h1>
        </div>
        <div class="col-md-6" style="background-color: #ffffff">

            <div class="messages"></div>
            <form action="register" method="post" id="registerForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="passwordAgain">Password Again</label>
                    <input type="password" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="Password Again">
                </div>
                <div class="form-group">
                    <label for="fullName">Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                </div>
                <input type="submit" id="log" class="btn btn-default" value="Sign Up">
            </form>

        </div>



    </div>



</section>

<section class="row">
    <div class="col-md-6">
        <h1>Image</h1>
        <h1 class="pull-right">Image</h1>
        <h1>Image</h1>
    </div>

    <div class="col-md-6">
        <h1>Text</h1>
        <h1 class="pull-right">Text</h1>
        <h1>Text</h1>
    </div>

</section>

<section>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Featured Artisans</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 design">
            <h4>Hello Artisan</h4>
        </div>
        <div class="col-md-4 design">
            <h4>Hello Artisan</h4>
        </div>
        <div class="col-md-4 design">
            <h4>Hello Artisan</h4>
        </div>
    </div>


</section>






<!-- jQuery -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?=base_url()?>assets/js/jquery.waypoints.min.js"></script>
<!-- Magnific Popup -->
<script src="<?=base_url()?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Owl Carousel -->
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
<!-- toCount -->
<script src="<?=base_url()?>assets/js/jquery.countTo.js"></script>
<!-- Main JS -->
<script src="<?=base_url()?>assets/js/main.js"></script>
<script type="text/javascript" src="<?=base_url()?>custom/js/login.js"></script>
<script type="text/javascript" src="<?=base_url()?>custom/js/register.js"></script>




</body>
</html>