<?
/*
Plugin Name: Perlur theme bulma menu plugin
Description: This plugin adds a custom field to menu.
Version: 1.0
Author: Perlur Group
Author URI: https://www.perlurgroup.cloud
License: GPL2
*/
class rc_perlur_mega_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
    // edit menu walker
        add_filter( 'wp_edit_nav_menu_walker', array( $this, 'rc_pg_edit_walker'), 10, 2 );
        // save menu custom fields
        add_action( 'wp_update_nav_menu_item', array( $this, 'rc_pg_update_custom_nav_fields'), 10, 3 );
    } // end constructor
    
    /**
     * Add custom fields to $item nav object
     * in order to be used in custom Walker
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    public function rc_pg_add_custom_nav_fields( $menu_item ) {

        $menu_item->is_mega_submenu_title = get_post_meta( $menu_item->ID, '_menu_item_is_mega_submenu_title', true );
        $menu_item->mega_menu_description = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_description', true );
        $menu_item->is_mega_menu_parent = get_post_meta( $menu_item->ID, '_menu_item_is_mega_menu_parent', true );
        $menu_item->is_mega_menu_item = get_post_meta( $menu_item->ID, '_menu_item_is_mega_menu_item', true );

        return $menu_item;

    }
    /**
     * Save menu custom fields
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    public function rc_pg_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

        // Check if element is properly sent
        if ( is_bool( $_REQUEST['menu-item-is-mega-submenu-title']) 
        && is_bool( $_REQUEST['menu-item-is-mega-menu-item'] )
        && is_bool( $_REQUEST['menu-item-is-mega-menu-parent'] )
        && is_bool( $_REQUEST['menu-item-mega-menu-description']) ) {

            $is_mega_submenu_title_value = $_REQUEST['menu-item-is-mega-submenu-title'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_is_mega_submenu_title', $is_mega_submenu_title_value );

            $is_mega_menu_item_value = $_REQUEST['menu-item-is-mega-menu-item'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_is_mega_menu_item', $is_mega_menu_item_value );

            $mega_menu_description_value = $_REQUEST['menu-item-mega-menu-description'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_description', $mega_menu_description_value );

            $is_mega_menu_parent_value = $_REQUEST['menu-item-is-mega-menu-parent'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_is_mega_menu_parent', $is_mega_menu_parent_value );

        }

    }

    /**
     * Define new Walker edit
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function rc_pg_edit_walker($walker,$menu_id) {

        return 'Walker_Nav_Menu_Edit_PG';

    }
}

// instantiate plugin's class
$GLOBALS['perlur-mega-menu'] = new rc_perlur_mega_menu();

include_once( 'edit_walker.php' );
