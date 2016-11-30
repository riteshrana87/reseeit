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

        $(function() {
            $('#btn-IAA-Save').click(function() {
                var txt = $('#interDefaultLink').val();
                var re = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
                if (re.test(txt)) {
                    return true;
                }
                else {
                    alert('Please Enter Valid URL');
                    return false;
                }
            })
        })


    </script>

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
        <div class="row outer1 display-yes" id="loyaltyInteractions">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1"
                 style="color: black; text-align: left; font-size:0.8em; height: 645px;">
                <div class="row inner1">
                    <!--Left Pane-->
                    <div class="col-sm-5 visible-sm visible-md visible-lg">
                        <div class="container-display">
                            <table>
                                <thead></thead>
                                <tbody>
                                <tr>
                                    <td><span><h3>Loyalty Rewards Screen:<br></h3></span>A user goes to this screen to
                                        review progress user is making towards the reward you offered.<br><br>From this
                                        screen users can also gain points by interacting with you.
                                    </td>
                                    <td><img src="../images/ReSeeItLoyaltyRewardScreen.png"></td>
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
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/app_ads">In-App Ads</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Loyalty &amp; Interactions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home">Coupon, Featured</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/coupon_nearby">Coupon,
                                        Nearby</a>
                                </li>
                            </ul>
                            <p style="margin-top: 5px;">From this screen you can setup up to <strong>six </strong>interactions
                                to engage users. &nbsp;Set the interactions up and Noviah will do the rest.</p>
                            <button class="btn btn-warning btnSizeSelect" onclick="dispModal('instDisc2')">Instructions
                                &amp; Disclaimers
                            </button>
                            </div>
                        <?php if(empty($loyalty_data)) {?>
                        <form method="post" action="<?php echo base_url(); ?>home/loyalty_interactions/insert_data" ENCTYPE="multipart/form-data" id="myform" name="myform" >
                            <?php }else{?>
                            <form method="post" name="myform" id="myform" action="<?php echo base_url(); ?>home/loyalty_interactions/update_data" ENCTYPE="multipart/form-data">
                            <?php }?>

                            <div class="right-body">
                                <fieldset class="show" id="fs-LoyaltyRewards">
                                    <Legend class="sr-only">Review Loyalty Rewards Program</Legend>
                                    <table class="col-xs-12 table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-4 noBorderXB"></th>
                                            <th class="col-xs-4 noBorderXB"></th>
                                            <th class="col-xs-4 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="reward1 table-row-CM" colspan="3" id="rewardTitle1">Loyalty
                                                Reward Offered by You
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-100">
                                            <td class="reward1 table-row-CM"><img class="img-thumb2"
                                                                                  src="../images/sampleLoyaltyCard.png"
                                                                                  id="rewardImg1"></td>
                                            <td class="pad6" colspan="2">Customers receive this reward in exchange for
                                                <span class="reward1" style="font-weight: bold;">2,000</span> loyalty
                                                points.<br><br>This program expires on <span class="reward1"
                                                                                             style="font-weight: bold;">June 30, 2016</span>.
                                                After that date no new customers will be offered this reward option.
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="pad6" colspan="3">Do you want to start a new rewards program or
                                                make administrative changes? &nbsp;Please contact us; we'll help you
                                                with the setup.
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="noBorderXT" colspan="3">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Setup">
                                    <Legend class="sr-only">Interaction Group Setup</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-2 noBorderXB"></th>
                                            <th class="col-xs-4 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction Group Setup</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="pad6" colspan="4">The parameters below apply to this&nbsp;<span
                                                    class="popover-border popoverDisp" aria-hidden="true"
                                                    data-toggle="popover" data-trigger="hover"
                                                    data-content="A Group comprises of up to six interactions, each with different type or depth of information, but with a common underlying theme. &nbsp;These interactions take a user, seamlessly, from one level of engagement with your brand to another, thus building brand loyalty."><strong>group of interactions.&nbsp;</strong></span>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderB noBorderR" colspan="2">
                                                <label class="pull-left popover-border popoverDisp" for="interStartDate"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Date from which interactions from this group will be delivered to users.  Pick a date that suits the theme of your interaction and marketing strategy.">Start
                                                    Date&nbsp;</label>
                                                <div class='input-group date' id='datetimepicker6'>
                                            <input name="start_date" type='text' value="<?=!empty($loyalty_data[0]['start_date'])?$loyalty_data[0]['start_date']:''?>" class="form-control"/>
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>

                                            </td>
                                            <td class="padLR6 noBorderB" colspan="2">
                                                <label class="pull-left popover-border popoverDisp"
                                                       for="interExpiryDate" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-content="Date after which interactions from this group will not be delivered to users.  Expiry date depends on the theme of your interactions.  You don't want summer themed interactions to be shown in fall, would you?">Expiry Date&nbsp;</label>

                                                <div class='input-group date' id='datetimepicker7'>
                               <input name="expiry_date" type='text' class="form-control" value="<?=!empty($loyalty_data[0]['expiry_date'])?$loyalty_data[0]['expiry_date']:''?>"/>
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6" colspan="4">
                                                <label class="pull-left popoverDisp popover-border" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Users will receive the default interaction after the expiry date of the interaction group."
                                                       for="interDefaultLink">Default Interaction</label>
                                                <input class="interSetup pull-left" name="default_interaction" style="width: 100%" type="url" id="interDefaultLink" placeholder="Link to an interactive (default) ad" value="<?=!empty($loyalty_data[0]['default_interaction'])?$loyalty_data[0]['default_interaction']:''?>">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="noBorderXT" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction1">
                                    <Legend class="sr-only">Setup Interaction 1</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;1</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #1</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                            <input type="hidden"  name="interaction_id" value="<?=!empty($loyalty_data[0]['interaction_id'])?$loyalty_data[0]['interaction_id']:''?>">
                                            <?php }?>
                                        </tr>

                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[0]['loyalty_interaction_id'])?$loyalty_data[0]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" value="<?=!empty($loyalty_data[0]['link_to_interaction'])?$loyalty_data[0]['link_to_interaction']:''?>" id="inter1Link" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">

                        <option value="1" <?php if(@$loyalty_data[0]['interaction_level'] == 1) { ?> selected="selected" <?php } ?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[0]['interaction_level'] == 2){ ?> selected="selected" <?php } ?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[0]['interaction_level'] == 3){ ?> selected="selected" <?php } ?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[0]['interaction_level'] == 4){ ?> selected="selected" <?php } ?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[0]['interaction_level'] == 5){ ?> selected="selected" <?php } ?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[0]['interaction_level'] == 6){ ?> selected="selected" <?php } ?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" name="award_points[]" type="number" style="width: 6em;" id="inter1Points" value="<?=!empty($loyalty_data[0]['award_points'])?$loyalty_data[0]['award_points']:''?>" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                        <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                        aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[0]['introduction_message'])?$loyalty_data[0]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[0]['tags_text'])?$loyalty_data[0]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction2">
                                    <Legend class="sr-only">Setup Interaction 2</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;2</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #2</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[1]['loyalty_interaction_id'])?$loyalty_data[1]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" id="inter1Link" value="<?=!empty($loyalty_data[1]['link_to_interaction'])?$loyalty_data[1]['link_to_interaction']:''?>" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">
                                                    <option value="1" <?php if(@$loyalty_data[1]['interaction_level'] == 1){?> selected="selected" <?php }?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[1]['interaction_level'] == 2){?> selected="selected" <?php }?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[1]['interaction_level'] == 3){?> selected="selected" <?php }?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[1]['interaction_level'] == 4){?> selected="selected" <?php }?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[1]['interaction_level'] == 5){?> selected="selected" <?php }?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[1]['interaction_level'] == 6){?> selected="selected" <?php }?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" value="<?=!empty($loyalty_data[1]['award_points'])?$loyalty_data[1]['award_points']:''?>" name="award_points[]" type="number" style="width: 6em;" id="inter1Points" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[1]['introduction_message'])?$loyalty_data[1]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[1]['tags_text'])?$loyalty_data[1]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction3">
                                    <Legend class="sr-only">Setup Interaction 3</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;3</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #3</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[2]['loyalty_interaction_id'])?$loyalty_data[2]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" value="<?=!empty($loyalty_data[2]['link_to_interaction'])?$loyalty_data[2]['link_to_interaction']:''?>" id="inter1Link" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">
                                                    <option value="1" <?php if(@$loyalty_data[2]['interaction_level'] == 1){?> selected="selected" <?php }?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[2]['interaction_level'] == 2){?> selected="selected" <?php }?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[2]['interaction_level'] == 3){?> selected="selected" <?php }?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[2]['interaction_level'] == 4){?> selected="selected" <?php }?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[2]['interaction_level'] == 5){?> selected="selected" <?php }?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[2]['interaction_level'] == 6){?> selected="selected" <?php }?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" value="<?=!empty($loyalty_data[2]['award_points'])?$loyalty_data[2]['award_points']:''?>" name="award_points[]" type="number" style="width: 6em;" id="inter1Points" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[2]['introduction_message'])?$loyalty_data[2]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[2]['tags_text'])?$loyalty_data[2]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction4">
                                    <Legend class="sr-only">Setup Interaction 4</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;4</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #4</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[3]['loyalty_interaction_id'])?$loyalty_data[3]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" value="<?=!empty($loyalty_data[3]['link_to_interaction'])?$loyalty_data[3]['link_to_interaction']:''?>" id="inter1Link" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">
                                                    <option value="1" <?php if(@$loyalty_data[3]['interaction_level'] == 1){?> selected="selected" <?php }?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[3]['interaction_level'] == 2){?> selected="selected" <?php }?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[3]['interaction_level'] == 3){?> selected="selected" <?php }?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[3]['interaction_level'] == 4){?> selected="selected" <?php }?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[3]['interaction_level'] == 5){?> selected="selected" <?php }?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[3]['interaction_level'] == 6){?> selected="selected" <?php }?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" value="<?=!empty($loyalty_data[3]['award_points'])?$loyalty_data[3]['award_points']:''?>" name="award_points[]" type="number" style="width: 6em;" id="inter1Points" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[3]['introduction_message'])?$loyalty_data[3]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[3]['tags_text'])?$loyalty_data[3]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction5">
                                    <Legend class="sr-only">Setup Interaction 5</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;5</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #5</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[4]['loyalty_interaction_id'])?$loyalty_data[4]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" value="<?=!empty($loyalty_data[4]['link_to_interaction'])?$loyalty_data[4]['link_to_interaction']:''?>" id="inter1Link" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">
                                                    <option value="1" <?php if(@$loyalty_data[4]['interaction_level'] == 1){?> selected="selected" <?php }?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[4]['interaction_level'] == 2){?> selected="selected" <?php }?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[4]['interaction_level'] == 3){?> selected="selected" <?php }?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[4]['interaction_level'] == 4){?> selected="selected" <?php }?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[4]['interaction_level'] == 5){?> selected="selected" <?php }?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[4]['interaction_level'] == 6){?> selected="selected" <?php }?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" name="award_points[]" type="number" value="<?=!empty($loyalty_data[4]['award_points'])?$loyalty_data[4]['award_points']:''?>" style="width: 6em;" id="inter1Points" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[4]['introduction_message'])?$loyalty_data[4]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[4]['tags_text'])?$loyalty_data[4]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset class="hidden" id="fs-Interaction6">
                                    <Legend class="sr-only">Setup Interaction 6</Legend>
                                    <table class="table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3 noBorderXB"></th>
                                            <th class="col-xs-1 noBorderXB"></th>
                                            <th class="col-xs-5 noBorderXB"></th>
                                            <th class="col-xs-3 noBorderXB"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="titleRow table-rowHt-30">
                                            <td class="table-row-CM" colspan="4" id="">Interaction &nbsp;6</td>
                                        </tr>
                                        <tr class="table-rowHt-25">
                                            <td class="padLR6 noBorderB" colspan="4">Enter the following to setup
                                                <strong>interaction #6</strong></td>
                                            <?php if(isset($loyalty_data)) {?>
                                                <input type="hidden"  name="loyalty_interaction_id[]" value="<?=!empty($loyalty_data[5]['loyalty_interaction_id'])?$loyalty_data[5]['loyalty_interaction_id']:''?>">
                                            <?php }?>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="pull-left" for="inter1Link">Link to Interaction</label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <input class="inter1 pull-left" name="link_to_interaction[]" style="width: 100%" type="url" value="<?=!empty($loyalty_data[5]['link_to_interaction'])?$loyalty_data[5]['link_to_interaction']:''?>" id="inter1Link" placeholder="Link to Ad or Content">
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Interactions are rated on a scale of 1 (beginner) to 6 (mature).  A user's journey, with your brand, begins at level 1, and progresses to 2, 3... &nbsp;You can give the same rate(level) to more than one interaction."
                                                       for="inter1Level">Interaction Level&nbsp;</label>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <select name="interaction_level[]" class="inter1" id="inter1Level" placeholder="1">
                                                    <option value="1" <?php if(@$loyalty_data[5]['interaction_level'] == 1){?> selected="selected" <?php }?>>1</option>
                                                    <option value="2" <?php if(@$loyalty_data[5]['interaction_level'] == 2){?> selected="selected" <?php }?>>2</option>
                                                    <option value="3" <?php if(@$loyalty_data[5]['interaction_level'] == 3){?> selected="selected" <?php }?>>3</option>
                                                    <option value="4" <?php if(@$loyalty_data[5]['interaction_level'] == 4){?> selected="selected" <?php }?>>4</option>
                                                    <option value="5" <?php if(@$loyalty_data[5]['interaction_level'] == 5){?> selected="selected" <?php }?>>5</option>
                                                    <option value="6" <?php if(@$loyalty_data[5]['interaction_level'] == 6){?> selected="selected" <?php }?>>6</option>
                                                </select>
                                            </td>
                                            <td class="padLR6 noBorderTBR" colspan="1">
                                                <label class="popover-border popoverDisp text-right" aria-hidden="true"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="Points users earn for interacting with the content specified in this setup."
                                                       for="inter1Points">Award Points</label>
                                                <input class="inter1 text-right" name="award_points[]" type="number" value="<?=!empty($loyalty_data[5]['award_points'])?$loyalty_data[5]['award_points']:''?>" style="width: 6em;" id="inter1Points" placeholder="0">
                                            </td>
                                            <td class="noBorderTB" colspan="1"></td>
                                        </tr>
                                        <tr class="table-rowHt-40">
                                            <td class="padLR6 noBorderTBR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Msg"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="This message is to make users aware of the availability of this interaction, and will be pushed to users via the ReSeeIt app.">Introduction
                                                    Message<span></span></label>
                                            </td>
                                            <td class="padLR6 noBorderTB" colspan="3">
                                                <textarea class="inter1 text-left" name="introduction_message[]" rows="2" style="width: 100%" id="inter1Msg" placeholder="(Max. 100 Characters)"><?=!empty($loyalty_data[5]['introduction_message'])?$loyalty_data[5]['introduction_message']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-rowHt-30">
                                            <td class="padLR6 noBorderTR text-left" colspan="1">
                                                <label class="popover-border popoverDisp pull-left" for="inter1Tag"
                                                       aria-hidden="true" data-toggle="popover" data-trigger="hover"
                                                       data-content="Tags are critical to delivering the right ad to the right user, e.g. burger, sub, coffee, computer repair, home cleaning service, etc. &nbsp;You can enter up to five tags. &nbsp; use commas to separate the tags.">Tags<span></span></label>
                                            </td>
                                            <td class="table-row-CM padLR6" colspan="3">
                                                <textarea class="inter1 text-left" name="tags_text[]" rows="1" style="width: 100%"
                                                          id="inter1Tag"
                                                          placeholder="Enter up to five tags, separated by commas"><?=!empty($loyalty_data[5]['tags_text'])?$loyalty_data[5]['tags_text']:''?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="noBorder noBorderXT" style="padding-top: 0.5em;" colspan="4">
                                                <div class="btn-group-sm btnList">
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">Loyalty</label>
                                                    <label class="btn btn-primary"
                     /admin/users/edit_record/50                                      onclick="showSelection(this)">Setup</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">1</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">2</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">3</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">4</label>
                                                    <label class="btn btn-primary"
                                                           onclick="showSelection(this)">5</label>
                                                    <label class="btn btn-primary disabled"
                                                           onclick="showSelection(this)">6</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>

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
            <div class="col-sm-12 footer-reg" id="footerNVT-reg">
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

</div>
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
<script>
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
<script src="<?=$this->config->item('js_path');?>app_nvt.js"></script>
<script src="<?=$this->config->item('js_path');?>platform_nvt.js"></script>
<script src="<?=$this->config->item('js_path');?>gen_validatorv4.js"></script>

<script language="JavaScript" type="text/javascript"
        xml:space="preserve">//<![CDATA[
    var frmvalidator  = new Validator("myform");
    frmvalidator.addValidation("start_date","req","Please enter your start date");
    frmvalidator.addValidation("expiry_date","req","Please enter your expiry date");
    //frmvalidator.addValidation("default_interaction","req","Please enter your default interaction");

    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $( "#myform" ).validate({
        rules: {
            link_to_interaction: {
                url: true
            }
        }
    });


    </script>

</body>
</html>