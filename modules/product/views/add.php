<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_add_product');
            echo form_open_multipart('product/add', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <select name="category_id" id="category_id">
                        <option value="" disabled selected>SELECT</option>
                        <?php
                            foreach($category->result_array() AS $c){
                                echo '<option value="'.$c['category_id'].'" '.set_select('category_id', $c['category_id']).' >'.$c['category_name'].'</option>';
                            }
                        ?>
                    </select>
                    <label>Category Product <?php echo form_error('category_id'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="product_name" id="product_name" value="<?php echo set_value('product_name'); ?>" placeholder="">                    
                    <label for="product_name">Product Name <?php echo form_error('product_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="price" id="price" value="<?php echo set_value('price'); ?>" placeholder="">                    
                    <label for="price">Price <?php echo form_error('price'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <textarea name="description" id="textarea1" placeholder="" class="materialize-textarea"><?php echo set_value('description'); ?></textarea>
                    <label for="description">Description <?php echo form_error('description'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="images[]" id="images" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" placeholder="Upload one or more image (.gif, .jpg, .jpeg, .png) Max 1 Mb" class="file-path validate">
                    </div>
                </div>
                <!-- <div class="input-field">
                    <input type="file" name="images[]" id="images" multiple>
                    <span>*Image (gif, jpg, jpeg, png) | Max 1 Mb | Max Upload 5 Images</span>
                </div> -->
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="submit" value="Save" class="btn">
                    <a class="waves-effect waves-light btn" onClick="history.go(-1);">Back</a>
                </div>    
            </div>
        </form>
    </div>
</div>