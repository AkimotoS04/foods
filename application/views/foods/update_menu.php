<?php 
		
    foreach($foods as $upd){
      
?>
<?php echo form_open_multipart("foods/update_menu?id=".$upd['id']); ?>
<div class="row" style="color:white; margin-top:60px">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> <?= $title; ?>     <span class="fs-home-logo">FoodShala</span></h2>
  <div class="form-group">
    <label>Food ID</label>
    <input name="id" type="text" class="form-control" value="<?php echo $upd['id'];?>" readonly>
  </div>
  <div class="form-group <?=form_error("name") ? "has-error" : null?>">
    <label>Name</label>
    <input name="name" type="text" class="form-control" value="<?php echo $upd['name']; ?>" placeholder="Enter name of food.">
    <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
  </div>
  <div class="form-group">
  <label>Food Type</label>
  <select class="form-control" name="veg">
    <option value="1">Veg</option>
    <option value="0">Non- Veg</option>
  </select>
  </div>
  <div class="form-group <?=form_error("price") ? "has-error" : null?>">
    <label>Price</label>
    <input name="price" type="number" value="<?php echo $upd['price']; ?>" class="form-control" placeholder="Enter price.">
    <span class='help-block' style='color:red'><?php echo form_error('price'); ?></span>
  </div>
  <div class="form-group <?=form_error("stock") ? "has-error" : null?>">
    <label>Stock</label>
    <input name="stock"  value="<?php echo $upd['stock']; ?>" type="number" class="form-control" placeholder="Enter stock.">
    <span class='help-block' style='color:red'><?php echo form_error('stock'); ?></span>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" />
  </div>
  <button type="submit" class="btn btn-primary btn-block">Update</button>
</div>
</div>
<?php echo form_close(); ?>
<?php } ?>
