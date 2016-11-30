<?php
/*
  @Description: Users list
  @Author: Niral patel
  @Date: 20-10-15
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<?php
$this->type = ADMIN_SITE;

$this->viewname = $this->uri->segment(2);
$path = $this->type.'/'.$this->viewname;
$admin_session = $this->session->userdata('reseeit_admin_session');
?>
<?php if (isset($sortby) && $sortby == 'asc') {
    $sorttypepass = 'desc';
} else {
    $sorttypepass = 'asc';
} ?>
<div class="table-responsive">
<table class="table table-bordered table-striped dataTable" id="example1" role="grid" aria-describedby="example1_info">
    <thead>
        <tr role="row">
        <th class="sorting_disabled text-center" role="columnheader" style="width: 2%" rowspan="1" colspan="1" aria-label=""> <div class="">
          <input type="checkbox" class="selecctall" id="selecctall">
        </div>
      </th>
            <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;">User Id</th>

        <th <?php if(isset($sortfield) && $sortfield == 'fullname'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('fullname','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_full_name')?></th>
        <!--<th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;">Image Text </th>-->
        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%"><?= $this->lang->line('common_label_image') ?>
            <input type="hidden" id="sortfield" name="sortfield" value="<?php if(isset($sortfield)) echo $sortfield;?>" />
            <input type="hidden" id="sortby" name="sortby" value="<?php if(isset($sortby)) echo $sortby;?>" />
        </th>
            <th class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade" width="5%"><?=$this->lang->line('common_label_action')?></th>
    </thead>
    <tbody>
    <?php if(!empty($datalist)) {
        //pr($datalist);
      foreach($datalist as $row) { 
        $name = !empty($row['fullname'])?$row['fullname']:'';
        $name = str_replace("'","\'",$name);
        ?>

        <tr role="row" class="odd">
            <td class="text-center"><div class="" style="position: relative;">
            <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo  $row['user_id'] ?>">
            </div>
            </td>
            <td><?= !empty($row['user_id']) ? $row['user_id'] : '' ?></td>
            <td><?=!empty($row['fullname'])?$row['fullname']:''?></td>
            <td><a class="fancybox" rel="group" href="<?= !empty($row['app_img'])? !file_exists(base_url().'uploads/app_ads/big/'.$row['app_img'])?base_url().'uploads/app_ads/big/'.$row['app_img']:$this->config->item('admin_image_path').'no_image.jpg':$this->config->item('admin_image_path').'no_image.jpg'?>"><img style="width: 250px;" src='<?= !empty($row['app_img'])? !file_exists(base_url().'uploads/app_ads/big/'.$row['app_img'])?base_url().'uploads/app_ads/big/'.$row['app_img']:$this->config->item('admin_image_path').'no_image.jpg':$this->config->item('admin_image_path').'no_image.jpg'?>' width='50' height='50'></a></td>
            <td class="hidden-xs hidden-sm">
                <?php if(!empty($row['status']) && $row['status'] == 1){ ?>
                    <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['app_ads_id'] ?>',0,'<?php echo $name; ?>')" href="javascript:void(0);">

                        <i class="fa fa-check"></i>

                    </a>
                <?php }else{ ?>
                    <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['app_ads_id'] ?>',1,'<?php echo $name; ?>')" href="javascript:void(0);">

                        <i class="fa fa-ban"></i>

                    </a>
                <?php } ?>
            </td>
          </tr>
        <?php } ?> 
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <th rowspan="1" colspan="1">User Id</th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_full_name')?></th>
           <!-- <th rowspan="1" colspan="1">Image Text </th>-->
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_image')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_action')?></th>
        </tr>
        </tfoot>
         <?php }else { ?> 
        <tr>
        <td colspan="5"><?=$this->lang->line('common_list_not_found')?></td>
        </tr>
        <?php } ?>
        </tbody>

</table>
</div>   
<div id="common_tb">
    <?php
    if (isset($pagination)) {
        echo $pagination;
    }
    ?>
</div>

