<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 3/25/14
 * Time: 9:58 AM
 */

namespace Plugin\PageImage;


class Filter {

    /**
     * @param \Ip\Form $form
     * @return mixed
     */
    public static function ipPagePropertiesForm($form, $info)
    {
        $values = array();
        $current = ipPageStorage($info['pageId'])->get('PageImage');
        if (is_array($current)) {
            foreach($current as $item) {
                if (is_string($item)) {
                    $values[] = $item;
                }
            }

        }

        $fieldset = new \Ip\Form\Fieldset(__('Images', 'PageImage', false));
        $form->addFieldset($fieldset);

        $form->addField(new \Ip\Form\Field\RepositoryFile(
            array(
                'name' => 'pageImage',
                'label' => '',
                'preview' => 'thumbnails',
                'value' => $values
            )
        ));

        return $form;
    }
}
