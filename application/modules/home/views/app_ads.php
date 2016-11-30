<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Advertisers and marketers can maximize the outcome and performance of their ad campaigns with Noviah’s patented solution; it enables them to interact with audiences via mass media.">
    <meta name="author" content="Noviah Technology Corp.">
    <!--
            <link rel="icon" href="../../favicon.ico">
    -->

    <title>Noviah Technology</title>

    <!-- Custom Noviah styles for this template -->
    <link href="<?= $this->config->item('css_path'); ?>noviah.css" rel="stylesheet">
    <link href="<?= $this->config->item('css_path'); ?>ClientLogin.css" rel="stylesheet">
    <link href="<?= $this->config->item('css_path'); ?>platform.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $this->config->item('css_path'); ?>admin/style.css" typet="text/css">
    <link href="<?= $this->config->item('css_path'); ?>datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- To Do:  Update script logic below -->

    <script src="<?= $this->config->item('js_path'); ?>jquery-2.1.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>bootstrap.min.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>moment-with-locales.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>admin/common.js"></script>

</head>
<body>
<?php $user_session = $this->session->userdata('reseeit_user_session');
if(empty($user_session)){
    redirect('/home');
}?>
<div class="main">
    <div class="container-fluid">
        <!-- Header -->
        <div class="row header-reg headerPanel-nvt">
            <div class=" col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                <div class="row">
                    <div class="col-sm-12">
          <p class="company-name-reg company-name-regPos"><span><img class="header-logo" src="<?=$this->config->item('image_path');?>NoviahLogo.png"></span>NOVIAH
                            TECHNOLOGY</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-7 col-sm-offset-6 col-md-offset-5">
                        <p class="tagline-reg">Because every connection matters</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5">
                <p class="col-sm-5 col-md-12 plat-greet" style="display: inline;"
                   id="client-greeting">Hello <?php echo $userrecord[0]['first_name']; ?></p>

                <div class="clearfix visible-md"></div>
                <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                    <ul class="nav masthead-nav menu-reg" style="float:right;">
                        <?= $this->load->view('assets/menu', '', true) ?>
                    </ul>
                </nav>
            </div>
            <!--navigation div-->
        </div>
        <!-- Header -->
        <div class="row outer1 display-yes" id="inAppAds">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1"
                 style="color: black; text-align: left; font-size:0.8em; height: 615px;">
                <div class="row inner1">
                    <!--Left Pane-->
                    <div class="col-sm-5 visible-sm visible-md visible-lg">
                        <div class="container-display">
                            <table>
                                <thead></thead>
                                <tbody>
                                <tr>
                                    <td><span><h3>In-App Ads:<br></h3></span>In-app ads are displayed in the designated
                                        area at the bottom of the Camera Screen.<br><br>User interactions start at the
                                        Camera Screen; a user goes there to take photos of artifacts - receipts, ads,
                                        billboards, etc.
                                    </td>
                                    <td><img src="<?=$this->config->item('image_path');?>ReSeeItCameraScreen.png"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Left Pane -->
                    <!--Right Pane-->
                    <div class="col-xs-12 col-sm-7">
                        <div class="right-head" style="margin: 5px 0px 5px 0px">
                            <ul class="nav nav-tabs" style="font-size: 0.85em;">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">In-App Ads</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/loyalty_interactions">Loyalty
                                        &amp;
                                        Interactions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home">Coupon, Featured</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/coupon_nearby">Coupon,
                                        Nearby</a>
                                </li>
                            </ul>
                            <p style="margin-top: 5px;">Upload up to four ads (ads <strong>must fit </strong>in the box
                                and <strong>be legible </strong>) and activate the ones needed. &nbsp;Noviah will take
                                care of the rest.</p>
                            <button class="btn btn-warning btnSizeSelect" onclick="dispModal('instDisc1')">Instructions
                                &amp; Disclaimers
                            </button>
                        </div>

                        <?php if(empty($app_data)){?>
                       <form id="form-inAppAds" method="post"  action="<?php echo base_url(); ?>home/app_ads/insert_data" ENCTYPE="multipart/form-data">
        <?php }else{?>
                       <form id="form-inAppAds" method="post"  action="<?php echo base_url(); ?>home/app_ads/update_data" ENCTYPE="multipart/form-data">
<?php } ?>

                            <div class="right-body">
                                <table class="col-sm-12 table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr class="table-rowHt-25">
                                        <th class="col-sm-6 table-row-CM">Ad</th>
                                        <th class="col-sm-3 table-row-CM">Status</th>
                                        <th class="col-sm-3 table-row-CM">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="table-row-CM table-rowHt-40">
                                            <?php if (empty($app_data)) { ?>
                                        <img id="uploadapp_ads1" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                            <?php } else { ?>
                                                <?php if (empty($app_data[0]['app_img'])) { ?>
                                        <img id="uploadapp_ads1" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>"  style="height: 100%;"/>
                                                <?php } else {
                                                    if (!file_exists($this->config->item('app_ads_big_img_url') . $app_data[0]['app_img'])) { ?>
                                                        <img class="imageThumb1" id="uploadapp_ads1" src="<?= $this->config->item('app_ads_big_img_url') . $app_data[0]['app_img']?>" style="height: 100%;" height="100"/>
                                                    <?php } else { ?>
                                                        <img id="uploadapp_ads1" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                                   <?php } } ?>
                                            <?php } ?>
                                        </td>
                                        <?php if($app_data){?>
                                            <input type="hidden" name="app_ads_id[]" value="<?php echo $app_data[0]['app_ads_id'];?>">
                                        <?php }?>
                                        <td class="table-row-CM">
                                            <!--<div class="btn-group" data-toggle="buttons">

                                                <label class="btn btnSizeSelect btn-danger btn_app_ads btnChkboxNVT" aria-label="In App Ad1 Active?" >
                                                    <input type="checkbox" checked class="inAppAdStatus_1" name="status[]" id="btn-inAppAdSelect1" autocomplete="off" value="0"><span>Inactive</span>
                                                   </label>

                                            </div>-->

                                            <div class="btn-group" data-toggle="buttons">

    <label class="btn btnSizeSelect <?php if(!empty($app_data[0]['status']) ==! 1){?> btn-danger <?php }else{?>btn-success active<?php }?> btn_app_ads btnChkboxNVT" aria-label="In App Ad1 Active?" >
                                                 <input type="text" style="display: none;" class="inAppAdStatus_1" name="status[]" id="btn-inAppAdSelect1" autocomplete="off" value="<?php if(!empty($app_data[0]['status']) == 1){echo $app_data[0]['status'];}else{?>0<?php }?>">
                                                    <?php if(!empty($app_data[0]['status']) == 1){?>
                                                        <span>Active</span>
                                                    <?php }else{?>
                                                        <span>Inactive</span>
                                                    <?php }?>

                                                </label>
                                            </div>


                                        </td>
                                        <td class="table-row-CM">
                                            <div class="file_input_div">
                                                <label class="custom-upload">
                                                    <input type="file" id="app_ads1" name="app_img[]"
                                                           onchange="showimagepreview(this)" class="btn btn-primary"
                                                           aria-pressed="false"
                                                           autocomplete="off"/>Upload/Replace</label>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-CM table-rowHt-40">
                                            <?php if (empty($app_data)) { ?>
                                                <img id="uploadapp_ads2" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                            <?php } else { ?>
                                                <?php if (empty($app_data[1]['app_img'])) { ?>
                                                    <img id="uploadapp_ads2" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>"  style="height: 100%;"/>
                                                <?php } else {
                                                    if (!file_exists($this->config->item('app_ads_big_img_url') . $app_data[1]['app_img'])) { ?>
                                                        <img class="imageThumb1" id="uploadapp_ads2" src="<?= $this->config->item('app_ads_big_img_url') . $app_data[1]['app_img']?>" style="height: 100%;" height="100"/>
                                                    <?php } else { ?>
                                                        <img id="uploadapp_ads2" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                                                                                          <?php } } ?>
                                            <?php } ?>
                                        </td>
                                        <?php if($app_data){?>
                                            <input type="hidden" name="app_ads_id[]" value="<?php echo $app_data[1]['app_ads_id'];?>">
                                        <?php }?>
                                        <td class="table-row-CM">
                                            <div class="btn-group" data-toggle="buttons">

                                                <label class="btn btnSizeSelect <?php if(!empty($app_data[1]['status']) == 1){ ?>btn-success active<?php }else{?> btn-danger<?php }?> btn_app_ads btnChkboxNVT" aria-label="In App Ad1 Active?" >
                                                    <input type="text" style="display: none;"  class="inAppAdStatus_1" name="status[]"  id="btn-inAppAdSelect1" autocomplete="off" value="<?php if(!empty($app_data[1]['status']) == 1){ echo $app_data[1]['status'];}else { ?>0<?php }?>">

                                                    <?php if(!empty($app_data[1]['status']) == 1){?>
                                                        <span>Active</span>
                                                    <?php }else{?>
                                                        <span>Inactive</span>
                                                    <?php }?>
                                                  </label>
                                            </div>
                                        </td>
                                        <td class="table-row-CM">
                                            <div class="file_input_div">
                                                <label class="custom-upload">
                                                    <input type="file" id="app_ads2" name="app_img[]"
                                                           onchange="showimagepreview(this)" class="btn btn-primary"
                                                           aria-pressed="false"
                                                           autocomplete="off"/>Upload/Replace</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-CM table-rowHt-40">
                                            <?php if (empty($app_data)) { ?>
                                                <img id="uploadapp_ads3" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                            <?php } else { ?>
                                                <?php if (empty($app_data[2]['app_img'])) { ?>
                                                    <img id="uploadapp_ads3" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>"  style="height: 100%;"/>
                                                <?php } else {
                                                    if (!file_exists($this->config->item('app_ads_big_img_url') . $app_data[2]['app_img'])) { ?>
                                                        <img class="imageThumb1" id="uploadapp_ads3" src="<?= $this->config->item('app_ads_big_img_url') . $app_data[2]['app_img']?>" style="height: 100%;" height="100"/>
                                                    <?php } else { ?>
                                                        <img id="uploadapp_ads3" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                                    <?php } } ?>
                                            <?php } ?>
                                        </td>
                                        <?php if($app_data){?>
                                            <input type="hidden" name="app_ads_id[]" value="<?php echo $app_data[2]['app_ads_id'];?>">
                                        <?php }?>
                                        <td class="table-row-CM">
                                            <div class="btn-group" data-toggle="buttons">

                                                <label class="btn btnSizeSelect <?php if(!empty($app_data[2]['status']) == 1){?>btn-success active<?php }else{?>btn-danger<?php }?> btn_app_ads btnChkboxNVT" aria-label="In App Ad1 Active?" >
                                                    <input type="text" style="display: none;" class="inAppAdStatus_1" name="status[]" id="btn-inAppAdSelect1" autocomplete="off" value="<?php if(!empty($app_data[2]['status']) == 1){ echo $app_data[2]['status'];}else { ?>0<?php }?>">
                                                    <?php if(!empty($app_data[2]['status']) == 1){?>
                                                        <span>Active</span>
                                                    <?php }else{?>
                                                        <span>Inactive</span>
                                                    <?php }?>
                                                </label>

                                            </div>
                                        </td>
                                        <?php if($app_data){?>
                                        <input type="hidden" name="app_ads_id[]" value="<?php echo $app_data[3]['app_ads_id'];?>">
                                        <?php }?>
                                        <td class="table-row-CM">
                                            <div class="file_input_div">
                                                <label class="custom-upload">
                                                    <input type="file" id="app_ads3" name="app_img[]"
                                                           onchange="showimagepreview(this)" class="btn btn-primary"
                                                           aria-pressed="false"
                                                           autocomplete="off"/>Upload/Replace</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-CM table-rowHt-40">
                                            <?php if (empty($app_data)) { ?>
                                                <img id="uploadapp_ads4" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                            <?php } else { ?>
                                                <?php if (empty($app_data[3]['app_img'])) { ?>
                                                    <img id="uploadapp_ads4" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>"  style="height: 100%;"/>
                                                <?php } else {
                                                    if (!file_exists($this->config->item('app_ads_big_img_url') . $app_data[3]['app_img'])) {?>
                                                        <img class="imageThumb1" id="uploadapp_ads4" src="<?= $this->config->item('app_ads_big_img_url') . $app_data[3]['app_img']?>" style="height: 100%;" height="100"/>
                                                    <?php }else { ?>
                                                        <img id="uploadapp_ads4" class="imageThumb1" src="<?= $this->config->item('image_path') . 'sampleLoyaltyCard.png' ?>" style="height: 100%;"/>
                                                    <?php }}?>
                                            <?php }?>
                                        </td>
                                        <td class="table-row-CM">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btnSizeSelect <?php if(!empty($app_data[3]['status']) == 1){?>btn-success active<?php }else{?>btn-danger<?php }?> btn_app_ads btnChkboxNVT" aria-label="In App Ad1 Active?" >
                                                    <input type="text" style="display: none;" class="inAppAdStatus_1" name="status[]" id="btn-inAppAdSelect1" autocomplete="off" value="<?php if(!empty($app_data[3]['status']) == 1){ echo $app_data[3]['status'];}else { ?>0<?php }?>" >
                                                    <?php if(!empty($app_data[3]['status']) == 1){?>
                                                        <span>Active</span>
                                                    <?php }else{?>
                                                        <span>Inactive</span>
                                                    <?php }?>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="table-row-CM">
                                            <div class="file_input_div">
                                                <label class="custom-upload">
                                                    <input type="file" id="app_ads4" name="app_img[]"
                                                           onchange="showimagepreview(this)" class="btn btn-primary"
                                                           aria-pressed="false"
                                                           autocomplete="off"/>Upload/Replace</label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="positionRight">
                                <input type="submit" class="btn btnSizeSelect btn-primary" id="btn-IAA-Save" onclick=""
                                       value="Save">
                            </div>
                        </form>
                    </div>
                    <!--Right Pane -->
                </div>
                <!--/.inner1-->
            </div>
        </div>
        <!--/.outer1-->

        <!-- Footer -->
        <div class="row">
            <div class="col-sm-13 footer-reg" id="footerNVT-reg">
                <!-- bottomElement position set in script file; responsive to screen size -->
                <img class="footerEntityNVT footer-logo" src="<?=$this->config->item('image_path');?>NoviahLogo.png">

                <p class="footerEntityNVT footer-text">&#169; <span id="calendar-year"></span> Noviah Technology Corp.
                </p>
            </div>
        </div>
        <!-- Footer -->
    </div>
    <!-- Container -->
    <!--Modals-->
    <!-- Modal Type 3 No Action Buttons.  Ideal for instructions, etc.  User clicks close for message to disappear-->
    <div class="modal fade modal3" id="modalType3" role="dialog" style="color: black;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
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
                    </div>
                    <!-- End Row 1 -->
                    <!-- Row 2-->
                    <div class="row display-none" id='modal3_Line2'>
                        <div class="col-sm-1">
                            <p>2</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText2'>Line 2</p>
                        </div>
                    </div>
                    <!-- End Row 2 -->
                    <!-- Row 3-->
                    <div class="row display-none" id='modal3_Line3'>
                        <div class="col-sm-1">
                            <p>3</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText3'>Line 3</p>
                        </div>
                    </div>
                    <!-- End Row 3 -->
                    <!-- Row 4-->
                    <div class="row display-none" id='modal3_Line4'>
                        <div class="col-sm-1">
                            <p>4</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText4'>Line 4</p>
                        </div>
                    </div>
                    <!-- End Row 4 -->
                    <!-- Row 5-->
                    <div class="row display-none" id='modal3_Line5'>
                        <div class="col-sm-1">
                            <p>5</p>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p id='modal3_bodyText5'>Line 5</p>
                        </div>
                    </div>
                    <!-- End Row 4 -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default-body btn-primary btn-inner" data-dismiss="modal"
                            id="modal1_Btn1">Close
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal3 -->
    <?php if($this->session->flashdata('message_session')){ ?>
        <div class="text-center" id="div_msg">
            <?php echo $this->session->flashdata('message_session');?>
        </div>
        <div class="clearfix visible-md"></div>
    <?php } ?>
</div>

<!-- main -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= $this->config->item('js_path'); ?>app_nvt.js"></script>
<script src="<?= $this->config->item('js_path'); ?>platform_nvt.js"></script>

<script type="text/javascript">
    //image upload
    function showimagepreview(input) {
        //alert(input.id);
        console.log(input.files[0]['name']);
        var maximum = input.files[0].size / 1024;
        //alert(maximum);
        if (input.files && input.files[0] && maximum <= 2048) {
            var arr1 = input.files[0]['name'].split('.');
            var arr = arr1[1].toLowerCase();
            if (arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'bmp' || arr == 'gif') {
                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    // alert('#upload'+input.id);
                    //alert(e.target.result);
                    $('#upload' + input.id).attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
            else {
                  alert('Please upload jpg | jpeg | png | bmp | gif file only');
                  return false;
            }
        }
        else {
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