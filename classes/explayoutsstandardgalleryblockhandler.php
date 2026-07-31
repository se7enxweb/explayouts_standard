<?php

class expLayoutsStandardGalleryBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'images' => array (
  'name' => 'Images (JSON array of {url, alt, link})',
  'type' => 'textarea',
  'default' => '[]',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['images'] = isset( $params['images'] ) ? $params['images'] : '[]';
        if ( is_string( $values['images'] ) )
            $values['images'] = json_decode( $values['images'], true );
        if ( !is_array( $values['images'] ) )
            $values['images'] = array();
        return $values;
    }
}
