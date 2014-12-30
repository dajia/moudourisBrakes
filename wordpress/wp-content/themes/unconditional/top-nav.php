<nav class="navbar navbar-trans navbar-static-top" role="navigation">
  <div class="container">
    <?php
    wp_nav_menu( array( 'menu' => 'User menu', 'items_wrap' =>
      '<ul class="nav navbar-nav pull-right">%3$s</ul>'
    ));
    ;?>
    <div class="navbar-header pull-right">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'nav-container collapse navbar-collapse',
            'container_id'      => 'navbar-collapse',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
    ?>

  </div>
</nav>

