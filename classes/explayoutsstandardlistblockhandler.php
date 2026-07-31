<?php

class expLayoutsStandardListBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'items' => array (
  'name' => 'Items (JSON array of {name, url_alias})',
  'type' => 'textarea',
  'default' => '[]',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['items'] = isset( $params['items'] ) ? $params['items'] : '[]';
        if ( is_string( $values['items'] ) )
            $values['items'] = json_decode( $values['items'], true );
        if ( !is_array( $values['items'] ) )
            $values['items'] = array();
        return $values;
    }
}
