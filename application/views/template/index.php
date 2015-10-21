<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="eBrosur - CV. Gemilang Jaya Elektronik">
        <link href="<?php echo base_url(); ?>assets/images/logo.png" rel="shortcut icon">
        <title>eBrosur | <?php echo $title; ?></title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css" media="screen,projection"/>
        <!--Import datatables css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
        <style type="text/css">
            #loading {
                position: fixed;
                left: 0px;
                top: 14%;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: #fff;
            }
        </style>
    </head>
    <body>
        <?php echo $header; ?>
        <main>
            <div class="container">
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
                <?php echo $content; ?>
            </div>
            <div class="fixed-action-btn horizontal" style="bottom: 10px; right: 10px;">
                <a class="btn-floating btn-large red"><i class="large material-icons">navigation</i></a>
                <ul>
                    <li><div id='top'><a class="btn-floating blue"><i class="material-icons">keyboard_arrow_up</i></a></div></li>
                    <li><a class="btn-floating yellow" onClick="history.go(-1);"><i class="material-icons">arrow_back</i></a></li>
                </ul>
            </div>
        </main>
        <?php echo $footer; ?>
        <!--Import jquery-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            $(window).load(function() { $("#loading").fadeOut("slow"); });
            $(window).scroll(function() { 
                if($(this).scrollTop()>100) { 
                    $('#top').slideDown(200);
                } else { 
                    $('#top').slideUp(300); 
                } 
            });
            $('#top').click(function() { 
                $('body,html').animate({scrollTop:0},800) .animate({scrollTop:25},200) .animate({scrollTop:0},150) .animate({scrollTop:10},100) .animate({scrollTop:0},50);
            });

            $(document).ready(function() {
                $(".button-collapse").sideNav( {
                    menuWidth: 200,
                    edge: 'right'
                });
                $('.dropdown-button').dropdown();
                $('select').material_select();
                $('.datepicker').pickadate( {
                    format: 'yyyy-mm-dd',
                    selectMonths: true,
                    selectYears: 15
                });
                $('.modal-trigger').leanModal( {
                    dismissible: false
                });
                $('.slider').slider( {
                    full_width: true,
                    height: 400
                });

                $('#table').DataTable( {
                    "bLengthChange": false
                });
            });

            tinymce.init( {
                selector:'textarea',
                theme: "modern",
                skin: 'light'
            });

            function confirmDelete() {
                return confirm('Are you sure, you want to delete this data ?');
            }
        </script>
    </body>
</html>