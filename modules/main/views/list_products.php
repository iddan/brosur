<?php echo $this->session->flashdata('message'); ?>
<div class="col s12 center">
    <p class="flow-text"><h5><?php echo $title2; ?></h5></p>
</div>
<table class="hoverable" id="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product Name</th>
        </tr>
    </thead>
    <tbody>
<?php
    $no = 1;
    foreach ($data->result() AS $product) {
?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><a href="<?php echo base_url().'main/'.$link_function.'/'.$product->product_id ?>"><?php echo $product->product_name; ?></a></td>
        </tr>
<?php
    $no ++;
    }        
?>        
    </tbody>
</table>
<br>
<div class="center">
    <a class="waves-effect waves-light btn light-blue" onClick="history.go(-1);">Back</a>
</div>