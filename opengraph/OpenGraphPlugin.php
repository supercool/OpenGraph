<?php

namespace Craft;

/**
 * OpenGraph by Supercool
 *
 * @package   OpenGraph
 * @author    Naveed Ziarab
 * @copyright Copyright (c) 2016, Supercool Ltd
 * @link      http://www.supercooldesign.co.uk
 */

class OpenGraphPlugin extends BasePlugin
{

	/**
	 * Returns the name of the plugin
	 * 
	 * @return string
	 */
	public function getName()
	{
		return Craft::t('Open Graph');
	}

	/**
	 * Returns the description of the plugin
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		return "Parse OpenGraph data";
	}

	/**
	 * Returns the plugin's version number
	 * @return string
	 */
	public function getVersion()
	{
		return '1.0.1';
	}

	/**
	 * Returns the plugin's database schema version
	 * 
	 * @return string
	 */
	public function getSchemaVersion()
	{
		return '1.0.0';
	}

	/**
	 * Retunrn the plugin's developer name
	 * 
	 * @return string
	 */
	public function getDeveloper()
	{
		return "Supercool Ltd";
	}

	/**
	 * Returns the plugin's developer's url
	 * @return string
	 */
	public function getDeveloperUrl()
	{
		return "http://supercooldesign.co.uk";
	}

	/**
	 * Imports all classes in the helper folder and includes the plugin's css and js file
	 * 
	 * @return void
	 */
	public function init()
	{
		Craft::import('plugins.opengraph.helpers.*');

		if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() )
    	{
    		craft()->templates->includeCssResource('opengraph/opengraph.css');
			craft()->templates->includeJsResource('opengraph/opengraph.js');
		}
	}
}