<?php if(of_get_option('search_form_products', '1')): ?>
	<form method="get" class="searchform" action="<?php echo home_url(); ?>/">
		<label for="s" class="assistive-text"><?php _e('Search','progression'); ?>:</label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php _e('Search','woocommerce'); ?>..." />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
	</form>

<?php else: ?>
	<?php get_product_search_form(); ?>
<?php endif; ?>