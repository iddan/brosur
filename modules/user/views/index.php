<?php echo $this->session->flashdata('message'); ?>
<a href="add" class="waves-effect waves-light btn light-blue">Add User</a>
<div class="collection">
    <a href="<?php echo base_url('user/user_online'); ?>" class="collection-item">User Online<span class="badge"><?php echo $user_online; ?></span></a>
</div>
<p class="flow-text">* Click "<b>Username</b>" for details</p>
<table class="z-depth-2" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Expire</th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() AS $user) {
        if ($user->group_id == 3) {
            if ($user->expire_date < date('Y-m-d') || $user->status == 0) {
                $row_color = 'red';
            } else if ($user->expire_date <= date('Y-m-d')) {
                $row_color = 'yellow';
            } else {
                $row_color = '';
            }
            $expire_date = $user->expire_date;
        } else if ($user->group_id == 2) {
            if ($user->status == 0) {
                $row_color = "red";
            } else {
                $row_color = '';
            }
            $expire_date = '-';
        } else if ($user->group_id == 1) {
            $row_color = '';
            $expire_date = '-';
        }
?>
        <tr class="<?php echo $row_color; ?>">
            <td><?php echo $no; ?>.</td>
            <td><a class="modal-trigger" href="#<?php echo $user->user_id; ?>"><?php echo $user->user_name; ?></a></td>
            <td><?php echo $expire_date; ?></td>
        </tr>
<?php
    $no ++;
    }        
?>        
    </tbody>
</table>
<?php
    foreach ($data->result() AS $user) {
        if ($user->group_id == 3) {
            $group = 'Member';
            if ($user->expire_date < date('Y-m-d') || $user->status == 0) {
                $status = '<span class="red-text">Not Active</span>';
                $expire_date = '<span class="red">'.$user->expire_date.'</span>';
            } else if ($user->expire_date <= date('Y-m-d')) {
                $status = '<span class="green-text">Active</span>';
                $expire_date = '<span class="yellow">'.$user->expire_date.'</span>';
            } else {
                $status = '<span class="green-text">Active</span>';
                $expire_date = '<span class="green">'.$user->expire_date.'</span>';
            }            
        } else if ($user->group_id == 2) {
            $group = 'VIP';            
            if ($user->status == 0) {
                $status = '<span class="red-text">Not Active</span>';
            } else {
                $status = '<span class="green-text">Active</span>';
            }
            $expire_date = '-';
        } else if ($user->group_id == 1) {
            $group = 'Admin';
            $status = '<span class="green-text">Active</span>';
            $expire_date = '-';
        }
?>
        <div id="<?php echo $user->user_id; ?>" class="modal">
            <div class="modal-content">
                <p class="flow-text">
                    <b>Detail User</b><br>
                    Group : <?php echo $group; ?><br>
                    User Name : <?php echo $user->user_name; ?><br>
                    Email : <?php echo $user->email; ?><br>
                    Real Name : <?php echo $user->real_name; ?><br>
                    Status : <?php echo $status; ?><br>
                    Expire Date : <?php echo $expire_date; ?><br>
                </p>
                <div class="center">
                    <a href="edit/<?php echo $user->user_id; ?>" class="waves-effect waves-light btn light-blue"><i class="material-icons">edit</i></a>
                    <a href="delete/<?php echo $user->user_id; ?>" class="waves-effect waves-light btn light-blue" onclick="return confirmDelete();"><i class="material-icons">delete</i></a>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect btn-flat">Close</a>
            </div>
        </div>
<?php
    }
?>