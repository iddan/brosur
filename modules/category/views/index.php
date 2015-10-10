<?php echo $this->session->flashdata('message'); ?>
<a href="add" class="waves-effect waves-light btn">Add Category</a>
<table class="hoverable" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Category</th>
            <th>Category Level</th>
            <th>Category Parent</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() as $category) {
?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><?php echo $category->category_name; ?></td>
            <td><?php 
                if($category->category_level == 0) {
                    echo 'Level Parent';
                } else if($category->category_level == 1) {
                    echo 'Level '.$category->category_level;
                } else if($category->category_level == 2) {
                    echo 'Level '.$category->category_level;
                }
            ?></td>
            <td><?php 
                if(!$category->category_parent) {
                    echo 'Category Parent';
                } else {
                    echo $category->category_parent;
                }
            ?></td>
            <td><?php echo $category->description; ?></td>
            <td>
                <a href="edit/<?php echo $category->category_id; ?>"><i class="material-icons">edit</i></a>
                <a href="delete/<?php echo $category->category_id; ?>" onclick="return confirmDelete();"><i class="material-icons">delete</i></a>
            </td>
        </tr>
<?php
    $no ++;
    }        
?>        
    </tbody>
</table>