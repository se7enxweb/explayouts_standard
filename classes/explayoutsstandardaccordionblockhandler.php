<?php

class expLayoutsStandardAccordionBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'items' => array (
  'name' => 'Accordion items (JSON array of {title, content})',
  'type' => 'textarea',
  'default' => '[]',
),
            'open_first' => array (
  'name' => 'Open first item by default',
  'type' => 'checkbox',
  'default' => '1',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['items'] = isset( $params['items'] ) ? $params['items'] : '[]';
        $values['open_first'] = isset( $params['open_first'] ) ? $params['open_first'] : '1';
        if ( is_string( $values['items'] ) )
            $values['items'] = json_decode( $values['items'], true );
        if ( !is_array( $values['items'] ) )
            $values['items'] = array();
        $values['open_first'] = ( $values['open_first'] === true || $values['open_first'] === '1' || $values['open_first'] === 1 );
        return $values;
    }
}
