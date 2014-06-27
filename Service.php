<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 3/25/14
 * Time: 2:37 PM
 */

namespace Plugin\PageImage;


class Service {
    public static function pageImages($pageId = null)
    {
        if ($pageId === null) {
            if (!ipContent()->getCurrentPage()) {
                return array();
            }
            $pageId = ipContent()->getCurrentPage()->getId();
        }
        $images = Model::getPageImages($pageId);
        return $images;
    }
}
