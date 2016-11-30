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
            <?=$this->lang->line('roles_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$head_action?> <?=$this->lang->line('roles_module_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$head_action?> <?=$this->lang->line('roles_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name"><?=$this->lang->line('roles_label_name')?>:</label>
                      <input type="text" name="role_name" id="name" value="<?=!empty($editRecord[0]['role_name'])?$editRecord[0]['role_name']:''?>" class="form-control" required >
                    </div>

                      <div class="form-group">
                          <label for="country"><?=$this->lang->line('roles_level_label_name')?>:</label>
                          <select name="role_level" id="role_level" class="form-control">
                              <option value="">Choose..</option>
                              <?php
                              $role_level = $editRecord[0]['role_level'];
                                   for($i=1;$i<10;$i++){
                                       if($role_level == $i){?>
                                           <option value="<?=$i?>" selected="selected"><?=!empty($i)?ucfirst($i):''?></option>
                                       <?php }else{?>
                                           <option value="<?=$i?>"><?=!empty($i)?ucfirst($i):''?></option>
                                       <?php }}?>
                          </select>
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