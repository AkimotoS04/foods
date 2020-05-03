<?php echo validation_errors(); ?>

<?php echo form_open_multipart('foods/add_menu'); ?>
<div class="row" style="color:white; margin-top:60px">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> <?= $title; ?>     <span class="fs-home-logo">FoodShala</span></h2>
  <div class="form-group <?=form_error("name") ? "has-error" : null?>">
    <label>Name</label>
    <input name="name" value="<?php echo set_value('name'); ?>" type="text" class="form-control" placeholder="Enter name of food.">
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
    <input name="price" value="<?php echo set_value('price'); ?>" type="number" class="form-control" placeholder="Enter price.">
    <span class='help-block' style='color:red'><?php echo form_error('price'); ?></span>
  </div>
  <div class="form-group <?=form_error("stock") ? "has-error" : null?>">
    <label>Stock</label>
    <input name="stock"  value="<?php echo set_value('stock'); ?>" type="number" class="form-control" placeholder="Enter stock.">
    <span class='help-block' style='color:red'><?php echo form_error('stock'); ?></span>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image">
  </div>
  <input name="rating" type="hidden" value="5">
  <button type="submit" class="btn btn-primary btn-block">Add</button>
</div>
</div>
<?php echo form_close(); ?>
