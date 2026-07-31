<?php

class expLayoutsStandardTextBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'content' => array (
  'name' => 'Content',
  'type' => 'textarea',
  'default' => '',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['content'] = isset( $params['content'] ) ? $params['content'] : '';
        return $values;
    }
}
