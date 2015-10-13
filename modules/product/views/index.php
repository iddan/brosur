<?php echo $this->session->flashdata('message'); ?>
<a href="add" class="waves-effect waves-light btn light-blue">Add Product</a>
<p class="flow-text">* Click "<b>Product</b>" for details</p>
<table class="z-depth-2" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() AS $product) {
?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><a class="modal-trigger" href="#<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></a></td>
            <td>Rp. <?php echo number_format($product->price,0,',','.'); ?></td>
        </tr>
<?php
    $no ++;
    }
?>
    </tbody>
</table>
<?php
    foreach($data->result() AS $product) {
?>
        <div id="<?php echo $product->product_id; ?>" class="modal">
            <div class="modal-content">
                <p class="flow-text">
                    <b>Detail Product</b><br>
                    Category : <?php echo $product->category_name; ?><br>
                    Product Name : <?php echo $product->product_name; ?><br>
                    Price : Rp. <?php echo number_format( $product->price, 0 , '' , '.' ); ?>,-<br>
                    <?php echo $product->description; ?><br>
                </p>
                <div class="center">
                    <a href="images/<?php echo $product->product_id; ?>" class="waves-effect waves-light btn light-blue">View Images</a><br><br>
                    <a href="edit/<?php echo $product->product_id; ?>" class="waves-effect waves-light btn light-blue"><i class="material-icons">edit</i></a>
                    <a href="delete/<?php echo $product->product_id; ?>" class="waves-effect waves-light btn light-blue" onclick="return confirmDelete();"><i class="material-icons">delete</i></a>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
            </div>
        </div>
<?php
    }
?>