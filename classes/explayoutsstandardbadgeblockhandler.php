<?php

class expLayoutsStandardBadgeBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'label' => array (
  'name' => 'Badge text',
  'type' => 'text',
  'default' => '',
),
            'style' => array (
  'name' => 'Style',
  'type' => 'select',
  'default' => 'primary',
  'options' => 
  array (
    0 => 'primary',
    1 => 'secondary',
    2 => 'success',
    3 => 'danger',
    4 => 'warning',
    5 => 'info',
    6 => 'light',
    7 => 'dark',
  ),
),
            'link' => array (
  'name' => 'Link URL',
  'type' => 'text',
  'default' => '',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['label'] = isset( $params['label'] ) ? $params['label'] : '';
        $values['style'] = isset( $params['style'] ) ? $params['style'] : 'primary';
        $values['link'] = isset( $params['link'] ) ? $params['link'] : '';
        return $values;
    }
}
