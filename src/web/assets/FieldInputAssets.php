<?php
/**
 * Star Ratings plugin for Craft CMS
 *
 * An easy to use and highly flexible ratings system.
 *
 * @author    Double Secret Agency
 * @link      https://www.doublesecretagency.com/
 * @copyright Copyright (c) 2015 Double Secret Agency
 */

namespace doublesecretagency\starratings\web\assets;

use craft\web\AssetBundle;

/**
 * Class FieldInputAssets
 * @since 2.0.0
 */
class FieldInputAssets extends AssetBundle
{

    /** @inheritdoc */
    public function init()
    {
        parent::init();

        $this->sourcePath = '@doublesecretagency/starratings/resources';

        $this->css = [
            'css/field.css',
        ];

        $this->js = [
            'js/field.js',
        ];
    }

}