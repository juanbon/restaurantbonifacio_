<ul class="products">
	<?php foreach($products as $p): ?>
	<li>
		<h3><?php echo $p['descripcion']; ?></h3>
		
		<small>&euro;<?php echo $p['precio']; ?></small>
		<?php echo form_open('cart/add_cart_item'); ?>
			<fieldset>
				<label>Quantity</label>
				<?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
				<?php echo form_hidden('product_id', $p['codigo']); ?>
				<?php echo form_submit('add', 'Add'); ?>
			</fieldset>
		<?php echo form_close(); ?>
	</li>
	<?php endforeach;?>
</ul>
