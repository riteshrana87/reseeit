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
    <link href="<?=$this->config->item('css_path');?>platform.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- To Do:  Update script logic below -->

    <style type="text/css">
        .right-forget {
            height: 150px;
            margin-left: 500px !important;
        }
    </style>

</head>
<body>
<div class = "main">
    <div class = "container-fluid">
        <!-- Header -->
        <div class = "row header-reg headerPanel-nvt">
            <div class = " col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                <div class = "row">
                    <div class = "col-sm-12">
                        <p class = "company-name-reg company-name-regPos"><span><img class = "header-logo" src="<?=$this->config->item('image_path');?>NoviahLogo.png"></span>NOVIAH TECHNOLOGY</p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-sm-4 col-md-7 col-sm-offset-6 col-md-offset-5">
                        <p class = "tagline-reg">Because every connection matters</p>
                    </div>
                </div>
            </div>
            <div class = "col-sm-12 col-md-6 col-lg-5">
                <div class="clearfix visible-md"></div>
                <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                    <ul class = "nav masthead-nav menu-reg" style="float:right;">
                        <?=$this->load->view('assets/menu','',true)?>
                    </ul>
                </nav>
            </div>  <!--navigation div-->
        </div> <!-- Header -->
        <div id="loyaltyInteractions" align="center">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1" style="color: black; text-align: left; font-size:0.8em;height: 630px;">
                <?php if(isset($msg)){ ?>
                    <div class="col-sm-12 text-center" id="div_msg">
                        <?php echo $msg;?>
                    </div>
                    <div class="clearfix visible-md"></div>
                <?php }?>
                <form method="post" action="<?php echo base_url();?>home/forgot_password/add_new_password">
                    <div class="row inner1">
                        <!--Left Pane-->
                        <div class = "col-xs-12 col-sm-8">
                            <div class="right-forget" style="margin: 50px 0px 5px 0px">
                                <div class="form-group">
                                    <label for="clientBizName" align="center"><h1 style="margin: 0px 0px 0px 72px;">Reset Your Password</h1></label>
                                    <input type="hidden" name="email" value="<?php echo $actdata['email'];?>">
                                    <input type="hidden" name="fullname" value="<?php echo $actdata['fullname'];?>">
                                    <input type="text" name="password" class="form-control" id="password" placeholder="New password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="rpassword" class="form-control" id=" reset_password" placeholder="Re-enter new password" required>
                                </div>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <input type="submit" class="btn btnSizeSelect btn-primary positionRight" id="btn-Save"  onclick="" value="Save">
                                    </div>
                                </div>

                            </div>
                        </div> <!--Left Pane -->
                        <!--Right Pane-->
                    </div> <!--/.inner1-->

                </form>
            </div>
        </div> <!--/.outer1-->

        <!-- Footer -->
        <div class = "row">
            <div class = "col-sm-12 footer-reg" id = "footerNVT-reg">  <!-- bottomElement position set in script file; responsive to screen size -->
                <img class = "footerEntityNVT footer-logo" src="<?=$this->config->item('image_path');?>NoviahLogo.png">
                <p class = "footerEntityNVT footer-text">&#169; <span id = "calendar-year"></span> Noviah Technology Corp.</p>
            </div>
        </div>  <!-- Footer -->
    </div> <!-- Container -->
    <!--Modals-->

    <script src="<?=$this->config->item('js_path');?>app_nvt.js"></script>
    <script src="<?=$this->config->item('js_path');?>platform_nvt.js"></script>
    <script src="<?=$this->config->item('js_path');?>gen_validatorv4.js"></script>

</body>
</html>