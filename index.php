<?php get_header(); ?>
		
		<?php if(of_get_option('blog_sidebar', '1')): ?><div id="container-sidebar"><?php endif; ?>
			
			<?php $page_for_posts = get_option('page_for_posts'); ?>
			<div id="breadcrumb"><a href="<?php echo site_url(); ?>"><?php _e('Home','progression'); ?></a> / <?php echo get_the_title($page_for_posts); ?></div>
			
			<?php $page_for_posts = get_option('page_for_posts'); ?>
			<h2><?php echo get_the_title($page_for_posts); ?></h2>
			
			

			<?php if(of_get_option('blog_page_template', '1')): ?>
			<?php include 'blog-1-column.php'; ?>	
			<?php else: ?>
			<?php include 'blog-2-column.php'; ?>	
			<?php endif; ?>
			
			
			<?php kriesi_pagination($pages = '', $range = 2); ?>
		
		<?php if(of_get_option('blog_sidebar', '1')): ?></div><!-- close #container-sidebar --><?php endif; ?>
		
<?php if(of_get_option('blog_sidebar', '1')): ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>