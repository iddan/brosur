<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_edit_product');
            echo form_open_multipart('', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <select name="category_id" id="category_id">
                        <option value="" disabled selected>SELECT</option>
                        <?php
                            foreach($category->result_array() as $c) {
                                if($c['category_id'] == $data['category_id']) {
                                    echo '<option value="'.$c['category_id'].'" selected>'.$c['category_name'].'</option>';
                                } else {
                                    echo '<option value="'.$c['category_id'].'">'.$c['category_name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label>Category</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="product_name" id="product_name" value="<?php echo $data['product_name']; ?>" placeholder="" required>                    
                    <label for="product_name">Product Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="price" id="price" value="<?php echo $data['price']; ?>" placeholder="" required>                    
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <textarea name="description" id="textarea1" placeholder="" class="materialize-textarea" required><?php echo $data['description']; ?></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <label for="current_images">Current Images</label><br>
                <?php                    
                    $image_filename = $data['image_filename'];
                    if($image_filename == '') {
                        echo '<img class="responsive-img" data-caption="No Images" width="100" src="'.base_url().'assets/images/no-image.jpg">';
                    } else {
                        $split = explode("|", $image_filename);
                        for($i=0; $i< count($split); $i++) {
                            echo '<div class="col s6 m2"><img class="responsive-img materialboxed" data-caption="'.$split[$i].'" width="100" src="'.base_url().'assets/images/products/'.$split[$i].'"></div>';
                        }
                    }
                ?>                
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="images[]" id="images" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" placeholder="" class="file-path validate">
                    </div>                    
                </div>
                <label for="upload_images">* Upload one or more Image (.gif | .jpg | .jpeg | .png)<br> * Max 1 Mb<br> * Max Upload 5 Images</label>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="submit" value="Update" class="btn light-blue">
                </div>    
            </div>
        </form>
    </div>
</div>