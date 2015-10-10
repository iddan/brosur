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
                <?php                    
                    $image_filename = $data['image_filename'];
                    if($image_filename == '') {
                        echo '<img class="materialboxed responsive-img" data-caption="No Images" width="100" src="'.base_url().'assets/images/no-image.jpg">';
                    } else {
                        $split = explode("|", $image_filename);
                        for($i=0; $i< count($split); $i++) {
                            echo '<img class="materialboxed responsive-img" data-caption="'.$split[$i].'" width="100" src="'.base_url().'assets/images/products/'.$split[$i].'">';
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
                        <input type="text" placeholder="Upload one or more image (.gif, .jpg, .jpeg, .png) Max 1 Mb" class="file-path validate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="submit" value="Update" class="btn">
                    <a class="waves-effect waves-light btn" onClick="history.go(-1);">Back</a>
                </div>    
            </div>
        </form>
    </div>
</div>