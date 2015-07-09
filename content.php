<?php if ( has_post_thumbnail() ) : ?>

	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' ); $thumb_url = $thumb['0']; ?>

	<script type="text/javascript">
	
		jQuery(document).ready(function($) {

			$("#post-<?php the_ID(); ?>").backstretch("<?php echo $thumb_url; ?>");
			
		});
		
	</script>

	<a class="featured-media" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		
		<?php the_post_thumbnail('post-image'); ?>
		
	</a> <!-- /featured-media -->
		
<?php endif; ?>
	
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-header section medium-padding">
	
	<div class="post-meta-top">
	
		<?php 
			if ( 'espresso_events' == get_post_type() && is_front_page() ) :
				_e( 'Event', 'radcliffe' );
			elseif ( 'espresso_events' == get_post_type() && !is_front_page() ) :
				espresso_event_date();
			elseif ( 'espresso_venues' == get_post_type() ) :
				echo radcliffe_ee_venue_city_state();
			else :
				the_time(get_option('date_format')); 
			endif ?>
		
		<?php 
			if ( comments_open() ) {
				echo '<span class="sep">/</span> '; 
				if ( is_single() )
					comments_popup_link( '0 comments', '1 comment', '% comments', 'post-comments' ); 
				else
					comments_number( '0 comments', '1 comment', '% comments' ); 
			}
		?> 
		
		<?php if ( is_sticky() ) { echo '<span class="sep">/</span> '; _e('Sticky','radcliffe'); } ?>
		
	</div>
	
    <h2 class="post-title"><?php the_title(); ?></h2>
    	    
</a> <!-- /post-header -->

<?php if ( 'espresso_events' == get_post_type()	&& espresso_display_ticket_selector_in_event_list() && !( is_front_page() ) ) : ?>

	<div class="post-content section-inner thin event-archive-tickets">
		
		<div class="event-tickets" style="clear: both;">
			<?php espresso_ticket_selector( $post ); ?>
		</div>
		
		<div class="clear"></div>
	
	</div>

<?php endif; ?>