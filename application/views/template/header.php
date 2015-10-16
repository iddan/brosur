<header>
<div class="navbar-fixed">
    <nav class="light-blue lighten-1" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <?php if($this->session->userdata('group_id') == 1) { ?>
                    <!-- for desktop -->
                    <a href="" class="hide-on-small-only brand-logo left"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="48"></a>
                    <ul class="hide-on-med-and-down right">
                        <li><a href="<?php echo base_url('dashboard/index'); ?>" class="waves-effect waves-light">Dashboard</a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Management<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="<?php echo base_url('main/logout'); ?>" class="waves-effect waves-light">Logout</a></li>
                    </ul>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="<?php echo base_url('user/index'); ?>">Users</a></li>
                            <li><a href="<?php echo base_url('product/index'); ?>">Products</a></li>
                            <li><a href="<?php echo base_url('category/index'); ?>">Categories</a></li>
                        </ul>
                    <!-- for mobile -->
                    <a href="" class="hide-on-med-and-up brand-logo left"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="41"></a>
                    <a href="#" data-activates="mobile" class="button-collapse right"><i class="material-icons">more_vert</i></a>
                    <ul class="side-nav" id="mobile">
                        <li class="center">
                            <img src="<?php echo base_url(); ?>assets/images/user.png">
                            <a><?php echo $this->session->userdata('real_name'); ?></a>
                        </li>
                        <div class="divider"></div>
                        <li><a href="<?php echo base_url('dashboard/index'); ?>" class="waves-effect waves-light">Dashboard</a></li>
                        <ul class="collapsible collapsible-accordion">
                            <li><a class="collapsible-header waves-effect waves-light">Management<i class="material-icons right">arrow_drop_down</i></a>
                                <div style="display: none;" class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url('user/index'); ?>">Users</a></li>
                                        <li><a href="<?php echo base_url('product/index'); ?>">Products</a></li>
                                        <li><a href="<?php echo base_url('category/index'); ?>">Categories</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <li><a href="<?php echo base_url('main/logout'); ?>" class="waves-effect waves-light">Logout</a></li>
                    </ul>
                <?php } else { ?>
                    <!-- for desktop -->
                    <a href="" class="hide-on-small-only brand-logo left"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="48"></a>
                    <ul class="hide-on-med-and-down right">
                        <li><a href="<?php echo base_url('main/index'); ?>" class="waves-effect waves-light">Home</a></li>
                        <li><a class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown2"><?php echo $this->session->userdata('real_name'); ?><i class="material-icons right">arrow_drop_down</i></a></li>                        
                    </ul>
                        <ul id="dropdown2" class="dropdown-content">
                            <li><a href="<?php echo base_url('set_account/index/'.$this->session->userdata('user_id')); ?>">Setting</a></li>
                            <li><a href="<?php echo base_url('main/logout'); ?>">Logout</a></li>
                        </ul>
                    <!-- for mobile -->
                    <a href="" class="hide-on-med-and-up brand-logo left"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="41"></a>
                    <a href="#" data-activates="mobile" class="button-collapse right"><i class="material-icons">more_vert</i></a>
                    <ul class="side-nav" id="mobile">
                        <li class="center">
                            <img src="<?php echo base_url(); ?>assets/images/user.png">
                            <a><?php echo $this->session->userdata('real_name'); ?></a>
                        </li>
                        <div class="divider"></div>
                        <li><a href="<?php echo base_url('main/index'); ?>" class="waves-effect waves-light">Home</a></li>
                        <li><a href="<?php echo base_url('set_account/index/'.$this->session->userdata('user_id')); ?>">Setting</a></li>
                        <li><a href="<?php echo base_url('main/logout'); ?>" class="waves-effect waves-light">Logout</a></li>
                    </ul>
            	<?php } ?>
        	</div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col s12"><p class="flow-text"><a href="">CV. Gemilang Jaya Elektronik</a><br><?php echo $title; ?></p></div>        
    </div>
</div>
</header>