<?php
$admin_session = $this->session->userdata('reseeit_admin_session');
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Receipt List

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Receipt List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Receipt List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <?php if($this->session->flashdata('message_session')){ ?>
                            <div class="col-sm-12 text-center" id="div_msg">
                                <?php echo $this->session->flashdata('message_session');?>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-sm-9">
                                    <label>

                                    </label>
                                </div>
                                <button onclick="reset_data_list('offer_received')" class="btn btn-primary howler"  title="Search">Approve</button>
                                <button onclick="reset_data_list('offer_not_received')" class="btn btn-primary howler"  title="Search">Not Approve </button>
                                <button class="btn btn-primary howler flt" title="Reset" onclick="reset_data_list('')" title="Reset">All</button>
                                <div><p></p></div>
                            </div>
                            <div class="row">

                                <div class="col-sm-3"><div class="dataTables_length" id="example1_length">
                                        <label>Show 
                                            <select name="perpage" id="perpage" aria-controls="example1" class="form-control input-sm" onchange="changepages();" >
                                                <option <?php if(!empty($perpage) && $perpage == 10){ echo 'selected="selected"';}?> value="10">10</option>
                                                <option <?php if(!empty($perpage) && $perpage == 25){ echo 'selected="selected"';}?> value="25">25</option>
                                                <option <?php if(!empty($perpage) && $perpage == 50){ echo 'selected="selected"';}?> value="50">50</option>
                                                <option <?php if(!empty($perpage) && $perpage == 100){ echo 'selected="selected"';}?> value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-9">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <label>
                                            <input class="" type="hidden" name="uri_segment" id="uri_segment" value="<?=!empty($uri_segment)?$uri_segment:'0'?>">
                                            <?=$this->lang->line('common_search_title')?>:<input type="text" name="searchtext" id="searchtext" class="form-control input-sm" placeholder="" aria-controls="example1" value="<?=!empty($searchtext)?$searchtext:''?>">
                                            <button onclick="data_search('changesearch')" class="btn btn-primary howler"  title="Search"><?=$this->lang->line('common_search_title')?> </button>
                                            <button class="btn btn-primary howler flt" title="Reset" onclick="reset_data()" title="Reset"><?=$this->lang->line('common_reset_title')?></button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="common_div">
                                        <?=$this->load->view($this->type.'/'.$this->viewname.'/ajax_list','',true);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <div class="modal fade modal3" id="modal-clientLogin" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url().'admin/receiptlist/receipt_by_addpoint'?>"  ENCTYPE="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <table class="table table-bordered table-striped dataTable" id="example1" role="grid" aria-describedby="example1_info">
                        <tbody>
                        <div class="form-group">
                                <label for="country"><?=$this->lang->line('common_label_role_type')?>:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">Choose..</option>
                                    <?php
                                    if(!empty($client_data)){
                                        foreach ($client_data as $clint_report) {?>
                                    <option value="<?=$clint_report->user_id?>"><?=!empty($clint_report->com_name)?ucfirst($clint_report->com_name):''?></option>
                                            <?php }}?>
                                </select>
                            <input type="hidden" name="user_data" id="user_data" value="<?php echo $this->session->flashdata('user_id');?>">
                            </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <label>

                                </label>
                            </div>
                            <div class="col-sm-1"> <label>
                                    <button class="btn btn-primary howler" data-type="danger" title="submit">Add Point </button>
                                </label> </div>
                        </div>
                </tbody>

                    </table>
                </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>




</div><!-- /.content-wrapper -->

<?=$this->load->view($this->type.'/common/common','',true);?>
<script src="<?=$this->config->item('js_path');?>platform_nvt.js"></script>
<script>
    <?php if($this->session->flashdata('message_session') == 'successfully approved receipt'){ ?>

    $(function() {
        $("#modal-clientLogin").modal('toggle');
    });
    <?php }?>
</script>