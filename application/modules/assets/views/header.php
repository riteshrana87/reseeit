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
        <link href="<?=$this->config->item('css_path');?>technology.css" rel="stylesheet">
        <link href="<?=$this->config->item('css_path');?>contactUs.css" rel="stylesheet">

        <link href="<?=$this->config->item('css_path');?>ClientLogin.css" rel="stylesheet">
        <link href="<?=$this->config->item('css_path');?>platform.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=$this->config->item('css_path');?>admin/style.css" typet="text/css">

        
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
<!--
            if (screen.width < 768) {
                window.location.href = "../mobile/technology_mobile.html";
            }
-->
        </script>
        
    </head>
    <body>
        <div class = "main">
            <div class = "container-fluid">
<!-- Header --><?php $user_session = $this->session->userdata('reseeit_user_session');
                if($user_session){?>
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
                            <p class="col-sm-5 col-md-12 plat-greet" style="display: inline;" id="client-greeting">Hello <?php echo $user_session['first_name'];?></p>
                            <div class="clearfix visible-md"></div>
                            <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                                <ul class = "nav masthead-nav menu-reg" style="float:right;">
                                    <?=$this->load->view('assets/menu','',true)?>
                                </ul>
                            </nav>
                        </div>  <!--navigation div-->
                    </div> <!-- Header -->

                <?php }else{?>

                <div class = "row header-reg headerPanel-nvt">
                    <div class = " col-sm-12 col-md-6 col-lg-5 col-lg-offset-1 clearfix">
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


                    <div class = "col-sm-12 col-md-6 col-lg-4 col-lg-offset-1 clearfix">
                        <nav>
                            <ul class = "nav masthead-nav menu-reg">
                                 <?=$this->load->view('assets/menu','',true)?>
                            </ul>
                        </nav>
                    </div>  <!--navigation div-->
                </div> <!-- Header -->
                <?php }?>