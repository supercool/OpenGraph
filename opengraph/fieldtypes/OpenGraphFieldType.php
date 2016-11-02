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

class OpenGraphFieldType extends BaseFieldType
{

    /**
     * Returns the name of the field type
     * 
     * @return string
     */
	public function getName()
	{
	   return Craft::t('Open Graph');
	}

    /**
     * Define what kind of data we will save in the database
     * 
     * @return mixed
     */
	public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }

    /**
     * Renders the input template for our field in the control panel
     * 
     * @param  string $name 
     * @param  mixed $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        $id = craft()->templates->formatInputId($name);

        // Figure out what that ID is going to look like once it has been namespaced
        $namespacedId = craft()->templates->namespaceInputId($id);

        // Include our Javascript
        craft()->templates->includeJs("new OpenGraph.InputHelper( '#{$namespacedId}' );");
        //craft()->templates->includeJs("new OpenGraph.AjaxLoad( '#{$namespacedId}' );");

        return craft()->templates->render('opengraph/input',
            ['name' => $name, 'value' => $value, 'settings' => $this->getSettings()]
        );
    }

    /**
     * Prepare value to be saved in the database
     * 
     * @param  mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        if ( $value['link'] == '' )
        {
            return null;
        }

        $model = craft()->openGraph->parse($value);
        return $model;
    }

    /**
     * Prepare value to be used in the templates
     * 
     * @param  mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
       return $value;
    }

    /**
     * Validates whether we were able to parse the URL
     * 
     * @param  mixed $value
     * @return mixed
     */
    public function validate($value)
    {

        if ( isset($value['success']) && !$value['success'] )
        {
            return $value['message'];
        }

        return true;
    }

}