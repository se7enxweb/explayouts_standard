<?php

class expLayoutsStandardSingleBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'name' => array (
  'name' => 'Name',
  'type' => 'text',
  'default' => '',
),
            'link' => array (
  'name' => 'Link',
  'type' => 'text',
  'default' => '',
),
            'intro' => array (
  'name' => 'Intro',
  'type' => 'textarea',
  'default' => '',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['name'] = isset( $params['name'] ) ? $params['name'] : '';
        $values['link'] = isset( $params['link'] ) ? $params['link'] : '';
        $values['intro'] = isset( $params['intro'] ) ? $params['intro'] : '';
        return $values;
    }
}
