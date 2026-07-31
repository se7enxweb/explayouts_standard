<?php

class expLayoutsStandardVideoBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'video_url' => array (
  'name' => 'Video URL',
  'type' => 'text',
  'default' => '',
),
            'width' => array (
  'name' => 'Width',
  'type' => 'text',
  'default' => '560',
),
            'height' => array (
  'name' => 'Height',
  'type' => 'text',
  'default' => '315',
),
            'autoplay' => array (
  'name' => 'Autoplay',
  'type' => 'checkbox',
  'default' => '0',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['video_url'] = isset( $params['video_url'] ) ? $params['video_url'] : '';
        $values['width'] = isset( $params['width'] ) ? $params['width'] : '560';
        $values['height'] = isset( $params['height'] ) ? $params['height'] : '315';
        $values['autoplay'] = isset( $params['autoplay'] ) ? $params['autoplay'] : '0';
        $values['autoplay'] = ( $values['autoplay'] === true || $values['autoplay'] === '1' || $values['autoplay'] === 1 );
        return $values;
    }
}
