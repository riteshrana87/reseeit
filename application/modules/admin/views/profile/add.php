<?php
/*
    @Description : Profile edit
    @Author      : Niral Patel
    @Date        : 23-10-2015

*/
$admin_session = $this->session->userdata('reseeit_admin_session'); 
$head_action = !empty($editRecord)?"Edit":"Add";
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
$formAction = !empty($editRecord)?'update_data':'insert_data'; 
$path = $this->type.'/'.$this->viewname.'/'.$formAction;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$this->lang->line('profile_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$head_action?> <?=$this->lang->line('profile_module_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$head_action?> <?=$this->lang->line('profile_module_title')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">
                   <div class="form-group">
                      <label for="exampleInputEmail1"><?=$this->lang->line('common_label_name')?></label>
                      <input type="text" placeholder="Name" id="name" name="name" value="<?=!empty($editRecord[0]['fullname'])?$editRecord[0]['fullname']:''?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><?=$this->lang->line('common_label_email')?></label>
                      <input type="email" placeholder="Email" id="email" name="email" value="<?=!empty($editRecord[0]['email'])?$editRecord[0]['email']:''?>" class="form-control" onblur="return check_email(this.value,'<?=!empty($editRecord[0]['user_id'])?$editRecord[0]['user_id']:''?>');" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary" onclick="return setdefaultdata();" type="submit"><?=$this->lang->line('common_label_submit')?></button>
                  </div>
                </form>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
 
<script type="text/javascript">

function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}
//On submit loading
function setdefaultdata()
{
    if ($('#<?php echo $this->viewname ?>').parsley().isValid()) {
        $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
    }
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
                    //$('#email').val('<?=$admin_session['admin_email']?>');
                    $('#email').focus();
                    $("#save").prop("disabled", false);
                }
            });         
        }
        
        
        }
    });
    return false;                 
}
</script>