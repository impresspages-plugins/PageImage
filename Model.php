<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 3/25/14
 * Time: 2:22 PM
 */

namespace Plugin\PageImage;


class Model
{
    const PLUGIN = 'PageImage';

    public static function getPageImages($pageId)
    {
        $values = array();
        $current = ipPageStorage($pageId)->get('PageImage');
        if (is_array($current)) {
            foreach($current as $item) {
                if (is_string($item)) {
                    $values[] = $item;
                }
            }

        }
        return $values;
    }

    public static function updatePageImages($pageId, $images)
    {
        $files = array();
        foreach($images as $file) {
            if (is_string($file)) {
                $files[] = $file;
            }
        }

        self::unbindImages($pageId);
        self::bindImages($pageId, $files);
        ipPageStorage($pageId)->set('PageImage', $files);
    }


    public static function unbindImages($pageId)
    {
        $curFiles = self::getPageImages($pageId);
        foreach($curFiles as $file) {
            ipUnbindFile($file, self::PLUGIN, $pageId);
        }
        ipPageStorage($pageId)->remove('pageImage');

    }

    protected static function bindImages($pageId, $images)
    {
        if (is_array($images)) {
            foreach($images as $file) {
                ipBindFile($file, self::PLUGIN, $pageId);
            }
        }

    }
}
