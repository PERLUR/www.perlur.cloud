<?php
  /**
   * @package bulmascores
   */

  /**
   * Class Name: Bulmascores_Nav_Walker
   * Author: Seyong Cho
   */
  class Bulma_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= '';
    }

    public function end_lvl(&$output, $depth = 0, $args = array()) {
      $output .= '';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      if ($this->hasChildren($item) && $item->is_mega_menu_parent === "_blank" ) {
        // Mega menu parent
        $output .= $this->startMegamenuParentButton($item);

       } else if ($this->hasChildren($item) && $item->is_mega_submenu_title === "_blank" ){
        // Mega menu submenu title
        $output .= $this->startMegaSubMenu($item);

       } else if ($this->hasChildren($item)){

        $output .= $this->startDropdownButton($item);

       } else if ($item->is_mega_menu_item === "_blank" ){
        // Mega menu item
        $output .= $this->megaMenuItem($item);

       } else {
         $output .= $this->getLinkButton($item);
      }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array()) {

      if ($this->hasChildren($item) && $item->is_mega_menu_parent === "_blank" ) {
        // Mega menu parent
        $output .= $this->endMegaMenu($item);

       } else if ($this->hasChildren($item) && $item->is_mega_submenu_title === "_blank" ){
        // Mega menu submenu title
        $output .= $this->endMegaSubMenu($item);

       } else if ($this->hasChildren($item)){

        $output .= $this->endDropdownButton($item);

       } else {
         $output .= '';
      }
    }

    public function hasChildren($item) {
      if (in_array("menu-item-has-children", (array) $item->classes)) {
        return true;
      }
      return false;
    }

    public function getLinkButton($item) {
      $url         = $item->url ?? '';
      $classes     = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = '';

      if (in_array('current-menu-item', $classes)) {
        $class_names .= 'is-active has-text-violet';
      }

      $button = sprintf("<a href='%s' class='navbar-item title is-4 is-marginless %s'>%s</a>", $url, $class_names, $item->title);

      return $button;
    }

    public function startDropdownButton($item) {
      $url         = $item->url ?? '';
      $classes     = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = '';

      if (in_array('current-menu-item', $classes)) {
        $class_names .= 'is-active has-text-violet';
      }

      $button = sprintf("<a href='%s' class='navbar-link %s'>%s</a>", $url, $class_names, $item->title);

      $dropdown = sprintf("<div class='navbar-item has-dropdown is-hoverable title is-4 is-marginless'>%s", $button);

      $dropdown .= "<div class='navbar-dropdown is-boxed'>";
        return $dropdown;
    }
    
    public function endDropdownButton($item) {
      return "</div></div>";
    }

    // MEGA MENU

    public function startMegamenuParentButton($item) {
      $url         = $item->url ?? '';
      $classes     = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = '';

      if (in_array('current-menu-item', $classes)) {
        $class_names .= 'is-active has-text-violet';
      }

      $button = sprintf("<div class='navbar-link %s'>%s</div>", $class_names, $item->title);

      $dropdown = sprintf("<div class='navbar-item has-dropdown is-hoverable title is-4 is-marginless is-mega'>%s", $button);

      $dropdown .= "<div class='navbar-dropdown mega-dropdown'><div class='container is-fluid'><div class='columns'>";
        return $dropdown;
    }

    public function startMegaSubMenu($item) {

      $title = sprintf("<h1 class='title is-6 is-mega-menu-title'>%s</h1>", $item->title);

      $dropdown = sprintf("<div class='column'>%s", $title);

        return $dropdown;
    }

    public function megaMenuItem($item) {
      $url         = $item->url ?? '';
      $classes     = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = '';

      if (in_array('current-menu-item', $classes)) {
        $class_names .= 'is-active has-text-violet';
      }

      $item_content = sprintf("<div class='navbar-content'><p>%s</p>", $item->title);
      
      // mega menu description
      if (isset($item->mega_menu_description) && $item->mega_menu_description !== '') {
        $item_content .= sprintf("<p><small class='has-text-info'>%s</small></p>", $item->mega_menu_description);
      }

      $item_content .= '</div>';

      $megaItem = sprintf("<a href='%s' class='navbar-item %s'>%s</a>", $url, $class_names, $item_content);

      return $megaItem;
    }

    public function endMegaMenu($item) {
      return "</div></div></div></div>";
    }

    public function endMegaSubMenu($item) {
      return "</div>";
    }

  }

?>