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

class OpenGraphService extends BaseApplicationComponent
{
	
	/**
	 * This will parse web page for OpenGraph data
	 * @param  string $url
	 * @return mixed
	 */
	public function parse($value)
	{

		$model = new OpenGraphModel();
		$model = $model::populateModel($value);

		if ( $model->link == $model->oldLink )
		{
			return $model;
		}

		$graph = OpenGraph::fetch($model->link);

		if ( !$graph )
		{
			return ['success' => false, 'message' => "Invalid URL: " . $model->link ];
		}

		$model->link = $graph->url;
        $model->name = $graph->site_name;
        $model->title = $graph->title;
        $model->description = $graph->description;
        $model->image = $graph->image;

        if ( $model->image == "" )
        {
        	$model->image = $graph->image_secure_url;
        }

        $favicon = OpenGraph::favicon($model->link);
        $model->favicon = $favicon;

		return $model;
	}
}