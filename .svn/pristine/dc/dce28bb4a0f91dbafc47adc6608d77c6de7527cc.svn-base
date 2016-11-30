<?php
/*
    @Description : User edit
    @Author      : Niral Patel
    @Date        : 23-10-2015

*/
 
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
            <?=$this->lang->line('admin_user_module_title')?>

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
                  <h3 class="box-title"><?=$head_action?> <?=$this->lang->line('admin_user_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name"><?=$this->lang->line('common_label_name')?>:</label>
                      <input type="text" name="name" id="name" value="<?=!empty($editRecord[0]['name'])?$editRecord[0]['name']:''?>" class="form-control" required >
                    </div>
                    <div class="form-group">
                      <label for="email"><?=$this->lang->line('common_label_email')?>:</label>
                      <input type="email" name="email" id="email" value="<?=!empty($editRecord[0]['email'])?$editRecord[0]['email']:''?>" class="form-control" data-parsley-trigger="change" onblur="return check_email(this.value,'<?=!empty($editRecord[0]['admin_id'])?$editRecord[0]['admin_id']:''?>');" required>
                    </div>
                   
                    <div class="form-group">
                      <label for="useraddress"><?=$this->lang->line('common_label_address')?>:</label>
                      <textarea type="text" name="useraddress" id="useraddress"  class="form-control"><?=!empty($editRecord[0]['address'])?$editRecord[0]['address']:''?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="useraddress"><?=$this->lang->line('common_label_image')?>:</label>
                      <div class="file_input_div">
                      <label class="custom-upload"><input type="file" name="image" onchange="showimagepreview(this)" class="form-control parsley-validated" />Upload</label>
                    </div>
                    </div>
                     <p> <span class="txt">&nbsp;</span>
                        <?php if(empty($editRecord)) { ?>
                         <img id="uploadPreview1" class="noimage" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100" />
                          <?php } else { ?>
                                         
                                <?php if(empty($editRecord[0]['image'])) { ?>
                                <img id="uploadPreview1" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100"  height="100" />
                                <?php } else { 
                                  //echo "em";
                                  if(!file_exists($this->config->item('admin_user_small_img_upload_path').$editRecord[0]['image'])){
                                    ?>
                                     <img id="uploadPreview1" class="noimage" src="<?=$this->config->item('admin_image_path').'no_image.jpg'?>"  width="100" />
                                <?php }
                                else
                                { 
                                  ?>
                                  <img id="uploadPreview1" src="<?=$this->config->item('admin_user_small_img_url').$editRecord[0]['image'] ?>"  width="100"  height="100" />
                              
                                
                                <?php } }  ?>   
                                            
                                <?php } ?>
                        </p>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="id" id="id" value="<?=!empty($editRecord[0]['admin_id'])?$editRecord[0]['admin_id']:''?>">
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
</script>