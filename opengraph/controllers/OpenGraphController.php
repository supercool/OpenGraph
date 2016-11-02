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

class OpenGraphController extends BaseController
{

	protected $allowAnonymous = true;

	public function actionGetData($url)
	{
		$graph = OpenGraph::fetch($url);
		$this->returnJson($graph);
	}

}