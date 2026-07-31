<?php

class expLayoutsStandardGridBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'items' => array (
  'name' => 'Items (JSON array of {name, url_alias})',
  'type' => 'textarea',
  'default' => '[]',
),
            'columns' => array (
  'name' => 'Columns',
  'type' => 'select',
  'default' => '3',
  'options' => 
  array (
    0 => '2',
    1 => '3',
    2 => '4',
    3 => '6',
  ),
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['items'] = isset( $params['items'] ) ? $params['items'] : '[]';
        $values['columns'] = isset( $params['columns'] ) ? $params['columns'] : '3';
        if ( is_string( $values['items'] ) )
            $values['items'] = json_decode( $values['items'], true );
        if ( !is_array( $values['items'] ) )
            $values['items'] = array();
        $values['columns'] = (int)$values['columns'];
        return $values;
    }
}
