<?php

class expLayoutsStandardCarouselBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'slides' => array (
  'name' => 'Slides (JSON array of {image_url, node})',
  'type' => 'textarea',
  'default' => '[]',
),
            'autoplay' => array (
  'name' => 'Autoplay',
  'type' => 'checkbox',
  'default' => '0',
),
            'slides_per_view' => array (
  'name' => 'Slides per view',
  'type' => 'text',
  'default' => '1',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['slides'] = isset( $params['slides'] ) ? $params['slides'] : '[]';
        $values['autoplay'] = isset( $params['autoplay'] ) ? $params['autoplay'] : '0';
        $values['slides_per_view'] = isset( $params['slides_per_view'] ) ? $params['slides_per_view'] : '1';
        if ( is_string( $values['slides'] ) )
            $values['slides'] = json_decode( $values['slides'], true );
        if ( !is_array( $values['slides'] ) )
            $values['slides'] = array();
        $values['autoplay'] = ( $values['autoplay'] === true || $values['autoplay'] === '1' || $values['autoplay'] === 1 );
        $values['slides_per_view'] = (int)$values['slides_per_view'];
        return $values;
    }
}
