<?php
/*
    @Description : User edit
    @Author      : Niral Patel
    @Date        : 23-10-2015

*/
$head_action = !empty($editRecord)?"Edit":"Add";

$formAction = !empty($editRecord)?'update_data':'insert_data'; 
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
$path = $this->type.'/'.$this->viewname.'/'.$formAction;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$this->lang->line('user_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$head_action?> <?=$this->lang->line('admin_user_module_sub_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$this->lang->line('user_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                          <label for="name"><?=$this->lang->line('common_label_first_name')?>:</label>
                          <input type="text" name="first_name" id="first_name" value="<?=!empty($editRecord[0]['first_name'])?$editRecord[0]['first_name']:''?>" class="form-control" required >
                      </div>

                      <div class="form-group">
                          <label for="name"><?=$this->lang->line('common_label_last_name')?>:</label>
                          <input type="text" name="last_name" id="last_name" value="<?=!empty($editRecord[0]['last_name'])?$editRecord[0]['last_name']:''?>" class="form-control" required >
                      </div>

                    <div class="form-group">
                      <label for="email"><?=$this->lang->line('common_label_email')?>:</label>
                      <input type="email" name="email" id="email" value="<?=!empty($editRecord[0]['email'])?$editRecord[0]['email']:''?>" class="form-control" data-parsley-trigger="change" onblur="return check_email(this.value,'<?=!empty($editRecord[0]['admin_id'])?$editRecord[0]['admin_id']:''?>');" required>
                    </div>
                    <?php if(empty($editRecord)) { ?>
                   <div class="form-group">
                      <label for="email"><?=$this->lang->line('common_label_password')?>:</label>
                      <input data-parsley-minlength="6" type="password" name="password" id="password" class="form-control parsley-validated" placeholder="New password" type="text" required />
                   </div>
                             
                    <div class="form-group">
                      <label for="useraddress"><?=$this->lang->line('common_label_cpassword')?>:</label>
                      <input type="password" name="cpassword" placeholder="confirm password" id="cpassword" class="form-control parsley-validated" type="text" required data-parsley-equalto="#password" />                   </div>
                    <?php } ?>
                      <div class="form-group">
                          <label for="name"><?=$this->lang->line('common_label_zipcode')?>:</label>
                          <input type="text" name="zipcode" id="zipcode" value="<?=!empty($editRecord[0]['zipcode'])?$editRecord[0]['zipcode']:''?>" class="form-control" required >
                      </div>
                      <div class="form-group">
                          <label for="name"><?=$this->lang->line('common_label_phone')?>:</label>
                          <input type="number" name="phone_number" id="phone_number" value="<?=!empty($editRecord[0]['phone_number'])?$editRecord[0]['phone_number']:''?>" class="form-control" required >
                      </div>

                      <!--<div class="form-group">
                          <label for="name"><?=$this->lang->line('common_label_register_type')?>:</label>
                          <input type="text" name="register_type" id="register_type" value="<?=!empty($editRecord[0]['register_type'])?$editRecord[0]['register_type']:''?>" class="form-control" required >
                      </div>-->
                      <div class="form-group">
                          <label for="country"><?=$this->lang->line('common_label_register_type')?>:</label>
                          <select name="register_type" id="register_type" class="form-control" required>
                              <option value="">Choose..</option>
                        <option value="fb" <?php if(@$editRecord[0]['register_type'] == 'fb')
                                      {?> selected="selected" <?php }?>>Fb</option>
                        <option value="gplus" <?php if(@$editRecord[0]['register_type'] == 'gplus')
                                      {?> selected="selected" <?php }?>>Google+</option>
                        <option value="reseeit" <?php if(@$editRecord[0]['register_type'] == 'reseeit')
                                      {?> selected="selected" <?php }?>>Reseeit</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="country"><?=$this->lang->line('common_label_role_type')?>:</label>
                          <select name="role_id" id="role_id" class="form-control" required>
                              <option value="">Choose..</option>
                              <?php
                    if(!empty($role_type)){
                        $role = $editRecord[0]['role_id'];
                     foreach ($role_type as $row) {
                         if($role == $row['role_id']){?>
                        <option value="<?=$row['role_id']?>" selected="selected"><?=!empty($row['role_name'])?ucfirst($row['role_name']):''?></option>
                             <?php }else{?>
                             <option value="<?=$row['role_id']?>"><?=!empty($row['role_name'])?ucfirst($row['role_name']):''?></option>
                     <?php }}}?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="country">Client type</label>
                          <select name="client_type_id" id="client_type_id" class="form-control" required>
                              <option value="">Choose..</option>
                              <?php
                              if(!empty($client_type)){
                                  $role = $editRecord[0]['client_type_id'];
                                  foreach ($client_type as $row) {
                                      if($role == $row['client_type_id']){?>
                                          <option value="<?=$row['client_type_id']?>" selected="selected"><?=!empty($row['client_type_name'])?ucfirst($row['client_type_name']):''?></option>
                                      <?php }else{?>
                                          <option value="<?=$row['client_type_id']?>"><?=!empty($row['client_type_name'])?ucfirst($row['client_type_name']):''?></option>
                                      <?php }}}?>
                          </select>

                      </div>
                      <!--<div class="form-group">
                          <label for="country"><?=$this->lang->line('common_label_activated')?>:</label>
                          <select name="activated" id="activated" class="form-control">
                              <option value="">Choose..</option>
                              <option value="active" <?php if(@$editRecord[0]['activated'] == 'active'){?> selected="selected" <?php }?>>Active</option>
                              <option value="inactive" <?php if(@$editRecord[0]['activated'] == 'inactive')
                              {?>selected="selected"<?php }?>>Inactive</option>

                          </select>
                      </div>-->


                    <div class="form-group">
                      <label for="useraddress"><?=$this->lang->line('common_label_image')?>:</label>
                      <div class="file_input_div">
                      <label class="custom-upload"><input type="file" name="user_img" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload</label>
                    </div>
                    </div>
                     <p> <span class="txt">&nbsp;</span>
                        <?php if(empty($editRecord)) { ?>
                         <img id="uploadPreview1" class="noimage" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100" />
                          <?php } else { ?>
                                         
                                <?php if(empty($editRecord[0]['user_img'])) { ?>
                                <img id="uploadPreview1" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100"  height="100" />
                                <?php } else { 
                                  //echo "em";
                                  if(!file_exists($this->config->item('user_small_img_upload_path').$editRecord[0]['user_img'])){
                                    ?>
                                     <img id="uploadPreview1" class="noimage" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100" />
                                <?php }
                                else
                                {
                                  ?>
                                  <img id="uploadPreview1" src="<?=$this->config->item('user_small_img_url').$editRecord[0]['user_img'] ?>"  width="100"  height="100" />


                                <?php } }  ?>
                                            
                                <?php } ?>
                        </p>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="id" id="id" value="<?=!empty($editRecord[0]['user_id'])?$editRecord[0]['user_id']:''?>">
                    <button class="btn btn-primary" onclick="return setdefaultdata();" type="submit"><?=$this->lang->line('common_label_submit')?></button>
                    <input type="button" onclick="history.go(-1); return false;" class="btn btn-primary"  name="login" id="login" value="<?=$this->lang->line('common_label_cancel')?>">
                  </div>
                </form>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
 
<script type="text/javascript">
//On submit loading
function setdefaultdata()
{
    if ($('#<?php echo $this->viewname ?>').parsley().isValid()) {
        $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
    }
}
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}
//Function for chrck user
function check_email(email,id)
{
    $.ajax({
        type: "POST",
        url: "<?php echo $this->config->item('admin_base_url').$this->viewname.'/check_user';?>",
        //dataType: 'json',
        async: false,
        data: {'email':email,'id':id},
        success: function(data)
        {
        
        if(data == '1')
        {   
            $("#save").prop("disabled", true);           
             $.alert({
                title: 'Alert!',
                backgroundDismiss: false,
                content: 'This email already existing ! Please select other email.',
                confirm: function(){
                    $('#email').val('');
                    $('#email').focus();
                    $("#save").prop("disabled", false);
                }
            });         
        }
        else
        {
          if(data != '0')
          { $('#email').val(data);}
          return false;             
        }
        
        }
    });
    return false;                 
}
//image upload
function showimagepreview(input) 
{
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
      $('#uploadPreview1').attr('src', e.target.result);
      }
      filerdr.readAsDataURL(input.files[0]);
    }
    else
    {
      $.alert({
              title: 'Alert!',
              //backgroundDismiss: false,
              content: "<strong> Please upload jpg | jpeg | png | bmp | gif file only "+"<strong>",
              confirm: function(){
              }
          }); 
      return false;
    } 
  }
  else
  {
    $.alert({
              title: 'Alert!',
              //backgroundDismiss: false,
              content: "<strong> Maximum upload size 2 MB "+"<strong>",
              confirm: function(){
              }
          }); 
    return false;
  }
}
</script>