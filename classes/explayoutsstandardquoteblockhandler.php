<?php

class expLayoutsStandardQuoteBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'quote' => array (
  'name' => 'Quote text',
  'type' => 'textarea',
  'default' => '',
),
            'author' => array (
  'name' => 'Author',
  'type' => 'text',
  'default' => '',
),
            'source' => array (
  'name' => 'Source',
  'type' => 'text',
  'default' => '',
),
            'align' => array (
  'name' => 'Alignment',
  'type' => 'select',
  'default' => 'left',
  'options' => 
  array (
    0 => 'left',
    1 => 'center',
    2 => 'right',
  ),
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['quote'] = isset( $params['quote'] ) ? $params['quote'] : '';
        $values['author'] = isset( $params['author'] ) ? $params['author'] : '';
        $values['source'] = isset( $params['source'] ) ? $params['source'] : '';
        $values['align'] = isset( $params['align'] ) ? $params['align'] : 'left';
        return $values;
    }
}
