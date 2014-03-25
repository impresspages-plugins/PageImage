<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 3/25/14
 * Time: 2:42 PM
 */

namespace Plugin\PageImage;


class Slot {

    public static function pageImage($data)
    {
        $imageFiles = Service::pageImages();
        $images = array();
        foreach($imageFiles as $image) {
            $transform = new \Ip\Transform\ImageFit(200, 200);
            try {
                $reflection = ipReflection($image, $transform);
                if ($reflection) {
                    $images[] = $reflection;
                }
            } catch (\Ip\Exception\ReflectionException $e ) {
                //do nothing
            }
        }
        $answer = ipView('view/slot.php', array('images' => $images))->render();
        return $answer;
    }
}
