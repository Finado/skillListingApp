<! doctype html>
<html>
<head>
    <title><?=$user?> | Profile Image </title>
    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>assets/workers/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/newcss.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css">

<style type="text/css">
    body {
        margin: 0;
        margin-top: 90px !important;
    }

    .dropdown-menu>li>a {
        color:#428bca;
    }
    .dropdown ul.dropdown-menu {
        border-radius:4px;
        box-shadow:none;
        margin-top:20px;
        width:300px;
    }
    .dropdown ul.dropdown-menu:before {
        content: "";
        border-bottom: 10px solid #fff;
        border-right: 10px solid transparent;
        border-left: 10px solid transparent;
        position: absolute;
        top: -10px;
        right: 16px;
        z-index: 10;
    }
    .dropdown ul.dropdown-menu:after {
        content: "";
        border-bottom: 12px solid #ccc;
        border-right: 12px solid transparent;
        border-left: 12px solid transparent;
        position: absolute;
        top: -12px;
        right: 14px;
        z-index: 9;
    }
    .secter {
        margin-top: 70px !important;
    }
    .secter2{
        margin-bottom: 10px !important;
    }
</style>
</head>
<body>

<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
            <!-- main right col -->
            <div class="column col-sm-12 col-xs-12" id="main">

                <!-- top nav -->
                <div class="navbar navbar-black navbar-static-top container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a href="#postModal" role="button" data-toggle="modal" class="navbar-brand logo"><img src="<?=base_url();?>assets/images/wb.png" style="max-height:42px;"></a> </div>
                    <nav class="collapse navbar-collapse" role="navigation">
                        <ul class="nav navbar-nav">
                            <li> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-home"></i> Home</a> </li>
                            <li> <a href="#profileModal" role="button" data-toggle="modal"><i class="fa fa-user"></i> Profile</a> </li>
                            <li> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-briefcase"></i> Upload Portfolio</a> </li>
                            <li class="visible-xs"> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-comment"></i> Messages</a></li>
                            <li class="visible-xs"> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-flag"></i> Flags</a></li>
                            <li class="visible-xs"> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-users"></i> Network</a></li>
                            <li class="visible-xs"> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-user"></i> Account</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-xs" >
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user;?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Profile <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="workers/Logout">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                                </ul>
                            </li>

                            <li> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-comment"></i></a></li>
                            <li> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-users"></i></a></li>
                            <li> <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-user"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /top nav -->

                <div class="">

                    <div class="row">
                        <div class="col-sm-12">

<!--                            <div class="row">-->
<!---->
<!--                                <div class="panel panel-default">-->
<!--                                    <div class="panel-body">-->
<!--                                        <div class="jumbotron">-->
<!---->
<!--                                            <div class="row">-->
<!--                                            <p class="text-center">-->
<!--                                                <video id="preview" class="img-thumbnail col-md-12" controls src="--><?//=base_url()?><!--/assets/video/vi.mp4"  poster="--><?//=base_url()?><!--/assets/images/monitor.jpg"></video>-->
<!--                                            </p>-->
<!--                                            </div>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row secter2">-->
<!---->
<!--                                <p class="text-center">-->
<!--                                    <label for="file" class="btn btn-success">-->
<!--                                        <i class="fa fa-arrow-up"></i>-->
<!--                                        Select Video-->
<!--                                    </label>-->
<!--                                    <input style="display: none" type="file" id="file" name="file"/>-->
<!--                                    </p>-->
<!--                                <p class="text-center"><a class="btn btn-primary btn-lg" href="#" target="_blank"><span>Video <i class="fa fa-external-link"></i></span></a></p>-->
<!---->
<!--                            </div>-->

                            <!-- content -->
                            <div class="row secter" >

                                <div class="col-md-3 fixme">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-xs-4 col-sm-4 text-center">

                                                <a href="#pixModal" role="button" data-toggle="modal" title="Reset Profile Image">
                                                    <?php if($profileimage==NULL){; ?>
                                                    <img src="<?=base_url()?>assets/images/avatarreal.png" alt="" class="center-block img-square img-thumbnail img-responsive">
                                                    <?php }else{; ?>
                                                        <img src="<?=base_url()?><?=$profileimage?>" alt="" class="center-block img-square img-thumbnail img-responsive">
                                                    <?php }; ?>
                                                </a>

                                            </div>

                                            <h3><?= $fullname; ?></h3>

                                            <p><strong>About: </strong>UX Designer </p>
                                            <p><strong>Reputation: </strong> <?=$reputation?> </p>
                                            <p><strong>Recommendation: </strong> 10</p>
                                            <p><strong>Profile Views: </strong> <?=$profileview?></p>
                                            <p><strong>Category: </strong> Unverified User</p>

                                            <p><strong>Skills: </strong> <span class="label label-success tags">UX</span> <span class="label label-success tags">UI</span> </p>

                                            <p>Profile Level</p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">85% Complete (success)</span> </div>
                                            </div>
                                            <!--skill end-->

                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h3><span class="fa fa-trophy"></span> Acheivements</h3>
                                            <div class="acheivement">
                                                <h4>Best Designer 2016</h4>
                                                <p class="sub"><a href="#"></a></p>
                                                <p>Studying all aspect of Design Including UX, Branding, Copy Exhibition Design, Ilustration and more...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h3><span class="fa fa-quote-left"></span> Testimonials</h3>
                                            <div class="testimonial">
                                                <blockquote>
                                                    <p>"Sit amet, consectetur adipisicing elit. Fuga quidem ipsum maiores necessitatibus sint, porro temporibus labore, amet officia unde libero eligendi? Porro dolorum itaque, facere harum amet, rem libero."</p>
                                                </blockquote>
                                                <h4>Joe Bloggs</h4>
                                                <p>Job Title</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <!-- /col-9 -->

                                <div class="col-md-9">

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">

                                                    <div class="text-center">

                                                        <div class="">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                                                                <img src="<?=base_url()?><?=$profileimage;?>" class="img-thumbnail img-responsive">
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>

                            <!-- /padding -->
                        </div>
                    </div>
                    <!-- /main -->

            </div>
        </div>
    </div>
</div><!-- /box -->
</div><!-- /wrapper -->

<!--profile modal-->
<div id="profileModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Edit Profile Details
            </div>
            <div class="modal-body" style="padding:15px;">
                <div class="jumbotron">
                   <div class="form-group">
                       <label class="col-md-4">Name</label>
                       <div class="col-md-8">
                       <input type="text" class="form-control" name="name" value="<?=$fullname?>">
                       </div>
                   </div>

                    <div class="form-group">
                       <label class="col-md-4">User Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="username" value="<?=$user?>">
                        </div>
                   </div>

                    <div class="form-group">
                        <label class="col-md-4">Location</label>
                        <div class="col-md-8">
                       <input type="text" class="form-control" name="name" value="<?=$loco?>">
                        </div>
                   </div>

                    <div class="form-group">
                        <label class="col-md-4">Email</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="<?=$mail?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4">Phone</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="<?=$phone?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4"></label>
                        <div class="col-md-8 text-center">
                        <input type="submit" class="btn btn-success" name="name" value="Save Changes">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!--upload portfolio modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Upload your work portfolio
            </div>
            <div class="modal-body" style="padding:15px;">
                <div class="jumbotron">
                    <div class="" id="">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Upload Image(s)</h3>
                            <div id="mes"></div>

                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div id="images-to-upload">

                        </div><!--Display Uploaded Image-->

                        <form method="post" action="">

                            <div class="text-center">
                                <label for="images" class="btn btn-lg btn-success">
                                    <i class="fa fa-arrow-up"></i>
                                    Add Images +
                                </label>
                            </div>

                            <input style="display: none" type="file" name="images" class="btn btn-default" id="images" multiple />

                        </form>
                        <p class="help-block text-center"><i class="text-success">You can upload multiple Images at once</i></p>






                        <!-- end #image-to-upload -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Change profile immage -->
<div id="pixModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <i class="text-center">Upload Profile Image</i>
            </div>
            <div class="modal-body" style="padding:15px;">
                <div class="jumbotron">
                    <div class="" id="">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Upload Image(s)</h3>
                            <div id="mes"></div>

                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div id="profile-image-to-upload">

                        </div><!--Display Uploaded Image-->

                        <form method="post" action="">

                            <div class="text-center">
                                <label for="proimages" class="btn btn-lg btn-success">
                                    <i class="fa fa-arrow-up"></i>
                                    Select Profile Image
                                </label>
                            </div>

                            <input style="display: none" type="file" name="proimages" class="btn btn-default" id="proimages" multiple />

                        </form>
<!--                        <p class="help-block text-center"><i class="text-success">You can upload multiple Images at once</i></p>-->






                        <!-- end #image-to-upload -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?=base_url()?>assets/workers/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="<?=base_url()?>assets/workers/plugins/bootstrap/js/bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/newjs.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>




<script>
$(function(){
    $('#file').on('change', function(){
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = viewer.load;
        reader.readAsDataURL(file);
        viewer.setProperties(file);

    });

    var viewer = {
        load : function(e){
            $('#preview').attr('src', e.target.result);
        },
        setProperties : function(file){
            $('#filename').text(file.name);
            $('#filetype').text(file.type);
            $('#filesize').text(math.round(file.size/1024));
        },
    }
})
    </script>

<script>
    $(document).ready(function(){

        $('.img-responsive').each(function() {
            var maxWidth = 600; // Max width for the image
            var maxHeight = 3000;    // Max height for the image
            var ratio = 0;  // Used for aspect ratio
            var width = $(this).width();    // Current image width
            var height = $(this).height();  // Current image height

            // Check if the current width is larger than the max
            if(width > maxWidth){
                ratio = maxWidth / width;   // get ratio for scaling image
                $(this).css("width", maxWidth); // Set new width
                $(this).css("height", height * ratio);  // Scale height based on ratio
                height = height * ratio;    // Reset height to match scaled image
            }

            var width = $(this).width();    // Current image width
            var height = $(this).height();  // Current image height

            // Check if current height is larger than max
            if(height > maxHeight){
                ratio = maxHeight / height; // get ratio for scaling image
                $(this).css("height", maxHeight);   // Set new height
                $(this).css("width", width * ratio);    // Scale width based on ratio
                width = width * ratio;    // Reset width to match scaled image
            }

        });

    });

</script>

<script type="text/javascript">
    function savelike(storyid)
    {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Workers/savelikes');?>",
            data: "Storyid="+storyid,
            success: function (response) {
                $("#like_"+storyid).html(response+" Likes");

            }
        });
    }
</script>


</body>

</html>