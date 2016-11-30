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
    <link rel="stylesheet" href="<?=$this->config->item('css_path');?>admin/style.css" typet="text/css">
    <link href="<?=$this->config->item('css_path');?>datepicker.css" rel="stylesheet">
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




    <!-- To Do:  Update script logic below -->
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker({
                format: 'MM/DD/YYYY'
            });
            $('#datetimepicker7').datetimepicker({
                format: 'MM/DD/YYYY'
            });
            $('#datetimepicker8').datetimepicker({
                format: 'MM/DD/YYYY'
            });
            $('#datetimepicker9').datetimepicker({
                format: 'MM/DD/YYYY'
            });
            $('#datetimepicker10').datetimepicker({
                format: 'MM/DD/YYYY'
            });
            $('#datetimepicker11').datetimepicker({
                format: 'MM/DD/YYYY'
            });

        });


    </script>

</head>
<body>
<?php $user_session = $this->session->userdata('reseeit_user_session');
if(empty($user_session)){
    redirect('/home');
}?>

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
                <p class="col-sm-5 col-md-12 plat-greet" style="display: inline;" id="client-greeting">Hello <?php echo $userrecord[0]['first_name'];?></p>
                <div class="clearfix visible-md"></div>
                <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                    <ul class = "nav masthead-nav menu-reg" style="float:right;">
                        <?=$this->load->view('assets/menu','',true)?>
                    </ul>
                </nav>
            </div>  <!--navigation div-->
        </div> <!-- Header -->
        <div class="row outer1 display-yes" id="couponFeatured">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1" style="color: black; text-align: left; font-size:0.8em;height: 645px;">
                <div class="row inner1">
                    <!--Left Pane-->
                    <div class = "col-sm-5 visible-sm visible-md visible-lg">
                        <div class="container-display">
                            <table>
                                <thead></thead>
                                <tbody>
                                <tr>
                                    <td><span><h3>Coupons Screen:<br></h3></span>A user goes to this screen to view coupons offered to them.<br><br>Coupons are of three kinds:
                                                    <span><ul>
                                                            <li><strong>Featured</strong> - very specific ones targetted at specific users. &nbsp;This type is delivered only <strong>once </strong> to a user.</li>
                                                            <li><strong>Nearby (<i>Location</i>)</strong> - ones delivered to a user based on user's current location. &nbsp;A user may receive it <strong>more than once, </strong> whenever they are near the location specified.</li>
                                                            <li><strong>Favorites</strong> - ones based on user-selected preferences.</li>                                                               </ul></span>
                                    </td>
                                    <td><img src="<?=$this->config->item('image_path');?>ReSeeItCouponScreen.png"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!--Left Pane -->
                    <!--Right Pane-->
                    <div class = "col-xs-12 col-sm-7">
                        <div class="right-head" style="margin: 5px 0px 5px 0px">
                            <ul class="nav nav-tabs" style="font-size: 0.85em;">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>home/app_ads">In-App Ads</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>home/loyalty_interactions">Loyalty &amp; Interactions</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Coupon, Featured</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>home/coupon_nearby">Coupon, Nearby</a>
                                </li>
                            </ul>
                            <p style="margin-top: 5px;">From this screen you can set up to <strong>three </strong>coupons. &nbsp;A coupon can either be pushed - sent to users, or pulled - delivered at the end of an interaction, e.g. with a mailer.</p>
                            <button class="btn btn-warning btnSizeSelect" onclick="dispModal('instDisc2')">Instructions &amp; Disclaimers</button>
                        </div>
                            <?php if(empty($coupon_data)) {?>
<form method="post" action="<?php echo base_url();?>home/Coupon_featured/insert_data" ENCTYPE="multipart/form-data">
                                <?php }else{?>
                            <form method="post" action="<?php echo base_url();?>home/Coupon_featured/update_data" ENCTYPE="multipart/form-data" id="myform">
                                    <?php }?>

                            <div class="right-body">
                                <input type="hidden" name="coupon_type" value="featured">
                                <fieldset class="show" id="fs-couponFeatured1">
                                    <Legend class="sr-only">Coupon Featured 1</Legend>
                                    <table class="col-xs-12 table-bordered pad0" style="table-layout:fixed;">
                                        <thead>
                                        <tr>
                                            <th class="noBorderXB" style="width: 12%"></th>
                                            <th class="noBorderXB" style="width: 18%"></th>
                                            <th class="noBorderXB" style="width: 30%"></th>
                                            <th class="noBorderXB" style="width: 40%"></th>
                                            <!--
                                                                                                    <th class="col-xs-1 noBorderXB">e</th>
                                            -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30"><td class="table-row-CM" colspan="4" id="">Featured Coupon 1</td></tr>
                                        <input type="hidden" name="coupon_code[]" value="1">
                                        <?php if($coupon_data) {?>
                                        <input type="hidden" name="coupon_id[]" value="<?php echo $coupon_data[0]['coupon_id'];?>">
                                        <?php }?>

                                        <tr class="table-rowHt-30 fs08">
                                            <td class="table-row-CM pad6 noBorderR" colspan="2" rowspan="3">
                                                <div style="height: 7em; width: 12.3725em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploadPreview1" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;" />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[0]['coupon_img'])) { ?>
                                                            <img id="uploadPreview1" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;"/>
                                                        <?php } else {

                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[0]['coupon_img'])){ ?>
         <img class="imageThumb1" id="uploadPreview1" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[0]['coupon_img'] ?>"  style="height: 100%; width: 100%;" />
            <?php } else { ?>
         <img id="uploadPreview1" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;" />
                <?php } }  ?>
                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM pad6" colspan="1" rowspan="3">
                                                <div style="height: 12.3725em; width: 8em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploaddetailed1" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;" />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[0]['detailed_coupon_img'])) { ?>
                                                            <img id="uploaddetailed1" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;"/>
                                                        <?php } else {
                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[0]['detailed_coupon_img'])){ ?>
                <img class="imageThumb1" id="uploaddetailed1" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[0]['detailed_coupon_img'] ?>"  style="height: 100%; width: 100%;" />
                       <?php } else { ?>
                 <img id="uploaddetailed1" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;" />
                        <?php } }  ?>
                                <?php } ?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="1">
                                                <label class="popover-border popoverDisp" style="float:left;"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons can be delivered one of two ways, Push: we decide when to send coupon to user, or Pull: user decides when to receive, usually at end of an interaction. &nbsp;Only Push method is avialable currently.">Delivery Method</label>
                                                <!--
                                                 </td>
                                                                                                        <td class="table-row-CM padLR6" colspan="1">
                                                -->



                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btnSizeSelect <?php if(@$coupon_data[0]['delivery_method'] == 'Pull'){?>btn-success active<?php }else{?>btn-danger<?php }?> btn_coupon_feat btnChkboxNVT disabled" for="cf1DeliveryMthd" aria-label="" style="width: 6em; padding: 6px 18px 6px 6px;">
                            <input type="text" style="display: none;" checked name="delivery_method[]"  class="inAppAdStatus" id="cf1DeliveryMthd" autocomplete="off" value="<?php if(@$coupon_data[0]['delivery_method'] == 'Pull'){ echo $coupon_data[0]['delivery_method']; }else{?>Push<?php }?>">
                                        <?php if(@$coupon_data[0]['delivery_method'] == 'Pull'){?>
                                                        <span>»» Pull</span>
                                                 <?php }else{?>
                                                        <span>Push »»</span>
                                                        <?php }?>
                                                    </label>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1StartDate"   aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupon delivery to users will start from this date.">Start Date</label>

                                                <div class='input-group date' id='datetimepicker6'>
                                                    <input name="start_date[]" type='text' value="<?=!empty($coupon_data[0]['start_date'])?$coupon_data[0]['start_date']:''?>" class="form-control" />
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1ExpiryDate" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons delivery to users will be stopped after this date.">Expiry Date</label>
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input name="expiry_date[]" value="<?=!empty($coupon_data[0]['expiry_date'])?$coupon_data[0]['expiry_date']:''?>" type='text' class="form-control" />
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td  class="padLR6 noBorderTR table-row-CM" colspan="2">
                                                <label class="custom-upload"><input type="file" name="coupon_img[]" id="Preview1" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Summary Image</label>
                                        </td>
                                            <td  class="padLR6 noBorderT table-row-CM" colspan="1">
                                                <label class="custom-upload"><input type="file" name="detailed_coupon_img[]" id="detailed1" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Detailed Coupon</label>
                                            </td>

                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1NumCouponsIssued" aria-hidden="true" data-toggle="popover" data-trigger="hover"  data-content="Maximum number of coupons you want us to deliver to users. &nbsp;Users will only receive one coupon each.">Max Number to be Issued</label>
                                                <input name="max_number[]" value="<?=!empty($coupon_data[0]['max_number'])?$coupon_data[0]['max_number']:''?>"  class="inter1 text-right pull-right" type="number" style="width: 6em;" id="cf1NumCouponsIssued" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Summary"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="...">Summary<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter2 text-left" rows="1" name="summary[]" style="width: 100%;" id="cf1Summary" placeholder="In 20 words or less state benefit of coupon.  Include expiration date (mm/dd/yy); good practise."><?=!empty($coupon_data[0]['summary'])?$coupon_data[0]['summary']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Tag"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter2 text-left" name="tags_text[]" rows="1" style="width: 100%;" id="cf1Tag" placeholder="Enter up to five tags, separated by commas"><?=!empty($coupon_data[0]['tags_text'])?$coupon_data[0]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="noBorderXT" colspan="3">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary disabled" onclick="showFeaturedCoupon(this)">1</label>
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">2</label>
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">3</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-couponFeatured2">
                                    <Legend class="sr-only">Coupon Featured 2</Legend>

                                    <table class="col-xs-12 table-bordered pad0" style="table-layout:fixed;">
                                        <thead>
                                        <tr>
                                            <th class="noBorderXB" style="width: 12%"></th>
                                            <th class="noBorderXB" style="width: 18%"></th>
                                            <th class="noBorderXB" style="width: 30%"></th>
                                            <th class="noBorderXB" style="width: 40%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30"><td class="table-row-CM" colspan="4" id="">Featured Coupon 2</td></tr>
                                        <input type="hidden" name="coupon_code[]" value="2">
                                        <?php if($coupon_data) {?>
                                        <input type="hidden" name="coupon_id[]" value="<?php echo $coupon_data[1]['coupon_id'];?>">
                                        <?php }?>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="table-row-CM pad6 noBorderR" colspan="2" rowspan="3">
                                                <div style="height: 7em; width: 12.3725em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploadPreview2" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;"  />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[1]['coupon_img'])) { ?>
                                                            <img id="uploadPreview2" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;" />
                                                        <?php } else {

                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[1]['coupon_img'])){ ?>
                                                                <img class="imageThumb1" id="uploadPreview2" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[1]['coupon_img'] ?>"  style="height: 100%;width: 100%;"  />
                                                            <?php } else { ?>
                                                                <img id="uploadPreview2" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;"  />
                                                            <?php } }  ?>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM pad6" colspan="1" rowspan="3">
                                                <div style="height: 12.3725em; width: 8em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploaddetailed2" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;" />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[1]['detailed_coupon_img'])) { ?>
                                                            <img id="uploaddetailed2" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;"/>
                                                        <?php } else {
                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[1]['detailed_coupon_img'])){ ?>
                                                                <img class="imageThumb1" id="uploaddetailed2" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[1]['detailed_coupon_img'] ?>"  style="height: 100%; width: 100%;"  height="100" />
                                                            <?php } else { ?>
                                                                <img id="uploaddetailed2" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%;width: 100%;" />
                                                            <?php } }  ?>
                                                    <?php }?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="1">
                                                <label class="popover-border popoverDisp" style="float:left;" for="cf1DeliveryMthd" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons can be delivered one of two ways, Push: we decide when to send coupon to user, or Pull: user decides when to receive, usually at end of an interaction. &nbsp;Only Push method is avialable currently.">Delivery Method</label>
                                                <!--
                                                 </td>
                                                                                                        <td class="table-row-CM padLR6" colspan="1">
                                                -->
                                                <div class="btn-group" data-toggle="buttons">
                                                    <!--<label class="btn btnSizeSelect btn-danger btn_coupon_feat btnChkboxNVT disabled" for="cf1DeliveryMthd" aria-label="" style="width: 6em; padding: 6px 18px 6px 6px;">
                                                        <input type="checkbox" checked name="delivery_method[]"  class="inAppAdStatus" id="cf1DeliveryMthd" autocomplete="off" value="Push"><span>Push &#187;&#187;</span>
                                                    </label>-->

                                                    <label class="btn btnSizeSelect <?php if(@$coupon_data[1]['delivery_method'] == 'Pull'){?>btn-success active<?php }else{?>btn-danger<?php }?> btn_coupon_feat btnChkboxNVT disabled" for="cf1DeliveryMthd" aria-label="" style="width: 6em; padding: 6px 18px 6px 6px;">
                                                        <input type="text" style="display: none;" checked name="delivery_method[]"  class="inAppAdStatus" id="cf1DeliveryMthd" autocomplete="off" value="<?php if(@$coupon_data[1]['delivery_method'] == 'Pull'){ echo $coupon_data[1]['delivery_method']; }else{?>Push<?php }?>">
                                                        <?php if(@$coupon_data[1]['delivery_method'] == 'Pull'){?>
                                                            <span>»» Pull</span>
                                                        <?php }else{?>
                                                            <span>Push »»</span>
                                                        <?php }?>
                                                    </label>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1StartDate"   aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupon delivery to users will start from this date.">Start Date</label>

                                                <div class='input-group date' id='datetimepicker8'>
                                                    <input name="start_date[]" type='text' value="<?=!empty($coupon_data[1]['start_date'])?$coupon_data[1]['start_date']:''?>" class="form-control" />
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1ExpiryDate" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons delivery to users will be stopped after this date.">Expiry Date</label>
                                                <div class='input-group date' id='datetimepicker9'>
                                                    <input name="expiry_date[]" type='text' class="form-control" value="<?=!empty($coupon_data[1]['expiry_date'])?$coupon_data[1]['expiry_date']:''?>" />

                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td  class="padLR6 noBorderTR table-row-CM" colspan="2">
                                                <label class="custom-upload"><input type="file" name="coupon_img[]" id="Preview2" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Summary Image</label>
                                            </td>
                                            <td  class="padLR6 noBorderT table-row-CM" colspan="1">
                                                <label class="custom-upload"><input type="file" name="detailed_coupon_img[]" id="detailed2" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Detailed Coupon</label>
                                            </td>

                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1NumCouponsIssued" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Maximum number of coupons you want us to deliver to users. &nbsp;Users will only receive one coupon each.">Max Number to be Issued</label>
                                                <input name="max_number[]" value="<?=!empty($coupon_data[1]['max_number'])?$coupon_data[1]['max_number']:''?>"  class="inter1 text-right pull-right" type="number" style="width: 6em;" id="cf1NumCouponsIssued" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Summary"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="...">Summary<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter2 text-left" rows="1" name="summary[]" style="width: 100%;" id="cf1Summary" placeholder="In 20 words or less state benefit of coupon.  Include expiration date (mm/dd/yy); good practise."><?=!empty($coupon_data[1]['summary'])?$coupon_data[1]['summary']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Tag"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">

                                                <textarea class="inter2 text-left" name="tags_text[]" rows="1" style="width: 100%;" id="cf1Tag" placeholder="Enter up to five tags, separated by commas"><?=!empty($coupon_data[1]['tags_text'])?$coupon_data[1]['tags_text']:''?></textarea>

                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="noBorderXT" colspan="3">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">1</label>
                                                    <label class="btn btn-primary disabled" onclick="showFeaturedCoupon(this)">2</label>
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">3</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-couponFeatured3">
                                    <Legend class="sr-only">Coupon Featured 3</Legend>
                                    <table class="col-xs-12 table-bordered pad0" style="table-layout:fixed;">
                                        <thead>
                                        <tr>
                                            <th class="noBorderXB" style="width: 12%"></th>
                                            <th class="noBorderXB" style="width: 18%"></th>
                                            <th class="noBorderXB" style="width: 30%"></th>
                                            <th class="noBorderXB" style="width: 40%"></th>
                                            <!--
                                                                                                    <th class="col-xs-1 noBorderXB">e</th>
                                            -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Featured Coupon 3</td></tr>
                                        <input type="hidden" name="coupon_code[]" value="3">
                                        <?php if($coupon_data) {?>
                                        <input type="hidden" name="coupon_id[]" value="<?php echo $coupon_data[2]['coupon_id'];?>"><?php }?>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="table-row-CM pad6 noBorderR" colspan="2" rowspan="3">
                                                <div style="height: 7em; width: 12.3725em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploadPreview3" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;;width: 100%;"  />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[2]['coupon_img'])) { ?>
                                                            <img id="uploadPreview3" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>"  style="height: 100%;width: 100%;" />
                                                        <?php } else {

                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[2]['coupon_img'])){ ?>
                                                                <img class="imageThumb1" id="uploadPreview3" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[2]['coupon_img'] ?>"  style="height: 100%;width: 100%;" />
                                                            <?php } else { ?>
                                                                <img id="uploadPreview2" class="imageThumb1" src="<?=$this->config->item('image_path').'sampleLoyaltyCard.png'?>" style="height: 100%;width: 100%;" />
                                                            <?php } }  ?>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM pad6" colspan="1" rowspan="3">
                                                <div style="height: 12.3725em; width: 8em; border: solid 1px; margin:auto;">
                                                    <?php if(empty($coupon_data)) { ?>
                                                        <img id="uploaddetailed3" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%;width: 100%;" />
                                                    <?php } else { ?>
                                                        <?php if(empty($coupon_data[2]['detailed_coupon_img'])) { ?>
                                                            <img id="uploaddetailed3" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;"/>
                                                        <?php } else {
                                                            if(!file_exists($this->config->item('coupon_big_img_url').$coupon_data[1]['detailed_coupon_img'])){ ?>
                                                                <img class="imageThumb1" id="uploaddetailed3" src="<?=$this->config->item('coupon_big_img_url').$coupon_data[2]['detailed_coupon_img'] ?>"  style="height: 100%;width: 100%;"/>
                                                            <?php } else { ?>
                                                                <img id="uploaddetailed3" class="imageThumb1" src="<?=$this->config->item('image_path').'digitalCouponDetailed.png'?>"  style="height: 100%; width: 100%;" />
                                                            <?php } }  ?>
                                                    <?php }?>
                                                </div>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="1">
                                                <label class="popover-border popoverDisp" style="float:left;" for="cf2DeliveryMthd" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons can be delivered one of two ways, Push: we decide when to send coupon to user, or Pull: user decides when to receive, usually at end of an interaction. &nbsp;Only Push method is avialable currently.">Delivery Method</label>

                                                    <div class="btn-group" data-toggle="buttons">
                                                    <!--<label class="btn btnSizeSelect btn-danger btn_coupon_feat btnChkboxNVT disabled" for="cf1DeliveryMthd" aria-label="" style="width: 6em; padding: 6px 18px 6px 6px;">
                                                        <input type="checkbox" checked name="delivery_method[]"  class="inAppAdStatus" id="cf1DeliveryMthd" autocomplete="off" value="Push"><span>Push &#187;&#187;</span>
                                                    </label>-->
                                                <label class="btn btnSizeSelect <?php if(@$coupon_data[2]['delivery_method'] == 'Pull'){?>btn-success active<?php }else{?>btn-danger<?php }?> btn_coupon_feat btnChkboxNVT disabled" for="cf1DeliveryMthd" aria-label="" style="width: 6em; padding: 6px 18px 6px 6px;">
                                                        <input type="text" style="display: none;" checked name="delivery_method[]"  class="inAppAdStatus" id="cf1DeliveryMthd" autocomplete="off" value="<?php if(@$coupon_data[2]['delivery_method'] == 'Pull'){ echo $coupon_data[2]['delivery_method']; }else{?>Push<?php }?>">
                                                        <?php if(@$coupon_data[2]['delivery_method'] == 'Pull'){?>
                                                            <span>»» Pull</span>
                                                        <?php }else{?>
                                                            <span>Push »»</span>
                                                        <?php }?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1StartDate"   aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupon delivery to users will start from this date.">Start Date</label>
                                            <div class='input-group date' id='datetimepicker10'>
                                                <input name="start_date[]" type='text' value="<?=!empty($coupon_data[2]['start_date'])?$coupon_data[2]['start_date']:''?>" class="form-control" />
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left noBorderR" for="cf1ExpiryDate" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Coupons delivery to users will be stopped after this date.">Expiry Date</label>
                                                <div class='input-group date' id='datetimepicker11'>
                                                    <input name="expiry_date[]" value="<?=!empty($coupon_data[2]['expiry_date'])?$coupon_data[2]['expiry_date']:''?>" type='text' class="form-control" />
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td  class="padLR6 noBorderTR table-row-CM" colspan="2">
                                                <label class="custom-upload"><input type="file" name="coupon_img[]" id="Preview3" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Summary Image</label>
                                            </td>
                                            <td  class="padLR6 noBorderT table-row-CM" colspan="1">
                                                <label class="custom-upload"><input type="file" name="detailed_coupon_img[]" id="detailed3" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload Detailed Coupon</label>
                                            </td>

                                            <td class="padLR6 noBorderT" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1NumCouponsIssued" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Maximum number of coupons you want us to deliver to users. &nbsp;Users will only receive one coupon each.">Max Number to be Issued</label>
                                                <input name="max_number[]" value="<?=!empty($coupon_data[2]['max_number'])?$coupon_data[2]['max_number']:''?>"  class="inter1 text-right pull-right" type="number" style="width: 6em;" id="cf1NumCouponsIssued" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Summary"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="...">Summary<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter2 text-left" rows="1" name="summary[]" style="width: 100%;" id="cf1Summary" placeholder="In 20 words or less state benefit of coupon.  Include expiration date (mm/dd/yy); good practise."><?=!empty($coupon_data[2]['summary'])?$coupon_data[2]['summary']:''?></textarea>

                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30 fs08">
                                            <td class="padLR6 noBorderR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="cf1Tag"  aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter2 text-left" name="tags_text[]" rows="1" style="width: 100%;" id="cf1Tag" placeholder="Enter up to five tags, separated by commas"><?=!empty($coupon_data[2]['tags_text'])?$coupon_data[2]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="noBorderXT" colspan="3">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">1</label>
                                                    <label class="btn btn-primary" onclick="showFeaturedCoupon(this)">2</label>
                                                    <label class="btn btn-primary disabled" onclick="showFeaturedCoupon(this)">3</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <div class="positionRight">
                                    <input type="submit" class="btn btnSizeSelect btn-primary" id="btn-IAA-Save"  onclick="" value="Save">
                                </div>
                            </div>
                        </form>
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