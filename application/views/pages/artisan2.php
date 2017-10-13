
    <div role="main" class="main">
        <!--
        <div class="slider-container rev_slider_wrapper" style="height: 100px !important;">
            <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 9000, "gridwidth": 1170, "gridheight": 500}'>
                <ul>
                    <li data-transition="fade">

                        <img src="<?=base_url()?>assets/build/img/slide1.jpg"
                             alt=""
                             data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             class="rev-slidebg">

                        <div class="tp-caption"
                             data-x="177"
                             data-y="188"
                             data-start="1000"
                             data-transform_in="x:[-300%];opacity:0;s:500;"></div>

                        <div class="tp-caption top-label"
                             data-x="227"
                             data-y="180"
                             data-start="500"
                             data-transform_in="y:[-300%];opacity:0;s:500;">DO YOU NEED HELP?</div>

                        <div class="tp-caption"
                             data-x="480"
                             data-y="188"
                             data-start="1000"
                             data-transform_in="x:[300%];opacity:0;s:500;"></div>

                        <div class="tp-caption main-label"
                             data-x="135"
                             data-y="210"
                             data-start="1500"
                             data-whitespace="nowrap"
                             data-transform_in="y:[100%];s:500;"
                             data-transform_out="opacity:0;s:500;"
                             data-mask_in="x:0px;y:0px;">Let grow Together</div>

                        <div class="tp-caption bottom-label"
                             data-x="185"
                             data-y="280"
                             data-start="2000"
                             data-transform_in="y:[100%];opacity:0;s:500;">You get help, When you offer help!</div>

                    </li>
                    <li data-transition="fade">

                        <img src="<?=base_url()?>assets/build/img/naira2.gif"
                             alt=""
                             data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             class="rev-slidebg">

                        <div class="tp-caption featured-label"
                             data-x="center"
                             data-y="210"
                             data-start="500"
                             style="z-index: 5"
                             data-transform_in="y:[100%];s:500;"
                             data-transform_out="opacity:0;s:500;">DO YOU NEED HELP?</div>

                        <div class="tp-caption bottom-label"
                             data-x="center"
                             data-y="270"
                             data-start="1000"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
                             data-transform_out="opacity:0;s:500;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-splitin="chars"
                             data-splitout="none"
                             data-responsive_offset="on"
                             style="font-size: 23px; line-height: 30px;"
                             data-elementdelay="0.05">We Are Strong And Reliable"
                            You get help, When you offer help! Register Now...

                        </div>

                    </li>
                </ul>
            </div>
        </div> -->

        <div class="home-intro" id="home-intro" style="background-color: grey">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center" style="color: #ffffff">Search Artisan Around you?</h3>
                        <form class="form-inline" method="get" action="<?=base_url()?>index.php/Search">
                            <input class="form-control" placeholder="Search Artisans by Location, Username, Skills " style="width: 1000px !important;" name="search" type="search">
                            <input type="submit" class="btn btn-success" value="Search">
                        </form>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">

                    <div class="row" style="margin-bottom: 30px !important;">
                        <div class="col-md-12" id="search" style="background-color: #eeeeee">
                            <div class="col-md-4">
                                <img src="<?= base_url() ?><?= $profileimage; ?>" class="img-rounded" height="150"
                                     style="margin: 0px !important; float: left">

                                <h3 class="text-success"><?= $fullname; ?></h3>
                                <h4 class="">Email: <?= $mail; ?></h4>
                                <h4 class="">Location: <?= $loco; ?></h4>
                                <h4 class="">Skills: <?= $skills; ?></h4>
                                <h4 class="">Reputation: <?=$reputation; ?></h4>
                            </div>

                            <div class="col-md-8">
                                <?php
                                if($artisanPort==NULL){
                                echo '<h3>No Portfolio yet</h3>';
                                }else{
                                echo '<h3>' . $fullname."'" . ' Portfolio</h3>';
                                }
                                ?>


                                <?php
                                foreach($artisanPort as $userportInfo):
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="text-center">

                                            <div class="">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                                                    <img src="<?=base_url(). $userportInfo['ImagePath']?>" class="img-thumbnail img-responsive">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 text-center">
                                            <span><i class="btn btn-primary">136 Likes</i></span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <span><i class="btn btn-default">Share</i></span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <span><i class="btn btn-success">30 Comments</i></span>
                                        </div>
                                    </div>
                                </div>
                                    <hr class="tall">
                                <?php
                                endforeach;
                                ?>

                                <hr>
                            </div>
                        </div>
                    </div>


        </div>
        <hr class="tall">







