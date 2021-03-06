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
        <!--<th <?php if(isset($sortfield) && $sortfield == 'first_name'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('first_name','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_first_name')?></th>-->
        <th <?php if(isset($sortfield) && $sortfield == 'email'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('email','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_email')?></th>
        <th <?php if(isset($sortfield) && $sortfield == 'register_type'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%" onclick="apply_sorting('register_type','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_register_type')?></th>
            <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%" ><?=$this->lang->line('common_label_role_type')?></th>
        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%"><?=$this->lang->line('common_label_image')?>
            <input type="hidden" id="sortfield" name="sortfield" value="<?php if(isset($sortfield)) echo $sortfield;?>" />
            <input type="hidden" id="sortby" name="sortby" value="<?php if(isset($sortby)) echo $sortby;?>" /></td>
        </th>
        <th class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade" width="5%"><?=$this->lang->line('common_label_action')?></th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($datalist)) {
        //pr($datalist);
      foreach($datalist as $row) { 
        $name = !empty($row['first_name'])?$row['first_name']:'';
        $name = str_replace("'","\'",$name);
        ?>
        
        <tr role="row" class="odd">
            <td class="text-center"><div class="" style="position: relative;">
              <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo  $row['user_id'] ?>">
            </div></td>
            <!--<td><?=!empty($row['first_name'])?$row['first_name']:''?></td>-->
            <td><?=!empty($row['email'])?$row['email']:''?></td>
            <td><?=!empty($row['register_type'])?$row['register_type']:''?></td>
            <td><?=!empty($row['role_name'])?$row['role_name']:''?></td>
            <td>

                <?php $url = $row['user_img'];
                $url = filter_var($url, FILTER_SANITIZE_URL);
                if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                $user_img = $row['user_img'];
                } else {
                    if(!empty($row['user_img'])) {
                        $user_img = base_url() . 'uploads/user/big/' . $row['user_img'];
                    }

                }

                ?>
               <a class="fancybox" rel="group" href="<?= !empty($user_img)?!file_exists($user_img)?$user_img:$this->config->item('admin_image_path').'no_image.jpg':$this->config->item('admin_image_path').'no_image.jpg'?>">

                    <img src='<?= !empty($user_img)?!file_exists($user_img)?$user_img:$this->config->item('admin_image_path').'no_image.jpg':$this->config->item('admin_image_path').'no_image.jpg'?>' height='50'>
                </a></td>


            <td class="hidden-xs hidden-sm">
                <a class="btn btn-xs btn-primary" href="<?= $this->config->item('admin_base_url').$this->viewname; ?>/edit_record/<?= $row['user_id'] ?>" title="Edit Record"><i class="fa fa-pencil"></i></a> &nbsp;
                <?php if(!empty($row['activated']) && $row['activated'] == 'active'){ ?>
                    <a class="btn btn-xs btn-danger" onclick="return activatpopup('<?php echo $row['user_id'] ?>','inactive','<?php echo $name; ?>')" href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                <?php }else{ ?>
                    <a class="btn btn-xs btn-danger" onclick="return activatpopup('<?php echo $row['user_id'] ?>','active','<?php echo $name; ?>')" href="javascript:void(0);">
                <i class="fa fa-times"></i>
                </a>
                <?php } ?>

            </td>
          </tr>
        <?php }?>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <!--<th rowspan="1" colspan="1"><?=$this->lang->line('common_label_first_name')?></th>-->
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_email')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_register_type')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_role_type')?></th>
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

