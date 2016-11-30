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
    <link href="<?=$this->config->item('css_path');?>platform.css" rel="stylesheet">
    <!--<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">-->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script src="<?=$this->config->item('js_path');?>jquery-2.1.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?=$this->config->item('js_path');?>bootstrap.min.js"></script>
    <script src="<?=$this->config->item('js_path');?>moment-with-locales.js"></script>
    <script src="<?=$this->config->item('js_path');?>bootstrap-datepicker.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>admin/common.js"></script>

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
                <p class="col-sm-5 col-md-12 plat-greet" style="display: inline;" id="client-greeting"></p>
                <div class="clearfix visible-md"></div>
                <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                    <ul class = "nav masthead-nav menu-reg" style="float:right;">
                        <?=$this->load->view('assets/menu','',true)?>
                    </ul>
                </nav>
            </div>  <!--navigation div-->
        </div> <!-- Header -->
        <div class="row outer1 display-yes" id="couponFeatured">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1" style="color: black; text-align: left; font-size:0.8em;height: 600px;">
                <div class="row inner1">
                    <!--Right Pane-->
                    <div class = "col-xs-12 col-sm-12" style="vertical-align: middle;">
                        <div class="right-head" style="text-align: center; font-size: vertical-align: middle; margin-top: 250px;">
                            <?php foreach($roles_check as $user_data){ ?>
                            <a style="line-height: 66px; font-size: 18px; width: 250px; font-weight: bold;" class="btn btn-warning btnSizeSelect" href="<?=  base_url(USERS_SITE.'/login'.'/'.$user_data->user_id.'/'.$user_data->role_id)?>"><span class="glyphicon glyphicon-user"></span>                  <?php echo $user_data->role_name; ?></a>
                            <?php }?>
                        <!--<button class="btn btn-warning btnSizeSelect" onclick="dispModal('instDisc2')">Instructions &amp; Disclaimers</button>-->
                        </div>

                    </div> <!--Right Pane -->
                </div> <!--/.inner1-->
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
    <!-- Modal Type 3 No Action Buttons.  Ideal for instructions, etc.  User clicks close for message to disappear-->
    <div class="modal fade modal3" id="modalType3" role="dialog" style="color: black;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="modal3_titleText">TitleText</h3>
                </div>
                <div class="modal-body" style="font-size: 0.8em;">
                    <!-- Row 1-->
                    <div class="row display-none" id='modal3_Line1'>
                        <div class="col-sm-1">
                            <p>1</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText1'>Line 1</p>
                        </div>
                    </div> <!-- End Row 1 -->
                    <!-- Row 2-->
                    <div class="row display-none" id='modal3_Line2'>
                        <div class="col-sm-1">
                            <p>2</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText2'>Line 2</p>
                        </div>
                    </div> <!-- End Row 2 -->
                    <!-- Row 3-->
                    <div class="row display-none" id='modal3_Line3'>
                        <div class="col-sm-1">
                            <p>3</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText3'>Line 3</p>
                        </div>
                    </div> <!-- End Row 3 -->
                    <!-- Row 4-->
                    <div class="row display-none" id='modal3_Line4'>
                        <div class="col-sm-1">
                            <p>4</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText4'>Line 4</p>
                        </div>
                    </div> <!-- End Row 4 -->
                    <!-- Row 5-->
                    <div class="row display-none" id='modal3_Line5'>
                        <div class="col-sm-1">
                            <p>5</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText5'>Line 5</p>
                        </div>
                    </div> <!-- End Row 4 -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default-body btn-primary btn-inner" data-dismiss="modal" id="modal1_Btn1">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal3 -->
    <?php if($this->session->flashdata('message_session')){ ?>
        <div class="text-center" id="div_msg">
            <?php echo $this->session->flashdata('message_session');?>
        </div>
        <div class="clearfix visible-md"></div>
    <?php } ?>
</div> <!-- main -->

<script src="<?=$this->config->item('js_path');?>app_nvt.js"></script>
<script src="<?=$this->config->item('js_path');?>platform_nvt.js"></script>
<script src="<?=$this->config->item('js_path');?>gen_validatorv4.js"></script>

<script type="text/javascript">
    //image upload
    function showimagepreview(input)
    {
        //alert(input.id);
        console.log(input.files[0]['name']);
        var maximum = input.files[0].size/1024;
        //alert(maximum);
        if (input.files && input.files[0] && maximum <= 2048)
        {
            var arr1 = input.files[0]['name'].split('.');
            var arr= arr1[1].toLowerCase();
            if(arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'bmp' || arr == 'gif')
            {
                var filerdr = new FileReader();
                filerdr.onload = function(e) {
                    // alert('#upload'+input.id);
                    //alert(e.target.result);
                    $('#upload'+input.id).attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
            else
            {
                alert('Please upload jpg | jpeg | png | bmp | gif file only');
                return false;
            }
        }
        else
        {
            alert('Maximum upload size 2 MB');
            return false;
        }
    }
    <?php if($this->session->flashdata('message_session')){ ?>

    $('#div_msg').dialog({
        autoOpen: true,
        show: "blind",
        hide: "explode",
        modal: true,
        open: function(event, ui) {
            setTimeout(function(){
                $('#div_msg').dialog('close');
            }, 3000);
        }
    });

    <?php } ?>

</script>


</body>
</html>