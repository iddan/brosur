<?php echo $this->session->flashdata('message'); ?>
<div class="card-panel">
    <div class="row">
        <?php
            $attributes = array('class' => 'col s12', 'id' => 'form_edit_user');
            echo form_open('', $attributes);
        ?>
            <div class="row">
                <div class="input-field">
                    <select name="group_id" id="group_id">
                        <option value="" disabled selected>SELECT</option>
                        <?php
                            foreach($groups->result_array() AS $g) {
                                if($g['group_id'] == $data['group_id']) {
                                    echo '<option value="'.$g['group_id'].'" selected>'.$g['group_name'].'</option>';
                                } else {
                                    echo '<option value="'.$g['group_id'].'">'.$g['group_name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label for="group_id">Group <?php echo form_error('group_id'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="user_name" id="user_name" value="<?php echo $data['user_name']; ?>" placeholder="">
                    <label for="user_name">User Name <?php echo form_error('user_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" placeholder="" class="validate">                    
                    <label for="email" data-error="wrong" data-success="right">Email <?php echo form_error('email'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="password" id="password" value="" placeholder="">                    
                    <label for="password">Password (Clear this if it did not change Password) <?php echo form_error('password'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="text" name="real_name" id="real_name" value="<?php echo $data['real_name']; ?>" placeholder="">                    
                    <label for="real_name">Real Name <?php echo form_error('real_name'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <?php
                        if($data['group_id'] == 1 || $data['group_id'] == 2) {
                            echo '<input type="text" name="expire_date" id="expire_date" value="" placeholder="" class="datepicker" disabled>';
                        } else {
                            echo '<input type="text" name="expire_date" id="expire_date" value="'.$data['expire_date'].'" placeholder="" class="datepicker">';                            
                        }
                    ?>                    
                    <label for="expire_date">Expire Date</label>
                </div>
            </div>
            <div class="row">
                <label for="status">Status User</label>
                <div class="switch">
                    <?php
                        if($data['user_id'] == 1) {
                            echo '<label>Deactive<input type="checkbox" name="status" id="status" value="1" checked disabled><span class="lever"></span>Active</label>';
                        } else {
                            if ($data['status'] == 1) {
                                echo '<label>Deactive<input type="checkbox" name="status" id="status" value="1" checked><span class="lever"></span>Active</label>';
                            } else {
                                echo '<label>Deactive<input type="checkbox" name="status" id="status" value="1"><span class="lever"></span>Active</label>';
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input type="submit" value="Update" class="btn light-blue">
                </div>    
            </div>
        </form>
    </div>
</div>