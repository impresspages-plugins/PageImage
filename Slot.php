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


            $file = $image;
            $options = array(
                'type' => 'fit',
                'width' => 200,
                'height' => 200
            );
            $thumbnail = ipReflection($file, $options);
            if (!$thumbnail) {
                echo ipReflectionException();
            } else {
                $images[] = ipFileUrl($thumbnail);
            }


        }
        $answer = ipView('view/slot.php', array('images' => $images))->render();
        return $answer;
    }
     public static function bkgImage($data)
    {
        $imageFiles = Service::pageImages();
        $images = array();
        foreach($imageFiles as $image) {


          $file = $image;
          $options = array(
             'type' => 'copy'
          );
          $copiedImage = ipReflection($file, $options);
          if (!$copiedImage) {
              echo ipReflectionException();
            } else {
                $images[] = ipFileUrl($copiedImage);
            }


        }
        $answer = ipView('view/slot2.php', array('images' => $images))->render();
        return $answer;
    }
}
