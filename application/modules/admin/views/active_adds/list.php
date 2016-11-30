<?php
$admin_session = $this->session->userdata('reseeit_admin_session');
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            In-App Ads List

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">In-App Ads List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">In-App Ads List</h3>
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
                                <button onclick="reset_data_list(1)" class="btn btn-primary howler"  title="Search">Active</button>
                                <button onclick="reset_data_list(0)" class="btn btn-primary howler"  title="Search">In Active </button>
                                <button class="btn btn-primary howler flt" title="Reset" onclick="reset_data_list()" title="Reset">All</button>
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
</div><!-- /.content-wrapper -->

<?=$this->load->view($this->type.'/common/common','',true);?>

