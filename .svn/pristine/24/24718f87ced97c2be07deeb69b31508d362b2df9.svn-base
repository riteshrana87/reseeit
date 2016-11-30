<?php
/*
    @Description: Change password
    @Author: Niral Patel
    @Date: 27-10-2015

*/

$path = $this->type.'/'.$this->viewname.'/admin_change_password';
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$this->lang->line('change_password_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> <?=$this->lang->line('change_password_module_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> <?=$this->lang->line('change_password_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->

				<?php if(($this->session->flashdata('message_session'))){ ?>
                <div class="col-sm-12 text-center" id="div_msg">
                    <?php echo $this->session->flashdata('message_session');?>
                </div>
                <?php } ?>
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name"><?=$this->lang->line('old_password')?>:</label>
                      <input data-minlength="6" type="password" name="oldpassword" id="oldpassword" class="form-control parsley-validated" type="text" required  placeholder="Change password"/>
                    </div>
                    <div class="form-group">
                      <label for="email"><?=$this->lang->line('new_password')?>:</label>
					  <input data-parsley-minlength="6" type="password" name="password" id="password" class="form-control parsley-validated" placeholder="New password" type="text" required />
                    </div>
                   
                    <div class="form-group">
                      <label for="useraddress"><?=$this->lang->line('new_co_password')?>:</label>
					  <input type="password" name="cpassword" placeholder="New confirm password" id="cpassword" class="form-control parsley-validated" type="text" required data-parsley-equalto="#password" />                   
					</div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="id" id="id" value="<?=!empty($editRecord[0]['admin_id'])?$editRecord[0]['admin_id']:''?>">
                    <button class="btn btn-primary" type="submit"><?=$this->lang->line('common_label_submit')?></button>
                    <input type="button" onclick="history.go(-1); return false;" class="btn btn-primary"  name="login" id="login" value="<?=$this->lang->line('common_label_cancel')?>">
                  </div>
                </form>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
 