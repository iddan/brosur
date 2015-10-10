<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_edit_category');
            echo form_open('', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="category_name" id="category_name" value="<?php echo $data['category_name']; ?>" placeholder="">
                    <label for="category_name">Category Name <?php echo form_error('category_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <select name="category_level" id="category_level">
                        <option value="" disabled>Select</option>
                        <?php
                            if ($data['category_level'] == 0) {
                                echo '<option value="0" selected>Level Parent</option>';
                                echo '<option value="1">Level 1</option>';
                                echo '<option value="2">Level 2</option>';
                            } else if ($data['category_level'] == 1) {
                                echo '<option value="0">Level Parent</option>';
                                echo '<option value="1" selected>Level 1</option>';
                                echo '<option value="2">Level 2</option>';
                            } else if ($data['category_level'] == 2) {
                                echo '<option value="0">Level Parent</option>';
                                echo '<option value="1">Level 1</option>';
                                echo '<option value="2" selected>Level 2</option>';
                            } else {
                                echo '<option value="0">Level Parent</option>';
                                echo '<option value="1">Level 1</option>';
                                echo '<option value="2">Level 2</option>';
                            }
                        ?>
                    </select>
                    <label>Category Level <?php echo form_error('category_level'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <select name="category_id" id="category_id">
                        <option value="" disabled>Select</option>
                        <?php
                            if ($data['id_parent'] == 0) {
                                echo '<option value="0" selected>Category Parent</option>';
                            } else {
                                echo '<option value="0">Category Parent</option>';
                            }
                            foreach($category->result_array() as $c) {
                                if($c['category_id'] == $data['id_parent']) {
                                    echo '<option value="'.$c['category_id'].'" selected>'.$c['category_name'].'</option>';
                                } else {
                                    echo '<option value="'.$c['category_id'].'">'.$c['category_name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label>Category Parent <?php echo form_error('category_id'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">                
                    <textarea name="description" id="textarea1" placeholder="" class="materialize-textarea"><?php echo $data['description']; ?></textarea>
                    <label for="description">Description <?php echo form_error('description'); ?></label>
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