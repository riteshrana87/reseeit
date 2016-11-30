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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>location.js"></script>
    <!--<script src="jquery-2.1.1.min.js"></script>-->
    <script src="<?=$this->config->item('js_path');?>bootstrap.min.js"></script>
    <script src="<?=$this->config->item('js_path');?>moment-with-locales.js"></script>
    <script src="<?=$this->config->item('js_path');?>bootstrap-datepicker.js"></script>
    <script src="<?= $this->config->item('js_path'); ?>admin/common.js"></script>

    <script>
        <?php
        $msg = $this->session->flashdata('message');

        if(!empty($msg) == 'Password change successfully.' && !empty($msg) == 'Retype Password not match' && !empty($msg) == 'invalid_old_password'){ ?>
        $(function() {
            $("#modal-clientLogin").modal('toggle');
        });
        <?php }?>
    </script>

    <script type="text/javascript">
        $(window).load(function () {
            var value = '<?php echo $userlist[0]['state']?>';
            var htmltable = '';
            htmltable +='<option value="'+value+'">'+value+'</option>';
            $(".states").html(htmltable);
        });
    </script>
    <script type="text/javascript">
        function confirmPass() {
            var pass = document.getElementById("password1").value
            var confPass = document.getElementById("cpassword1").value

            var pass2 = document.getElementById("password2").value
            var confPass2 = document.getElementById("cpassword2").value

            var pass3 = document.getElementById("password3").value
            var confPass3 = document.getElementById("cpassword3").value

            if(pass != confPass) {
                alert('Location 1 Admin password miss match!');
                return false;
            }
            if(pass2 != confPass2) {
                alert('Location 2 Admin password miss match!');
                return false;
            }
            if(pass3 != confPass3) {
                alert('Location 3 Admin password miss match!');
                return false;
            }
            return true;
        }

    </script>

    <script>
        $(function() {
            var loc = new locationInfo();
            loc.getStates(231);
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
                <p class="col-sm-5 col-md-12 plat-greet" style="display: inline;" id="client-greeting">Hello <?php echo $user_session['first_name'];?></p>
                <div class="clearfix visible-md"></div>
                <nav class="col-sm-7 col-md-12 col-lg-10 col-lg-offset-2 plat-nav">
                    <ul class = "nav masthead-nav menu-reg" style="float:right;">
                        <?=$this->load->view('assets/menu','',true)?>
                    </ul>
                </nav>
            </div>  <!--navigation div-->
        </div> <!-- Header -->
        <div class="row outer1 display-yes" id="loyaltyInteractions">
            <div class="mainBody col-sm-12 col-lg-10 col-lg-offset-1" style="color: black; text-align: left; font-size:0.8em;height: 615px;">
                <?php if(empty($user_cdata)) { ?>
                <form id="form-inAppAds" method="post"
                      action="<?php echo base_url(); ?>home/client_account/insert_data" ENCTYPE="multipart/form-data" onsubmit="return confirmPass();">
                    <?php }else{?>
                    <form id="form-inAppAds" method="post"
                          action="<?php echo base_url(); ?>home/client_account/update_data" ENCTYPE="multipart/form-data">
                    <?php }?>
                    <div class="row inner1">
                        <!--Left Pane-->
                        <div class = "col-xs-12 col-sm-6">
                            <div class="right-head" style="margin: 5px 0px 5px 0px">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Client Account</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2><span><label class="btn btn-warning btnSizeSelect positionRight" onclick="dispModal('instDisc2')">Instructions &amp; Disclaimers</label></span></h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clientBizName">Name of Client-Business</label>
                                    <input type="text" name="com_name" value="<?=!empty($userlist[0]['com_name'])?$userlist[0]['com_name']:''?>" class="form-control" id="clientBizName" placeholder="Business Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="clientStreetAddress">Client Address</label>
                                    <?php if($userlist){?>
                                    <input type="hidden" name="com_id" value="<?php echo $userlist[0]['com_id']?>">
                                        <input type="hidden" name="com_location_id" value="<?php echo $userlist[0]['com_location_id']?>">
                                    <?php }?>
                                    <input type="text" name="address" value="<?=!empty($userlist[0]['address'])?$userlist[0]['address']:''?>" class="form-control" id="clientStreetAddress" placeholder="Street Address" required>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <select name="state" class="states marginTop3" id="stateId" required >
                                                    <option value="">Select City</option>
                                             </select>



                                        </div>

                                        <div class="col-xs-6 col-sm-3 marginTop3">
                                            <input type="text" value="<?=!empty($userlist[0]['city'])?$userlist[0]['city']:''?>" name="city" class="form-control" id="city" placeholder="City">
                                        </div>

                                        <div class="col-xs-6 col-sm-3 marginTop3">
                                            <input type="number" value="<?=!empty($userlist[0]['zipcode'])?$userlist[0]['zipcode']:''?>" name="zipcode" class="form-control" id="clientZip" placeholder="Zip Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%" for="clientContactFirstName">Client Admin Information</label>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 marginTop3">
                                            <input type="text" name="first_name" value="<?=!empty($userlist[0]['first_name'])?$userlist[0]['first_name']:''?>" class="form-control" id="clientContactFirstName" placeholder="First Name">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 marginTop3">
                                            <input type="text" name="last_name" value="<?=!empty($userlist[0]['last_name'])?$userlist[0]['last_name']:''?>" class="form-control" id="clientContactLastName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <input type="email" class="form-control marginTop3" value="<?php echo $user_session['email'];?>" id="clientContactEmail" placeholder="Email Address" disabled>
                                    <input type="hidden" name="user_id" value="<?php echo $user_session['user_id'];?>">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="number" value="<?=!empty($userlist[0]['phone_number'])?$userlist[0]['phone_number']:''?>" name="phone_number" class="form-control marginTop3" id="phone_number" placeholder="Phone Number">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="btn btn-warning" onclick="dispLoginModal()">Reset Password</label>

                                    </div>
                                </div>
                            </div>
                        </div> <!--Left Pane -->
                        <!--Right Pane-->
                        <div class = "col-xs-12 col-sm-6">
                            <div class="right-head" style="margin: 5px 0px 5px 0px">
                                <fieldset class="show" id="fs-Loc1">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2>Manage Location Admins</h2>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email1">Location 1 Admin</label>
                                        <input type="email" name="manage_email[]" id="email1" value="<?=!empty($user_cdata[0]['email'])?$user_cdata[0]['email']:''?>" class="form-control" data-parsley-trigger="change" onblur="return check_email(this,'<?=!empty($user_cdata[0]['user_id'])?$user_cdata[0]['user_id']:''?>');" placeholder="Email Address" required>


                                        <?php if($user_cdata){?>
                                            <input type="hidden" name="parent_usre_id[]" value="<?php echo $user_cdata[0]['user_id'];?>">
                                        <?php }?>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 marginTop3">
                                                <input type="password" name="manage_pass[]" class="form-control" id="password1" placeholder="Password" >
                                            </div>
                                            <div class="col-xs-12 col-sm-6 marginTop3">
                                                <input type="password" class="form-control" name="retype_pass[]" id="cpassword1" placeholder="Retype Password" onblur="confirmPass()">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(isset($user_cdata[1]['email'])){?>
                                    <div class="form-group">
                                        <label for="email2">Location 2 Admin</label>
                                        <input type="email" name="manage_email[]" id="email2" value="<?php if(isset($user_cdata[1]['email'])){ echo $user_cdata[1]['email'];}?>" class="form-control" data-parsley-trigger="change" onblur="return check_email(this,'<?php if(isset($user_cdata[1]['user_id'])){ echo $user_cdata[1]['user_id'];}?>');" placeholder="Email Address" >
                                        <?php if($user_cdata){?>
                                            <input type="hidden" name="parent_usre_id[]" value="<?php if(isset($user_cdata[1]['user_id'])){echo $user_cdata[1]['user_id'];}?>">
                                        <?php }?>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 marginTop3">
                                                <input type="password" name="manage_pass[]" class="form-control" id="password2" placeholder="Password">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 marginTop3">
                                                <input type="password" name="retype_pass[]" class="form-control" id="cpassword2"  placeholder="Retype Password" onblur="confirmPass()">
                                            </div>
                                        </div>

                                    </div>
                                    <?php }else{?>
                                        <div class="form-group">
                                            <label for="email2">Location 2 Admin</label>
                                            <input type="email" name="manage_email[]" id="email2" value="" class="form-control" data-parsley-trigger="change" onblur="return check_email(this);" placeholder="Email Address" >

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 marginTop3">
                                                    <input type="password" name="manage_pass[]" class="form-control" id="password2" placeholder="Password">
                                                </div>
                                                <div class="col-xs-12 col-sm-6 marginTop3">
                                                    <input type="password" name="retype_pass[]" class="form-control" id="cpassword2"  placeholder="Retype Password" onblur="confirmPass()">
                                                </div>
                                            </div>

                                        </div>
                                    <?php }?>
                                    <?php if(isset($user_cdata[2]['email'])){?>
                                        <div class="form-group">
                                            <label for="email3">Location 3 Admin</label>
                                            <input type="email" name="manage_email[]" id="email3" value="<?php if(isset($user_cdata[2]['email'])){ echo $user_cdata[2]['email'];}?>" class="form-control" data-parsley-trigger="change" onblur="return check_email(this,'<?php if(isset($user_cdata[1]['user_id'])){ echo $user_cdata[2]['user_id'];}?>');" placeholder="Email Address" >
                                            <?php if($user_cdata){?>
                                                <input type="hidden" name="parent_usre_id[]" value="<?php if(isset($user_cdata[2]['user_id'])){ echo $user_cdata[2]['user_id'];}?>">
                                            <?php }?>
                                            <div class="row">
                                                    <div class="col-xs-12 col-sm-6 marginTop3">
                                                        <input type="password" name="manage_pass[]" class="form-control" id="password3" placeholder="Password" >
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 marginTop3">
                                                        <input type="password" name="retype_pass[]" class="form-control" id="cpassword3"  placeholder="Retype Password" onblur="confirmPass()">
                                                    </div>
                                                </div>
                                        </div>
                                    <?php }else{?>
                                        <div class="form-group">
                                            <label for="email3">Location 3 Admin</label>
                                            <input type="email" name="manage_email[]" id="email3" value="" class="form-control" data-parsley-trigger="change" onblur="return check_email(this);" placeholder="Email Address" >
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 marginTop3">
                                                    <input type="password" name="manage_pass[]" class="form-control" id="password3" placeholder="Password" >
                                                </div>
                                                <div class="col-xs-12 col-sm-6 marginTop3">
                                                    <input type="password" name="retype_pass[]" class="form-control" id="cpassword3"  placeholder="Retype Password" onblur="confirmPass()">
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>

                                </fieldset>
                            </div>
                        </div> <!--Right Pane -->
                    </div> <!--/.inner1-->
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" class="btn btnSizeSelect btn-primary positionRight" id="btn-Save save"  value="Save">
                        </div>
                    </div>
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
    <!-- Modal Type 3 No Action Buttons.  Ideal for instructions, etc.  User clicks close for message to disappear-->
    <div class="modal fade container-fluid headerPanel-nvt" id="modal-clientLogin" role="dialog">
        <div class = "row">
            <div class = "col-sm-12 col-md-4 col-lg-3 col-md-offset-7 col-lg-offset-8">
                <div class="modal-dialog modal-lg" style="float: right; width: 100%; color: black;">
                    <div class="modal-content" style="margin-top: 30px;">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="onLoginModalClose()">×</button>
                            <h3 class="modal-title">
                                <span>Reset password </span></h3>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?=base_url(USERS_SITE.'/Change_password')?>" name="clientLoginForm" ENCTYPE="multipart/form-data">
                                <?php if(!empty($msg)){ ?>
                                    <div class="form-group">
                                        <div class="col-sm-12 text-center" id="div_msg">
                                            <?php echo $msg;?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php }	?>
                                <div class="form-group">
                                    <label class="sr-only" for="clientEID">Old Password:</label>
                                    <input type="hidden" name="user_id" value="<?php echo $user_session['user_id'];?>">
                                    <input type="password"  class="form-control input-lg" name="old_password" placeholder="Old Password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="clientPswd">New Password</label>
                                    <input type="password" class="form-control input-lg" name="new_password" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="clientPswd">New Confirm Password:</label>
                    <input type="password" class="form-control input-lg" name="new_confirm_password" placeholder="New Confirm Password" required>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary" style="margin-top: 1.2em;" id="btn-clientSignIn">save</button>

                            </form>
                        </div> <!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
    </div>

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
    </div>
    <?php if(($this->session->flashdata('message_session'))){ ?>
        <div class="text-center" id="div_msg">
            <?php echo $this->session->flashdata('message_session');?>
        </div>
        <div class="clearfix visible-md"></div>
    <?php } ?>
</div> <!-- main -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= $this->config->item('js_path'); ?>app_nvt.js"></script>
<script src="<?= $this->config->item('js_path'); ?>platform_nvt.js"></script>



<script type="text/javascript">
    function check_email(emailData,userid)
    {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'home/client_account/check_user';?>",
            //dataType: 'json',
            async: false,
            data: {'email':emailData.value,'id':userid},
            success: function(data)
            {

                if(data == '1')
                {
                    $("#save").prop("disabled", true);
                    alert('This email already existing ! Please select other email.');
                    $('#'+emailData.id).val('');
                }
                else
                {
                    if(data != '0')
                    { $('#'+emailData.id).val(data);}
                    return false;
                }

            }
        });
        return false;
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