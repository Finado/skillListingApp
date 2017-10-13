<footer id="footer">
    <div class="container">
        <div class="row">
            <!--<div class="footer-ribbon">
                <span>Get in Touch</span>
            </div>-->
            <div class="col-md-3">
                <div class="newsletter">
                    <h4>Newsletter</h4>
                    <p>Keep up on our always evolving offers features and technology. Enter your e-mail and subscribe to our newsletter.</p>

                    <div class="alert alert-success hidden" id="newsletterSuccess">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>

                    <div class="alert alert-danger hidden" id="newsletterError"></div>

                    <form id="newsletterForm" action="http://preview.oklerthemes.com/porto/4.9.0/php/newsletter-subscribe.php" method="POST">
                        <div class="input-group">
                            <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Latest Tweets</h4>
                <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "oklerthemes", "count": 2}'>
                    <p>Please wait...</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-details">
                    <h4>Contact Us</h4>
                    <ul class="contact">
                        <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> 080X XXX XXX XX</p></li>
                        <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">info@standard.com</a></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                    <li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-icons-twitter"><a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-icons-linkedin"><a href="#" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-7">
                    <p> &copy;Copyright 2017. All Rights Reserved.</p>
                </div>
                <div class="col-md-4">
                    <nav id="sub-menu">
                        <ul>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>



<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Login</h4>
                <h4 class="modal-title text-center" id="myModalLabel2">Forgot Password</h4>
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

                    <div class="text-center">
                        <button type="submit" class="btn btn-success log">Sign-In</button>
                    </div>


                    <div class="text-center">
                        <a id="forgot" href="#">Forgot Password?</a>
                    </div>
                </form>


                <form method="post" action="Home/Forgot" id="hideforgot">
                    <div class="form-inline text-center">
                        <input type="email" required class="form-control" id="email" name="email" placeholder="Enter your Email" />
                        <button type="submit" class="btn btn-success log">Send Email</button>
                    </div>
                    <div class="text-center">
                        <a id="loger" href="#">Back to Login</a>
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




<!-- Vendor -->
<script src="<?=base_url()?>assets/home/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="<?=base_url()?>assets/home/master/style-switcher/style.switcher.js"></script>
<script src="<?=base_url()?>assets/home/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/common/common.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/vide/vide.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?=base_url()?>assets/home/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?=base_url()?>assets/home/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url()?>assets/home/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="<?=base_url()?>assets/home/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?=base_url()?>assets/home/js/theme.init.js"></script>

<script type="text/javascript" src="<?=base_url()?>custom/js/login.js"></script>
<script type="text/javascript" src="<?=base_url()?>custom/js/register.js"></script>
<script type="text/javascript" src="<?=base_url()?>custom/js/forgotpass.js"></script>
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

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42715764-5', 'auto');
    ga('send', 'pageview');
</script>
<script src="<?=base_url()?>assets/home/master/analytics/analytics.js"></script>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto/4.9.0/index-corporate-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Aug 2016 10:08:13 GMT -->
</html>



