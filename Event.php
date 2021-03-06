<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 3/25/14
 * Time: 10:14 AM
 */

namespace Plugin\PageImage;


class Event {


    public static function ipPageUpdated($data)
    {
        if (ipRoute()->plugin() != 'Pages' || ipRoute()->action() != 'updatePage') {
            return; //we want to handle only page updates that are made from within Pages section.
        }

        $pageId = $data['id'];
        $pageImages = Model::getPageImages($pageId);
        if (!isset($data['pageImage']) && empty($pageImages)) {
            return;
        }

        if (empty($data['pageImage']) || !is_array($data['pageImage'])) {
            $data['pageImage'] = array();
        }
        Model::updatePageImages($pageId, $data['pageImage']);

    }


    public static function ipBeforePageRemoved($data)
    {
        $pageId = $data['pageId'];
        Model::unbindImages($pageId);
    }

}
