<?php
defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__) . '/helper.php';
require JModuleHelper::getLayoutPath('mod_mailva_social_feed');

$document = JFactory::getDocument();


$document->addScript(JURI::root(true).'modules/mod_mailva_social_feed/js/instafeed.min.js');


$document->addStyleSheet(JUri::base(true) . 'modules/mod_mailva_social_feed/theme/default/css/styles.css');



?>
