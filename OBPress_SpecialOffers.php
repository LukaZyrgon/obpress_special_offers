<?php
/*
  Plugin name: OBPress Special Offers by Zyrgon
  Plugin uri: www.zyrgon.net
  Text Domain: OBPress_SpecialOffers
  Description: Widgets to OBPress
  Version: 0.2.0
  Author: Zyrgon
  Author uri: www.zyrgon.net
  License: GPlv2 or Later
*/

//Show Elementor plugins only if api token and chain/hotel are set in the admin
if(get_option('obpress_api_set') == true){
    require_once('elementor/init.php');
}



// TODO, MAKE GIT BRANCH, CONNECT WITH UPDATE CHECKER

require_once(WP_PLUGIN_DIR . '/OBPress_SpecialOffers/plugin-update-checker-4.11/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/LukaZyrgon/obpress_special_offers',
    __FILE__,
    'OBPress_SpecialOffers'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
