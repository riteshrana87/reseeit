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
            <?=$this->lang->line('roles_per_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$head_action?> <?=$this->lang->line('roles_per_module_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$head_action?> <?=$this->lang->line('roles_per_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">

                      <div class="form-group">
                          <label for="country"><?=$this->lang->line('common_label_role_type')?>:</label>
                          <select name="role_id" id="role_id" class="form-control">
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
                          <label for="name"><?=$this->lang->line('roles_permission_label_name')?>:</label>
                          <input type="text" name="role_pname" id="name" value="<?=!empty($editRecord[0]['role_pname'])?$editRecord[0]['role_pname']:''?>" class="form-control" required >
                      </div>
                      <div class="form-group">
                          <label for="content"><?=$this->lang->line('common_label_desc')?>:</label>
                          <textarea type="text" name="role_pdesc" id="content"  class="textarea form-control"><?=!empty($editRecord[0]['role_pdesc'])?$editRecord[0]['role_pdesc']:''?></textarea>
                      </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="role_id" id="role_id" value="<?=!empty($editRecord[0]['role_id'])?$editRecord[0]['role_id']:''?>">
                    <button class="btn btn-primary" onclick="return setdefaultdata();" type="submit"><?=$this->lang->line('common_label_submit')?></button>
                    <input type="button" onclick="history.go(-1); return false;" class="btn btn-primary"  name="login" id="login" value="<?=$this->lang->line('common_label_cancel')?>">
                  </div>
                </form>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="<?=$this->config->item('js_path');?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        height : 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
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

</script>