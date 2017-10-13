<!DOCTYPE html>
<html>
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
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/dist/vegas.min.css" />

    <!-- Modernizr JS -->
    <script src="<?=base_url()?>assets/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]-->
    <script src="<?=base_url()?>assets/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body{
            margin-top: 65px !important;
        }

        #search{
            height: 88px;
            border-color: #008000;
            font-size: 20px;
            background-color: #ffffff;
        }

        #btnsearch{

            border-radius: 0px;
            margin: 0px;



        }
        .design{

            box-shadow: 2px 2px 2px 2px #000000;
            margin: 55px !important;
        }

        .design  img{

            float: left;
            margin: 10px;
        }

        .sect2{
            margin: 30px;
        }
 .log{
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

        .jumbotron{
            height: 350px;
        }

        input[placeholder]{
            text-align: center !important;
            font-size: 16px;
        }
        textarea[placeholder]{
            text-align: center !important;
            font-size: 16px;
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

<section class="row jumbotron">


<div class="container">

    <h1 class="text-center" style="color: #ffffff">Get the Best Artisan for your work</h1>
    <div id="searpanel">
        <form method="get">
            <div class="input-group">

                <input type="search" id="search"  name="search" class="form-control" placeholder="Search Artisan" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2"><input type="submit" class="btn btn-success" value="Search" id="btnsearch"></span>

            </div>

        </form>

    </div>

</div>



</section>




        <section class="container">
            <?php
            foreach ($artisanFound  as $item):
            ?>
            <div class="row">
                <div class="col-md-12" id="search" style="background-color: #eeeeee">
                    <div style="float: left;">
                        <img src="<?=base_url()?><?=$item->Image;?>" class="img-responsive" height="200">
                    </div>
                    <h2 class="text-success"><?=$item->Name;?></h2>
                    <p class=""><?=$item->Location;?></p>
                    <p class=""><?=$item->Skills;?></p>
                    <div>
                        <a href="<?=base_url()?>index.php/Home/ArtisanDetail/<?=$item->Id;?>" class="btn btn-success">View Details</a>
                        <a href="#" class="btn btn-primary">Contact Artisan</a>
                    </div>
                    <hr>
                </div>
            </div>
                <?php
            endforeach;
            ?>
        </section>






<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div class="messages"></div>
                <form action="Home/login" method="post" id="loginForm">
                    <div class="form-group">

                            <input type="text" class="form-control" id="username" name="username" placeholder="Username or Email" />


                    </div>
                    <div class="form-group">


                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                    </div>
                    <div class="messages"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default log">Sign-In</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
<!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!--Login Modal ends here -->


<!--Register Modal starts here -->

<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">

                <div class="messages"></div>
                <form action="Home/register" method="post" id="registerForm">

                    <div class="form-group">
                        <label for="fullName" class="col-md-4 hidden-xs">Full Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Johnny Hoe">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="usernames" class="col-md-4 hidden-xs">Username</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="usernames" name="usernames" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 hidden-xs">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact" class="col-md-4 hidden-xs">Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Mobile Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="skills" class="col-md-4 hidden-xs">Skills</label>
                        <div class="col-md-8">
                            <textarea  class="form-control" id="skills" name="skills" placeholder="Add Skills e.g Painter, Tiler, Bricklayer"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passwords" class="col-md-4 hidden-xs">Password</label>
                        <div class="col-md-8">
                        <input type="password" class="form-control" id="passwords" name="passwords" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="col-md-4 hidden-xs">Confirm Password</label>
                        <div class="col-md-8">
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit"  class="btn btn-default log">Sign-Up</button>
                    </div>
                </form>
                <div class="messages"></div>

            </div>
            <div class="modal-footer">
                <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>


    </div>
</div>

<!--Register Modal Ends here -->







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

<script type="text/javascript" src="<?=base_url()?>assets/dist/vegas.min.js"></script>
<script>
    $(function() {
        $('.jumbotron').vegas({
            slides: [
                { src: '<?=base_url()?>assets/images/1.jpg' },
                { src: '<?=base_url()?>assets/images/pixels.png' }
                //{ src: 'images/bgship2.png' }

            ]
        });
    });
</script>






</body>
</html>