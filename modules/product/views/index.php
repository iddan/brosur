<?php echo $this->session->flashdata('message'); ?>
<a href="add" class="waves-effect waves-light btn">Add Product</a>
<table class="hoverable" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Price</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() AS $product) {
?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><?php echo $product->product_name; ?></td>
            <td>Rp. <?php echo number_format($product->price,0,',','.'); ?></td>
            <td><a class="modal-trigger" href="#<?php echo $product->product_id; ?>">Detail</a></td>
            <td>
                <a href="edit/<?php echo $product->product_id; ?>"><i class="material-icons">edit</i></a>
                <a href="delete/<?php echo $product->product_id; ?>" onclick="return confirmDelete();"><i class="material-icons">delete</i></a>
            </td>
        </tr>
<?php
    $no ++;
    }        
?>        
    </tbody>
</table>
<?php
    foreach($data->result_array() AS $detail) {
?>
<div id="<?php echo $detail['product_id']; ?>" class="modal">
    <div class="modal-content">
        <h5><?php echo $detail['product_name']; ?></h5>
        <p class="flow-text">
            Category Product : <?php echo $detail['category_name']; ?><br>            
            <?php echo $detail['description']; ?><br>
            <a href="images/<?php echo $detail['product_id']; ?>" class="waves-effect waves-light btn">View Images</a>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
<?php
    }
?>