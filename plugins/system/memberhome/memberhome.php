<?php
/*------------------------------------------------------------------------
# plg_system_memberhome
# ------------------------------------------------------------------------
# author    JoomLadds / River Media
# copyright Copyright (C) 2012-2014 JoomLadds All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomladds.com
# Technical Support:  Forum - http://www.joomladds.com/forum.html
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

/**
 * Joomla! Redirect to Member Home Page
 * Version 1.2.x
 * @author		River Media
 * @package		Joomla
 * @subpackage	System
 */
class  plgSystemMemberHome extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	object	$subject The object to observe
	 * @param 	array   $config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgSystemMemberHome(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	public function onAfterRoute()
	{
		$app			= JFactory::getApplication();
		$task			= JRequest::getVar('task', 'none');
		$user 			= JFactory::getUser();

		if ($app->isAdmin() || $task=='user.logout' || $user->guest){
			return false;
		}
		
		$params			= $this->params;
		
		$ignoredURLs = (string) $params->get('ignore_urls','');
		$ignoredOptions = (string) $params->get('ignore_options','');

		if($ignoredURLs!='')
		{
			$ignoredURLArray = explode("\r\n",$ignoredURLs);

			$uri = JUri::getInstance('SERVER');

			$fullURL = $uri->toString();

			foreach($ignoredURLArray as $str)
			{
				$pos = strpos($fullURL,$str);
				if($pos !== false)
				{
					return false;
				}
			}
		}

		$jinput					= JFactory::getApplication()->input;
		$option					= $jinput->get('option', '', 'string');
		
		if($ignoredOptions!='')
		{
			$ignoredOptionsArray = explode("\r\n",$ignoredOptions);

			foreach($ignoredOptionsArray as $str)
			{
				if($str == $option)
				{
					return false;
				}
			}
		}
		
		$menuId			= $params->get('menuId',0);

		if($menuId==0){
			JError::raiseWarning( 100, 'SITE ADMIN: A Custom Member Homepage menu item has not been selected, Please check the Paramaters for \'Member Home\' Plugin and set a Redirect Menu.' );
			return false;
		}

		$menu			= $app->getMenu();
		$activeMenu		= $menu->getActive();
		$defaultMenu	= $menu->getDefault();


		if(($activeMenu == $defaultMenu) && ($app->getClientId() === 0)){
			$app->redirect(JRoute::_("index.php?Itemid=".$menuId,false));
		}
		return true;
	}
}
?>