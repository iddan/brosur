<?php echo $this->session->flashdata('message'); ?>
<div class="col s12 center">
    <p class="flow-text"><h5><?php echo $title2; ?></h5></p>
</div>
<?php
    foreach($data->result_array() AS $detail) {
?>
        <div class="slider">
            <ul class="slides">
            <?php
                $image_filename = $detail['image_filename'];
                if(!$image_filename) {
                    echo '<li>
                        <img src="'.base_url().'assets/images/no-image.jpg">
                    </li>';
                } else {
                    $split = explode("|", $image_filename);
                    for($i=0; $i<count($split); $i++) {
                        echo '<li>
                            <img src="'.base_url().'assets/images/products/'.$split[$i].'">
                        </li>';
                    }
                }
            ?>
            </ul>
        </div>
        <div class="row">
            <?php
                $image_filename = $detail['image_filename'];
                if(!$image_filename) {
                    echo '';
                } else {
                    $split = explode("|", $image_filename);
                    for($i=0; $i<count($split); $i++) {
                        echo '<div class="col s2">
                            <img class="responsive-img materialboxed" data-caption="'.$split[$i].'" src="'.base_url().'assets/images/products/'.$split[$i].'">
                        </div>';
                    }
                }
            ?>
        </div>
        <?php echo $detail['description']; ?>
<?php 
    }
?>
<div class="center">
    <a class="waves-effect waves-light btn light-blue" onClick="history.go(-1);">Back</a>
</div>