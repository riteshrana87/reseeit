<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Advertisers and marketers can maximize the outcome and performance of their ad campaigns with Noviah’s patented solution; it enables them to interact with audiences via mass media.">
        <meta name="author" content="Noviah Technology Corp.">
<!--
        <link rel="icon" href="../../favicon.ico">
-->

        <title>Noviah Technology</title>

        <!-- Custom Noviah styles for this template -->
        <link href="<?=$this->config->item('css_path');?>noviah.css" rel="stylesheet">
        <link href="<?=$this->config->item('css_path');?>ClientLogin.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
<!--
            if (screen.width < 768) {
                window.location.href = "../mobile/index_mobile.html";
            }
-->
        </script>
    </head>
    <body>
        <div class = "main-index">
            <div class = "container-fluid">
                <div class = "row" id = "mainBody">
                    <div class = "col-sm-12 col-lg-11 clearfix">
                        <nav>
                            <ul class = "nav masthead-nav headerPanel-nvt">
                                <?=$this->load->view('assets/menu','',true)?>
                            </ul>
                        </nav>
                    </div> <!-- navigation div -->
                    <div class = "col-sm-12 col-lg-11">
                        <button type="button" class = "btn-primary btnSizeSelect clientLogin" id = "btn-clientLogin" onclick="dispLoginModal()">Client Login</button>
                    </div>
<!--Left Pane-->
                    <div class = "col-sm-4 displayBand-center">
                        <div class="companyBlock-index">
                            <h2 class = "company-name-index">NOVIAH&nbsp; TECHNOLOGY <br><span><p class = "tagline">Because every connection matters</p></span></h2>
                        </div> <!--/.companyBlock-index -->
                    </div> <!--Left Pane -->
<!--Right Pane-->                    
                    <div class = "col-sm-8 col-md-6 col-lg-7 col-md-offset-2 col-lg-offset-0 displayBand-center">
                        <div class="container-display display-yes positionRight" id="index-mediaComposite">
                            <button class="btn-blank display-yes" id="btn-introPlay";><img src="<?=$this->config->item('image_path');?>intro_play.png" class="img-indexMain"></button>
                            <button class="btn-blank display-none disabled" id="img-endOfPlay";><img src="<?=$this->config->item('image_path');?>endOfPlay.png" class="img-indexMain"></button>
                        </div>
                        <div class="container-display display-none positionRight" id="videoContainer">
                            <object class="embed-responsive-item">
                                <video class = "introVideo display-none" id="index-introVideo1" poster="<?=$this->config->item('image_path');?>intro_play.png">
                                    <source src="<?=$this->config->item('image_path');?>IndexVideo.mp4" type="video/mp4">
                                </video>                                
                                <video class = "introVideo display-none" id="index-introVideo2">
                                    <source src="<?=$this->config->item('image_path');?>journey.mp4" type="video/mp4">
                                </video>                                
                            </object>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-md-10 col-lg-9 col-sm-offset-3 col-md-offset-2 col-lg-offset-3 text-center display-none" id="btn-introVideoCntrls">
                                <button type = "button" class = "btn btn-md btn-primary disabled" style="width: 175px; padding: 3px 0px 3px 0px;" id = "btn-intro1">Intro</button>
                                <button type = "button" class = "btn btn-md btnBasicNVT btn-primary" style="width: 175px; padding: 3px 0px 3px 0px;" id = "btn-intro2">Customer Journey</button>
                            </div>
                        </div>
                    </div> <!--Right Pane -->
                </div> <!-- Row class & Main Body ID -->
                <div class = "row">
                    <div class = "col-sm-12 footer-index" id = "footerNVT-index">  <!-- bottomElement position set in script file; responsive to screen size -->
                        <img class = "footerEntityNVT footer-logo" id = "footer-logo" src="<?=$this->config->item('image_path');?>NoviahLogo.png">
                        <p class = "footerEntityNVT footer-text">&#169; <span id = "calendar-year"></span> Noviah Technology Corp.</p>
<!--
                        <p class = "footerEntityNVT footer-text" >&nbsp; Screen size is <span id = "screenWidth"></span>&nbsp; x &nbsp;<span id = "screenHeight"></span></p>
-->
                    </div>
                </div>
                
<!-- Client Login Modal -->
                <div class="modal fade container-fluid headerPanel-nvt" id="modal-clientLogin" role="dialog">
                    <div class = "row">
                        <div class = "col-sm-12 col-md-4 col-lg-3 col-md-offset-7 col-lg-offset-8">
                            <div class="modal-dialog modal-lg" style="float: right; width: 100%; color: black;">
                                <div class="modal-content" style="margin-top: 30px;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="onLoginModalClose()">×</button>
                                        <h3 class="modal-title"><span>
                                                <img src="<?=$this->config->item('image_path');?>ReSeeIt_small.png" style="height: 1.2em;">&nbsp;&nbsp;Client Login</span></h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?=  base_url(USERS_SITE.'/roles_check_login')?>" name="clientLoginForm" ENCTYPE="multipart/form-data">
                                            <?php if(!empty($msg)){ ?>
                                                <div class="form-group">
                                                    <div class="col-sm-12 text-center" id="div_msg">
                                                        <?php echo $msg;?>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php }	?>
                                            <div class="form-group">
                                                <label class="sr-only" for="clientEID">Email ID</label>
                                                <input type="email"  class="form-control input-lg" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="clientPswd">Password</label>
                                                <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                                            </div>
                                           <!-- <div class="form-group">
                                                <label class="sr-only" for="clientPswd">Role</label>
                                                <select name="role_id" id="role_id" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <?php
                                                    foreach ($role_type as $row) {?>
                                                        <option value="<?=$row->role_id ;?>"><?=!empty($row->role_name)?ucfirst($row->role_name):''?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
-->

                                            <button type="submit" class="btn btn-md btn-primary" style="margin-top: 1.2em;" id="btn-clientSignIn">Sign in</button>
                                            <p style="margin-top: .8em;"><span><a href="<?=base_url(USERS_SITE.'/forgot_password')?>" class="text-footnote">Forgot Password? Contact Us.</a></span></p>
                                        </form>
                                    </div> <!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>
                </div><!-- /.modal -->                                  
                
<!-- Mask screen when dialog is active --->
                <div class = "mask" id = "indexMask"> </div>
            </div> <!-- Container -->
        </div> <!-- main -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?=$this->config->item('js_path');?>bootstrap.min.js"></script>
       
        <script src="<?=$this->config->item('js_path');?>app_nvt.js"></script>
<script>
<?php if(!empty($msg) == 'Invalid Email or Password.' && !empty($msg) == 'Successfully Change Password.'){ ?>
        $(function() {
                $("#modal-clientLogin").modal('toggle');
        });
<?php }?>
</script>

    </body>
</html>