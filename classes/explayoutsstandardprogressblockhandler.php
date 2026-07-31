<?php

class expLayoutsStandardProgressBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'label' => array (
  'name' => 'Label',
  'type' => 'text',
  'default' => '',
),
            'value' => array (
  'name' => 'Value (percent)',
  'type' => 'text',
  'default' => '0',
),
            'color' => array (
  'name' => 'Color',
  'type' => 'text',
  'default' => '#007bff',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['label'] = isset( $params['label'] ) ? $params['label'] : '';
        $values['value'] = isset( $params['value'] ) ? $params['value'] : '0';
        $values['color'] = isset( $params['color'] ) ? $params['color'] : '#007bff';
        $values['value'] = (int)$values['value'];
        return $values;
    }
}
