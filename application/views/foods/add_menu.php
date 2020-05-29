<?php echo validation_errors(); ?>

<?php echo form_open_multipart('foods/add_menu'); ?>
<div class="row" style="color:white;">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <h2 class="text-center"> <?= $title; ?><p><span class="fs-home-logo">Foodies</p></span></h2>
    <div class="form-group <?=form_error("name") ? "has-error" : null?>">
      <label>Name</label>
      <input name="name" value="<?php echo set_value('name'); ?>" type="text" class="form-control" placeholder="Enter name of food.">
      <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
    </div>
    <div class="form-group">
    <label>Food Type</label>
    <select class="form-control" name="veg">
      <option value="1">Foods</option>
      <option value="0">Drinks</option>
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
    <div class="form-group <?=form_error("description") ? "has-error" : null?>">
      <label>Description</label>
      <input name="description"  value="<?php echo set_value('description'); ?>" type="text" class="form-control" placeholder="Enter Description.">
      <span class='help-block' style='color:red'><?php echo form_error('description'); ?></span>
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
