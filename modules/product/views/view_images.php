<?php 
    foreach($data->result_array() AS $detail) {
        echo '<b>'.$detail['product_name'].'</b>';
        $image_filename = $detail['image_filename'];
        if(!$image_filename) {
            echo '<img class="responsive-img" src="'.base_url().'assets/images/no-image.jpg">';
        } else {
            $split = explode("|", $image_filename);
            for($i=0; $i<count($split); $i++) {
                echo '<img class="responsive-img materialboxed" data-caption="'.$split[$i].'" src="'.base_url().'assets/images/products/'.$split[$i].'">';
            }
        }
    }
?>
<!-- <div class="slider">
    <ul class="slides">
    <?php 
        foreach($data->result_array() AS $detail) {
            $image_filename = $detail['image_filename'];
            if(!$image_filename) {
                echo '<li>
                    <img src="'.base_url().'assets/images/no-image.jpg">
                <li>';
            } else {
                $split = explode("|", $image_filename);
                for($i=0; $i<count($split); $i++) {
                    echo '<li>
                        <img src="'.base_url().'assets/images/products/'.$split[$i].'">
                    </li>';
                }
            }
        }
    ?>
    </ul>
</div> -->