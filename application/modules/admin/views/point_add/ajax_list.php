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
        <th <?php if(isset($sortfield) && $sortfield == 'reward_type_id'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('reward_type_id','<?php echo $sorttypepass;?>')">Reward type id</th>
        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;">Client-Points Earned</th>
        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;">Noviah-Points Earned</th>
        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;">Non-profit Points Earned</th>
        <th class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade" width="5%"><?=$this->lang->line('common_label_action')?></th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($datalist)) {
        //pr($datalist);exit;
      foreach($datalist as $row) { 
        $name = !empty($row['reward_type_id'])?$row['reward_type_id']:'';
        $name = str_replace("'","\'",$name);
        ?>
        
        <tr role="row" class="odd">
            <td class="text-center"><div class="" style="position: relative;">
              <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo  $row['reward_type_id'] ?>">
            </div></td>
            <td><?=!empty($row['reward_type_id'])?$row['reward_type_id']:''?></td>
            <td><?=!empty($row['client_points_earned'])?$row['client_points_earned']:'0'?></td>
            <td><?=!empty($row['noviah_points_earned'])?$row['noviah_points_earned']:'0'?></td>
            <td><?=!empty($row['non_profit_points_earned'])?$row['non_profit_points_earned']:'0'?></td>
            <td class="hidden-xs hidden-sm">

                <a class="btn btn-xs btn-primary" href="<?= $this->config->item('admin_base_url').$this->viewname; ?>/edit_record/<?= $row['reward_type_id'] ?>" title="Edit Record"><i class="fa fa-pencil"></i></a> &nbsp;
                <button class="btn btn-xs btn-danger" title="Delete Record"  onclick="deletepopup('<?php echo  $row['reward_type_id'] ?>','<?php echo $name; ?>');"> <i class="fa fa-times"></i> </button>
            </td>
          </tr>
        <?php } ?> 
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <th rowspan="1" colspan="1">Reward_type_id</th>
            <th rowspan="1" colspan="1">Client-Points Earned</th>
            <th rowspan="1" colspan="1">Noviah-Points Earned</th>
            <th rowspan="1" colspan="1">Non-profit Points Earned</th>
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

