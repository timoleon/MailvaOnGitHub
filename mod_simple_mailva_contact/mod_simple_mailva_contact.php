<?php 
	/*
	# ------------------------------------------------------------------------
	# Extensions for Joomla 3.7
	# ------------------------------------------------------------------------
	# Copyright (C) 2017 Mailva.eu. All Rights Reserved.
	# @license - PHP files are GNU/GPL V2.
	# Author: Timoleon Pagounas
	# Websites:  http://mailva.eu
	# Date modified: 10/09/2017
	# ------------------------------------------------------------------------
	*/

	defined('_JEXEC') or die;
	$document = JFactory::getDocument();
	$layout = $params->get('layout', 'default');
	require JModuleHelper::getLayoutPath('mod_simple_mailva_contact', '$layout');

?>
