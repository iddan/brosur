<!-- <?php 
        foreach($data->result_array() AS $detail) {
            $image_filename = $detail['image_filename'];
            if(!$image_filename) {
                echo '<img class="responsive-img" src="'.base_url().'assets/images/no-image.jpg">';
            } else {
                $split = explode("|", $image_filename);
                for($i=0; $i<count($split); $i++) {
                    echo '<img class="responsive-img materialboxed" src="'.base_url().'assets/images/products/'.$split[$i].'">';
                }
            }
        }
    ?> -->
<div class="slider">
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
</div>
<a class="waves-effect waves-light btn" onClick="history.go(-1);">Back</a>