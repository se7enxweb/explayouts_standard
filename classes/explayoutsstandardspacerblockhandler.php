<?php

class expLayoutsStandardSpacerBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'height' => array (
  'name' => 'Height (px)',
  'type' => 'text',
  'default' => '50',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['height'] = isset( $params['height'] ) ? $params['height'] : '50';
        $values['height'] = (int)$values['height'];
        return $values;
    }
}
