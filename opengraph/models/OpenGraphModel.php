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

class OpenGraphModel extends FieldModel
{

	/**
	 * Define the data we will hold in the database
	 * @return array
	 */
	protected function defineAttributes()
	{
		return array(
			'link' => [AttributeType::String],
			'name' => [AttributeType::String],
			'title' => [AttributeType::String],
			'description' => [AttributeType::String],
			'image' => [AttributeType::String],
			'favicon' => [AttributeType::String],
			'oldLink' => [AttributeType::String],
		);
	}
}