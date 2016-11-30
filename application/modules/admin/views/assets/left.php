<?php
	$this->type =ADMIN_SITE;
    $admin_session = $this->session->userdata('reseeit_admin_session'); 

    if($this->uri->segment(2)!= 'users')
	{
	  $this->session->unset_userdata('user_sortsearchpage_data');
	}
	if($this->uri->segment(2)!= 'admin_users')
	{
	  $this->session->unset_userdata('admin_user_sortsearchpage_data');
	}
	if($this->uri->segment(2)!= 'cms')
	{
	  $this->session->unset_userdata('cms_sortsearchpage_data');
	}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php if(!empty($admin_session['admin_image'])) { ?> 
                <img src="<?=$this->config->item('admin_user_small_img_url').$admin_session['admin_image']?>" class="user-image" alt="User Image">
                <?php } else { ?>
                <img src="<?=$this->config->item('admin_image_path')?>images.png" class="user-image" alt="User Image">
                <?php }?>
			</div>
			<div class="pull-left info">
				<p><?=!empty($admin_session['name'])?$admin_session['name']:''?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li <?php if($this->uri->segment(2)=='dashboard'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-circle-o text-aqua"></i> <span><?=$this->lang->line('dashboard_module_title')?></span></a></li>
			<?php if($admin_session['admin_type'] == 1) { ?> 
			<li <?php if($this->uri->segment(2)=='admin_users'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/admin_users')?>"><i class="fa fa-list-alt"></i> <span><?=$this->lang->line('admin_user_module_title')?></span></a></li>
			<?php } ?>
			<li <?php if($this->uri->segment(2)=='cms'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/cms')?>"><i class="fa fa-list-alt"></i> <span><?=$this->lang->line('cms_module_title')?></span></a></li>

			<li <?php if($this->uri->segment(2)=='roles'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/roles')?>"><i class="fa fa-list-alt"></i> <span><?=$this->lang->line('roles_module_title')?></span></a></li>

			<!--<li <?php if($this->uri->segment(2)=='roles_permission'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/roles_permission')?>"><i class="fa fa-list-alt"></i> <span><?=$this->lang->line('roles_per_module_title')?></span></a></li>-->

			<li <?php if($this->uri->segment(2)=='users'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/users')?>"><i class="fa fa-list-alt"></i> <span><?=$this->lang->line('users_module_title')?></span></a></li>

			<li <?php if($this->uri->segment(2)=='change_password'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/change_password')?>"><i class="fa fa-key"></i> <span><?=$this->lang->line('change_password_module_title')?></span></a></li>

			<li <?php if($this->uri->segment(2)=='receiptlist'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/receiptlist')?>"><i class="fa fa-key"></i> <span><?=$this->lang->line('receipt_label_name')?></span></a></li>


			<li <?php if($this->uri->segment(2)=='active_adds'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/active_adds')?>"><i class="fa fa-key"></i> <span><?=$this->lang->line('app_ads_label_name')?></span></a></li>

			<li <?php if($this->uri->segment(2)=='client_type'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/client_type')?>"><i class="fa fa-key"></i> <span><?=$this->lang->line('client_type_module_title')?></span></a></li>

			<li <?php if($this->uri->segment(2)=='point_add'){?> class="active" <?php } ?>><a href="<?=base_url($this->type.'/point_add')?>"><i class="fa fa-key"></i> <span><?=$this->lang->line('point_module_title')?></span></a></li>

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>