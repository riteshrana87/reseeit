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
        <th <?php if(isset($sortfield) && $sortfield == 'role_name'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('role_name','<?php echo $sorttypepass;?>')"><?=$this->lang->line('roles_label_name')?></th>

        <th class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade" width="5%"><?=$this->lang->line('common_label_action')?></th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($datalist)) {
        //pr($datalist);
      foreach($datalist as $row) { 
        $name = !empty($row['role_name'])?$row['role_name']:'';
        $name = str_replace("'","\'",$name);
        ?>
        
        <tr role="row" class="odd">
            <td class="text-center"><div class="" style="position: relative;">
              <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo  $row['role_id'] ?>">
            </div></td>
            <td><?=!empty($row['role_name'])?$row['role_name']:''?></td>
            <td class="hidden-xs hidden-sm">

                <a class="btn btn-xs btn-primary" href="<?= $this->config->item('admin_base_url').$this->viewname; ?>/edit_record/<?= $row['role_id'] ?>" title="Edit Record"><i class="fa fa-pencil"></i></a> &nbsp;
                <button class="btn btn-xs btn-danger" title="Delete Record"  onclick="deletepopup('<?php echo  $row['role_id'] ?>','<?php echo $name; ?>');"> <i class="fa fa-times"></i> </button>
            </td>
          </tr>
        <?php } ?> 
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('roles_label_name')?></th>
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

