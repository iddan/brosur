<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="eBrosur - CV. Gemilang Jaya Elektronik">
        <link href="<?php echo base_url(); ?>assets/images/logo.png" rel="shortcut icon">
        <title>eBrosur | Login</title>        
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css" media="screen,projection"/>
        <style type="text/css">
            #loading {
                position: fixed;
                left: 0px;
                top: 0%;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: #fff;
            }
        </style>
    </head>
    <body>
    <main>
        <div class="container">
        	<div class="center-align"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="40"></div>
        	<h5 class="center-align">Welcome to <a href="<?php echo base_url(); ?>">eBrosur</a></h5>
        	<h5 class="center-align">CV. Gemilang Jaya Elektronik</h5>
            <div id="loading">
                <div class="center">
                    <div class="preloader-wrapper active">
                        <div class="spinner-layer spinner-red-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <?php echo validation_errors(); ?>
    		<div class="card-panel">
    		  	<div class="row">
    		  		<?php
    		            $attributes = array('class' => 'col s12', 'id' => 'form_login');
    		            echo form_open('', $attributes);
    		        ?>
    			      	<div class="row">
    				        <div class="input-field">
    				          	<input type="text" name="user_name" id="user_name" value="<?php echo set_value('user_name'); ?>" required>
    				          	<label for="user_name">User Name</label>
    				        </div>
    			        	<div class="input-field">
    			          		<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" required>
    			          		<label for="password">Password</label>
    			        	</div>
    			        	<div class="input-field">
    			        		<input type="submit" value="Sign In" class="btn light-blue">
    			        	</div>    
    			      	</div>
    		    	</form>
    		  	</div>
    		</div>
            <!-- <?php
                echo "<pre>";
                    print_r($this->session->all_userdata());
                echo "</pre>";
            ?> -->
    		<ul class="collapsible" data-collapsible="accordion">
        		<li>
          			<div class="collapsible-header light-blue white-text"><i class="material-icons">contact_phone</i>Contact Admin</div>
          			<div class="collapsible-body">
          				<div class="section">
    					    <p><b>Hari Irianto</b><br><i class="material-icons">phone</i>0812 3456 7890</p>
    					</div>
    					<div class="divider"></div>
    					<div class="section">
    					    <p><b>Akbar Joe Insani</b><br><i class="material-icons">phone</i>0812 3456 7890</p>
    					</div>
          			</div>
        		</li>
      		</ul>
      	</div>
    </main>
	<footer class="page-footer transparent">
	    <div class="footer-copyright">
	        <div class="container">
	            <span class="light-blue-text">© <?php echo date('Y'); ?> Copyright</span> <a class="light-blue-text" href="http://www.solution14.com" target="_blank">Solution14</a>
	        </div>
	    </div>
	</footer>
     
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() { $("#loading").fadeOut("slow"); });
    </script>
    </body>
</html>