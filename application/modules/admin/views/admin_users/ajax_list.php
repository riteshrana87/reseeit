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
        <th <?php if(isset($sortfield) && $sortfield == 'name'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('name','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_name')?></th>
        <th <?php if(isset($sortfield) && $sortfield == 'email'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('email','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_email')?></th>
        <th <?php if(isset($sortfield) && $sortfield == 'address'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%" onclick="apply_sorting('address','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_address')?></th>

            <input type="hidden" id="sortfield" name="sortfield" value="<?php if(isset($sortfield)) echo $sortfield;?>" />
            <input type="hidden" id="sortby" name="sortby" value="<?php if(isset($sortby)) echo $sortby;?>" /></td>

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
            <td><?=!empty($row['fullname'])?$row['fullname']:''?></td>
            <td><?=!empty($row['email'])?$row['email']:''?></td>
            <td><?=!empty($row['address'])?$row['address']:''?></td>
            <td class="hidden-xs hidden-sm">
            <?php if(!empty($row['activated']) && $row['activated'] == 'active'){ ?>
            <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['user_id'] ?>',0,'<?php echo $name; ?>')" href="javascript:void(0);">

              <i class="fa fa-check"></i>

             </a>
            <?php }else{ ?>
            <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['user_id'] ?>',1,'<?php echo $name; ?>')" href="javascript:void(0);">

              <i class="fa fa-ban"></i>

            </a> 
            <?php } ?>
                <a class="btn btn-xs btn-primary" href="<?= $this->config->item('admin_base_url').$this->viewname; ?>/edit_record/<?= $row['user_id'] ?>" title="Edit Record"><i class="fa fa-pencil"></i></a> &nbsp;
                <button class="btn btn-xs btn-danger" title="Delete Record"  onclick="deletepopup('<?php echo  $row['user_id'] ?>','<?php echo $name; ?>');"> <i class="fa fa-times"></i> </button>
            </td>
          </tr>
        <?php } ?> 
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_name')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_email')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_address')?></th>
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

