<?php 
	$pt_meta_data = zo_post_meta_data();
	$gallery = !empty($pt_meta_data->_zo_portfolio_images) ? $pt_meta_data->_zo_portfolio_images : '';
	$client = !empty($pt_meta_data->_zo_portfolio_client) ? $pt_meta_data->_zo_portfolio_client : '';
	$date = !empty($pt_meta_data->_zo_portfolio_date) ? $pt_meta_data->_zo_portfolio_date : '';
	$skill = !empty($pt_meta_data->_zo_portfolio_skills) ? $pt_meta_data->_zo_portfolio_skills : '';
	$recent = !empty(zo_get_data_theme_options('protfolio_recent')) ? zo_get_data_theme_options('protfolio_recent') : "0";
	$recent_col = !empty(zo_get_data_theme_options('recent_column')) ? zo_get_data_theme_options('recent_column') : 3;
?>
<div class="row">
	<div class="zo-pf-head col-md-12">
		<h4 class="zo-pf-title"><?php the_title();?></h4>
		<p><?php the_content();?></p>
	</div>

	<div class="col-md-12">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php 
					if($gallery){
					$gallery = explode(",", $gallery);
					$i = 0; 
				?>
					<?php foreach ($gallery as $image_id): ?>
						<?php
						$attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
						if($attachment_image[0] != ''):?>
							<div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
								<img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
							</div>
							<?php $i++; endif; ?>
					<?php endforeach; ?>
				<?php }?>
			</div>
			<div class="carousel-nav">
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="fa fa-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="fa fa-chevron-right"></span>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="zo-pf-description">
			<div class="zo-pf-project-title"><h6><?php echo esc_attr(zo_get_data_theme_options('pt_description'));?></h6></div>
			<?php the_excerpt();?>
		</div>
	</div>

	<div class="col-md-3">
		<div class="zo-pf-details">
			<div class="zo-pf-project-title"><h6><?php echo esc_attr(zo_get_data_theme_options('pt_details'))?></h6></div>
			<div class="pf-date"><b><?php echo esc_attr(zo_get_data_theme_options('pt_details_date'))?></b> <?php echo esc_attr($date);?></div>
			<div class="pf-client"><b><?php echo esc_attr(zo_get_data_theme_options('pt_details_client'))?></b> <?php echo esc_attr($client);?></div>
			<div class="pf-skill"><b><?php echo esc_attr(zo_get_data_theme_options('pt_details_skill'))?></b> <?php echo esc_attr($skill);?></div>
			<div class="pf-cat"><b><?php echo esc_attr(zo_get_data_theme_options('pt_details_cat'))?></b> <?php the_terms( get_the_ID(), 'portfolio', '' , ' / ' ); ?></div>
		</div>

		<div class="zo-pf-share">
			<div class="zo-pf-project-title"><h6><?php echo esc_attr(zo_get_data_theme_options('pt_share'));?></h6></div>
			<ul class="socials">
				<li class="facebook"><a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() );?>"><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href="<?php echo esc_url('https://twitter.com/intent/tweet?text=' . get_the_title() . '&url=' . get_the_permalink() );?>"><i class="fa fa-twitter"></i></a></li>
				<li class="google"><a href="<?php echo esc_url('https://plus.google.com/share?url=' . get_the_permalink() );?>"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
	</div>

	<div class="col-md-12"><?php comments_template( '', true ); ?></div>
	
	<?php if($recent) {?>
		<div class="zo-pt-recent">
			<div class="col-md-12">
				<div class="recent-head">
					<h4 class="zo-pf-title"><?php echo esc_attr(zo_get_data_theme_options('pt_recent'));?></h4>
					<p><?php print(zo_get_data_theme_options('pt_recent_desc'));?></p>
				</div>
				<div class="recent-content">
					<?php 
						$zo_carousel = '[zo_carousel xsmall_items="1" small_items="2" medium_items="'. esc_attr($recent_col) .'" large_items="'. esc_attr($recent_col) .'" image_size="custom" image_width="570" image_height="542" title_link="1" margin="30" loop="1" mousedrag="1" touchdrag="1" nav="1" dots="0" center="0" autoplay="1" class="nav-center-bottom" source="size:5|order_by:date|post_type:portfolio" zo_template="zo_carousel.php"]';
						echo do_shortcode($zo_carousel);
					?>
				</div>
			</div>
		</div>
	<?php }?>
</div>