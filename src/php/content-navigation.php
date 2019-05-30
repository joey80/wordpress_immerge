<?php
    // We need to do this to include the logo image with the nav links
    function my_nav_wrap() {
	    $wrap  = '<ul id="%1$s" class="%2$s">';
		$wrap .= '<li><a class="brand" href="/"><img class="immerge_lazy" data-type="img" data-src="http://100.26.102.174/wp-content/uploads/2019/05/logo-small1.png"></a></li>';
		$wrap .= '%3$s';
		$wrap .= '</ul>';
		return $wrap;
	}
?>

<!-- .logonav start -->
<div class="logonav logonav--hide">
    <nav class="logonav__nav logonav__nav--hide">

		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => my_nav_wrap()
			) );
		?>

    </nav>
    <div
    	class="logonav__sprout immerge_lazy"
        data-type="bg"
        data-src="http://100.26.102.174/wp-content/uploads/2019/05/logo_sprout.png">
    </div>
</div><!-- .logonav end -->