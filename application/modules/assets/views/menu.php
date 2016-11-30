<?php $user_session = $this->session->userdata('reseeit_user_session');
if($user_session) {?>

	<li id="interactions" class="navItem disabled"><a href = "<?php echo base_url();?>home">Set Interactions</a></li>
	<li id="reports" class="navItem"><a href = "#">Reports</a></li>
	<li id="contact" class="navItem"><a href="<?= base_url('page/contactus') ?>">Contact Us</a></li>
	<li id="settings" class="dropdown-toggle" type="button" data-toggle="dropdown"><a><span class="glyphicon glyphicon-cog" aria-hidden="true" style="margin-left: 2em;"></span></a></li>
	<ul class="dropdown-menu dropdown-menu-right" style="font-size: 0.8em; background-color: rgb(242, 242, 242); min-width: 8em;">
		<?php if($user_session['role_name'] == 'Client admin'){?>
		<li id="settings"><a href="<?php echo base_url();?>home/client_account">Settings</a></li>
		<?php }elseif($user_session['role_name'] == 'Location admin account'){ ?>
		<li id="settings"><a href="<?php echo base_url();?>home/Location_admin_account">Settings</a></li>
		<?php }elseif($user_session['role_name'] == 'Location user account'){ ?>
		<li id="settings"><a href="<?php echo base_url();?>home/location_user_account">Settings</a></li>
		<?php }?>
		<li id="logout" style="margin: 0.5em 0em 0.5em 0em;">
			<a href="<?php echo base_url();?>home/logout">Logout</a>
		</li>
	</ul>

<?php }else {?>

	<li id="home" class="navItem <?php if ($this->uri->segment(1) == 'home') { ?> disabled <?php } ?>">
		<a href="<?= base_url('home') ?>">Home</a></li>
	<?php
	if (!empty($menu_page)) {
		foreach ($menu_page as $row) {
			if (!empty($row['slug'])) {
				?>
				<li id="<?= !empty($row['slug']) ? $row['slug'] : '' ?>"
					class="navItem <?php if ($this->uri->segment(2) == $row['slug']) { ?> disabled <?php } ?>"><a
						href="<?= base_url('page/' . $row['slug']) ?>"><?= !empty($row['page_name']) ? $row['page_name'] : '' ?></a>
				</li>
				<?php
			}
		}
	}
}
?>
