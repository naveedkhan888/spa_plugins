<?php if ( !defined( 'ABSPATH' ) ) exit();

    $sevs     = xp_sev_get_services_box( $args );
    $column   = isset( $args['number_column'] ) ? $args['number_column'] : 'three_column' ;
    $count    = 0;

?>

<div class="xp-service-box-elementor <?php echo esc_attr( $number_column ) ; ?>">

	<?php if( $sevs->have_posts() ) : while ( $sevs->have_posts() ) : $sevs->the_post(); $count += 1; $args['count'] = $count;

		if( $template === 'template1' ) {
        	xpsev_get_template( 'parts/item-service.php', $args );

        } elseif( $template === 'template2' ) {
        	xpsev_get_template( 'parts/item-service2.php', $args );

        } elseif( $template === 'template3' ) {
        	xpsev_get_template( 'parts/item-service3.php', $args );

        } elseif( $template === 'template4' ) {
        	xpsev_get_template( 'parts/item-service4.php', $args );

        } else {
        	xpsev_get_template( 'parts/item-service.php', $args );
        }

	endwhile; endif; wp_reset_postdata(); ?>

</div>