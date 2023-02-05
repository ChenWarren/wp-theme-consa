<?php
/**
 * Cosa Theme Navbar for header
 * 
 * @package consa
 */

function get_child_menu_items($parent_id, $menu_items) {
    $child_menu_items = array();

    foreach($menu_items as $menu_item) {
        if($menu_item->menu_item_parent == $parent_id) {
            array_push($child_menu_items, $menu_item);
        }
    }
    return $child_menu_items;
}

$menu_location = get_nav_menu_locations();
$menu_id = $menu_location['primary'];
$header_nav_menu = wp_get_nav_menu_items($menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Logo start -->
    <div class="logo"><a href="/">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png' ?>"></a>
    </div>
    <!-- Logo end -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            foreach($header_nav_menu as $header_nav_menu_item) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_attr(esc_url($header_nav_menu_item->url)); ?>">
                    <?php echo esc_html($header_nav_menu_item->title) ?>
                    </a>
                </li>
                <?php
            }
            ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <!-- Search icon start  -->
            <div class="search_icon">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/search-icon.png' ; ?>">
            </div>
            <!-- Search icon end  -->
        </form>
    </div>
</nav>