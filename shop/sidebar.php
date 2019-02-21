<?php if(of_get_option('fw_shop', '1')): ?>
<div id="sidebar">
<?php
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('WooCommerce Sidebar')): 
endif;
?>
</div>
<?php endif; ?>