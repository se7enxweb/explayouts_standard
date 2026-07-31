<?php

class expLayoutsStandardDividerBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'style' => array (
  'name' => 'Style',
  'type' => 'select',
  'default' => 'solid',
  'options' => 
  array (
    0 => 'solid',
    1 => 'dashed',
    2 => 'dotted',
  ),
),
            'margin' => array (
  'name' => 'Margin (px)',
  'type' => 'text',
  'default' => '20',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['style'] = isset( $params['style'] ) ? $params['style'] : 'solid';
        $values['margin'] = isset( $params['margin'] ) ? $params['margin'] : '20';
        $values['margin'] = (int)$values['margin'];
        return $values;
    }
}
