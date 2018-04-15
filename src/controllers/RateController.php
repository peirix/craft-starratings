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

namespace doublesecretagency\starratings\controllers;

use Craft;
use craft\web\Controller;

use doublesecretagency\starratings\StarRatings;

/**
 * Class RateController
 * @since 2.0.0
 */
class RateController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = true;

    // Rate specified element
    public function actionIndex()
    {
        $this->requirePostRequest();

        // Get settings
        $settings = StarRatings::$plugin->getSettings();

        // Get current user & login requirement
        $currentUser   = Craft::$app->user->getIdentity();
        $loginRequired = $settings->requireLogin;

        // Check if login is required
        if ($loginRequired && !$currentUser) {
            // Return "login required" message
            return $this->asJson(StarRatings::$plugin->starRatings_rate->messageLoginRequired);
        }

        // Get request
        $request = Craft::$app->getRequest();

        // Get POST values
        $elementId = $request->getBodyParam('id');
        $key       = $request->getBodyParam('key');
        $rating    = $request->getBodyParam('rating');

        // Cast rating
        $response = StarRatings::$plugin->starRatings_rate->rate($elementId, $key, $rating, $currentUser);
        return $this->asJson($response);
    }

}