<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_add_user');
            echo form_open('user/add', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <select name="group_id" id="group_id">
                        <option value="" disabled selected>SELECT</option>
                        <?php
                            foreach($groups->result_array() AS $g) {
                                echo '<option value="'.$g['group_id'].'" '.set_select('group_id', $g['group_id']).' >'.$g['group_name'].'</option>';
                            }
                        ?>
                    </select>
                    <label for="group_id">Group <?php echo form_error('group_id'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="user_name" id="user_name" value="<?php echo set_value('user_name'); ?>" placeholder="">                    
                    <label for="user_name">User Name <?php echo form_error('user_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="" class="validate">                    
                    <label for="email" data-error="wrong" data-success="right">Email <?php echo form_error('email'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="">                    
                    <label for="password">Password <?php echo form_error('password'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="real_name" id="real_name" value="<?php echo set_value('real_name'); ?>" placeholder="">                    
                    <label for="real_name">Real Name <?php echo form_error('real_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="expire_date" id="expire_date" value="" placeholder="" class="datepicker">
                    <label for="expire_date">Expire Date</label>
                </div>
            </div>
            <div class="row">
                <label for="status">Status User</label>
                <div class="switch">
                    <label>Deactive<input type="checkbox" name="status" id="status" value="1" checked><span class="lever"></span>Active</label>
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