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
$admin_session = $this->session->userdata('uadit_admin_session');
?>
<?php if (isset($sortby) && $sortby == 'asc') {
    $sorttypepass = 'desc';
} else {
    $sorttypepass = 'asc';
} ?>
 <div class="table-responsive">
<table class="table table-bordered table-hover table-striped dataTable" id="example1" role="grid" aria-describedby="example1_info">
    <thead>
        <tr role="row">
        <th class="sorting_disabled text-center" role="columnheader" style="width: 2%" rowspan="1" colspan="1" aria-label=""> <div class="">
          <input type="checkbox" class="selecctall" id="selecctall">
        </div>
      </th>
        <th <?php if(isset($sortfield) && $sortfield == 'page_name'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('page_name','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_page_name')?></th>
        <th <?php if(isset($sortfield) && $sortfield == 'slug'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}}else{echo "class = 'sorting'";} ?> tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10%;" onclick="apply_sorting('slug','<?php echo $sorttypepass;?>')"><?=$this->lang->line('common_label_slug')?></th>
        <th class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade" width="5%"><?=$this->lang->line('common_label_action')?>
            <input type="hidden" id="sortfield" name="sortfield" value="<?php if(isset($sortfield)) echo $sortfield;?>" />
            <input type="hidden" id="sortby" name="sortby" value="<?php if(isset($sortby)) echo $sortby;?>" />
        </th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($datalist)) {
        //pr($datalist);
      foreach($datalist as $row) { 
        $name = !empty($row['page_name'])?$row['page_name']:'';
        $name = str_replace("'","\'",$name);
        ?>
        
        <tr role="row" class="odd">
            <td class="text-center"><div class="" style="position: relative;">
              <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo  $row['cms_id'] ?>">
            </div></td>
            <td><?=!empty($row['page_name'])?$row['page_name']:''?></td>
            <td><?=!empty($row['slug'])?$row['slug']:''?></td>
            <td class="hidden-xs hidden-sm">
                <?php if(!empty($row['status']) && $row['status'] == 1){ ?>
                    <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['cms_id'] ?>',0,'<?php echo $name; ?>')" href="javascript:void(0);"> 

                      <i class="fa fa-check"></i>

                     </a>
                    <?php }else{ ?>
                    <a class="btn btn-xs btn-primary" onclick="return statuspopup('<?php echo $row['cms_id'] ?>',1,'<?php echo $name; ?>')" href="javascript:void(0);"> 

                      <i class="fa fa-ban"></i>

                    </a> 
                    <?php } ?>
                <a class="btn btn-xs btn-primary" href="<?= $this->config->item('admin_base_url').$this->viewname; ?>/edit_record/<?= $row['cms_id'] ?>" title="Edit Record"><i class="fa fa-pencil"></i></a> &nbsp;
             </td>
          </tr>
        <?php } ?> 
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">&nbsp;</th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_page_name')?></th>
            <th rowspan="1" colspan="1"><?=$this->lang->line('common_label_slug')?></th>
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

