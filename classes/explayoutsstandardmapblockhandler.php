<?php

class expLayoutsStandardMapBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'embed_url' => array (
  'name' => 'Embed URL',
  'type' => 'text',
  'default' => '',
),
            'width' => array (
  'name' => 'Width',
  'type' => 'text',
  'default' => '100%',
),
            'height' => array (
  'name' => 'Height',
  'type' => 'text',
  'default' => '400',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['embed_url'] = isset( $params['embed_url'] ) ? $params['embed_url'] : '';
        $values['width'] = isset( $params['width'] ) ? $params['width'] : '100%';
        $values['height'] = isset( $params['height'] ) ? $params['height'] : '400';
        return $values;
    }
}
