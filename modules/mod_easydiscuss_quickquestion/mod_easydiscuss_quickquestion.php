<?php
/**
 * @package		EasyDiscuss
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *
 * EasyDiscuss is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once JPATH_ROOT . '/components/com_easydiscuss/helpers/helper.php';

DiscussHelper::loadStylesheet("module", "mod_easydiscuss_quickquestion");


// Load current logged in user.
$my			= JFactory::getUser();
$profile	= DiscussHelper::getTable( 'Profile' );
$profile->load( $my->id );

require( JModuleHelper::getLayoutPath( 'mod_easydiscuss_quickquestion' ) );
