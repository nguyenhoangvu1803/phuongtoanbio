<?php get_header('404');?>
		<div id="primary" class="site-content">
			<div id="content" role="main" class="container">
			
				<article id="post-0" class="entry-error404 no-results not-found">
					<header class="entry-header">
						<h1><?php _e('404', 'ori'); ?></h1>
						<h2><?php _e('OOPS! NOT FOUND :(', 'ori'); ?></h2>
					</header>

					<div class="entry-content">
						<p><?php get_search_form (); ?></p>
					</div><!-- .entry-content -->
					
					<footer class="entry-footer">
						<a class="btn btn-black" href="#"><?php _e('Site Map', 'ori'); ?></a>
						<a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Homepage', 'ori'); ?></a>
					</footer>
				</article><!-- #post-0 -->

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer('404');?>