<?php echo $this->session->flashdata('message'); ?>
<div class="row center">    
    <?php
        if($data->num_rows() > 0) {
            echo '<div class="col s12">
                <p class="flow-text"><h5>'.$title2.'</h5></p>
            </div>';

            foreach ($data->result() AS $category) {
                echo '<div class="col s6 m3">
                    <a href="'.base_url().'main/'.$link_function.'/'.$category->category_id.'"><i class="large material-icons">info_outline</i><br>'.$category->category_name.'</a>
                </div>';
            }
        } else {
            echo '<div class="card-panel"><span class="red-text">Data Not Found !</span></div>';
        }
    ?>
</div>
<!-- <?php
    echo "<pre>";
        print_r($this->session->all_userdata());
    echo "</pre>";
?> -->