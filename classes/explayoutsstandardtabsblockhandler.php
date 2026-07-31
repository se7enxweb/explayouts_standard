<?php

class expLayoutsStandardTabsBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'items' => array (
  'name' => 'Tab items (JSON array of {title, content})',
  'type' => 'textarea',
  'default' => '[]',
),
            'active_index' => array (
  'name' => 'Active tab index',
  'type' => 'text',
  'default' => '0',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['items'] = isset( $params['items'] ) ? $params['items'] : '[]';
        $values['active_index'] = isset( $params['active_index'] ) ? $params['active_index'] : '0';
        if ( is_string( $values['items'] ) )
            $values['items'] = json_decode( $values['items'], true );
        if ( !is_array( $values['items'] ) )
            $values['items'] = array();
        $values['active_index'] = (int)$values['active_index'];
        return $values;
    }
}
