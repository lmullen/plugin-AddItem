<?php

/* 
 * Add Item Plugin for Omeka 
 *
 * I borrowed most of this from Patrick Murray-John's Edit Link plugin:
 * https://github.com/omeka/plugin-EditLink/blob/master/EditLinkPlugin.php 
 *
 */

class AddItemPlugin extends Omeka_Plugin_AbstractPlugin
{
  protected $_filters = array('public_navigation_admin_bar', 
    'admin_navigation_main');

  private function _addItemLink($navLinks)
  {
    set_theme_base_url('admin');
    $url = url('items/add/');
    //want to place it first in the navigation, so do an array merge
    $editLinks['Add Item'] = array(
      'label'=>'Add Item',
      'uri'=> $url
    );
    revert_theme_base_url();
    $navLinks = array_merge($editLinks, $navLinks);
    return $navLinks;
  }

  public function filterPublicNavigationAdminBar($navLinks)
  {
    return $this->_addItemLink($navLinks);
  }

  public function filterAdminNavigationMain($navLinks)
  {
    return $this->_addItemLink($navLinks);
  }

}

