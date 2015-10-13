<?php echo $this->session->flashdata('message'); ?>
<a href="add" class="waves-effect waves-light btn light-blue">Add Category</a>
<p class="flow-text">* Click "<b>Category</b>" for details</p>
<table class="z-depth-2" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() as $category) {
?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><a class="modal-trigger" href="#<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></a></td>
        </tr>
<?php
    $no ++;
    }
?>
    </tbody>
</table>
<?php
    foreach($data->result() AS $category) {
        if($category->category_level == 0) {
            $category_level = 'Level Parent';
        } else if($category->category_level == 1) {
            $category_level = 'Level '.$category->category_level; 
        } else if($category->category_level == 2) {
            $category_level = 'Level '.$category->category_level;
        }

        if(!$category->category_parent) {
            $category_parent = '-';
        } else {
            $category_parent = $category->category_parent;
        }
?>
        <div id="<?php echo $category->category_id; ?>" class="modal">
            <div class="modal-content">
                <p class="flow-text">
                    <b>Detail Category</b><br>
                    Category Level : <?php echo $category_level; ?><br>
                    Category Parent : <?php echo $category_parent; ?><br>
                    Category Name : <?php echo $category->category_name; ?><br>
                    Description : <?php echo $category->description; ?><br>
                </p>
                <div class="center">
                    <a href="edit/<?php echo $category->category_id; ?>" class="waves-effect waves-light btn light-blue"><i class="material-icons">edit</i></a>
                    <a href="delete/<?php echo $category->category_id; ?>" class="waves-effect waves-light btn light-blue" onclick="return confirmDelete();"><i class="material-icons">delete</i></a>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
            </div>
        </div>
<?php
    }
?>