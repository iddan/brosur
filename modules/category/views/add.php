<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_add_category');
            echo form_open('category/add', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="category_name" id="category_name" value="<?php echo set_value('category_name'); ?>" placeholder="">
                    <label for="category_name">New Category Name <?php echo form_error('category_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <select name="category_level" id="category_level">
                        <option value="" disabled selected>SELECT</option>
                        <option value="0" <?php echo set_select('category_level', '0'); ?> >Level Parent</option>
                        <option value="1" <?php echo set_select('category_level', '1'); ?> >Level 1</option>
                        <option value="2" <?php echo set_select('category_level', '2'); ?> >Level 2</option>
                    </select>
                    <label>Category Level <?php echo form_error('category_level'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <select name="category_id" id="category_id">
                        <option value="" disabled selected>SELECT</option>
                        <option value="0" <?php echo set_select('category_id', '0'); ?> >Category Parent</option>
                        <?php
                            foreach($category->result_array() AS $c) {
                                echo '<option value="'.$c['category_id'].'" '.set_select('category_id', $c['category_id']).' >'.$c['category_name'].'</option>';
                            }
                        ?>
                    </select>
                    <label>Category Parent <?php echo form_error('category_id'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <textarea name="description" id="textarea1" placeholder="" class="materialize-textarea"><?php echo set_value('description'); ?></textarea>
                    <label for="description">Description <?php echo form_error('description'); ?></label>
                </div>
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