<?php echo $this->session->flashdata('message'); ?>
<div class="collection">
    <a href="<?php echo base_url('user/user_online'); ?>" class="collection-item">User Online<span class="badge"><?php echo $user_online; ?></span></a>
</div>
<div class="row center">
	<div class="col s12">
    	<h5 class="center-align">Management e-Brosur</h5>
  	</div>
	<div class="col s4">
		<a href="<?php echo base_url('user/index'); ?>"><i class="large material-icons">account_box</i><br>User</a>
	</div>
	<div class="col s4">
		<a href="<?php echo base_url('product/index'); ?>"><i class="large material-icons">menu</i><br>Products</a>
	</div>
	<div class="col s4">
		<a href="<?php echo base_url('category/index'); ?>"><i class="large material-icons">menu</i><br>Categories</a>
	</div>
</div>
<!-- <?php
	echo "<pre>";
		print_r($this->session->all_userdata());
	echo "</pre>";
?> -->