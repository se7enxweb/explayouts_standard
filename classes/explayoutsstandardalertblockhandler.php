<?php

class expLayoutsStandardAlertBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'message' => array (
  'name' => 'Message',
  'type' => 'textarea',
  'default' => '',
),
            'type' => array (
  'name' => 'Type',
  'type' => 'select',
  'default' => 'info',
  'options' => 
  array (
    0 => 'info',
    1 => 'success',
    2 => 'warning',
    3 => 'danger',
  ),
),
            'dismissible' => array (
  'name' => 'Dismissible',
  'type' => 'checkbox',
  'default' => '0',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['message'] = isset( $params['message'] ) ? $params['message'] : '';
        $values['type'] = isset( $params['type'] ) ? $params['type'] : 'info';
        $values['dismissible'] = isset( $params['dismissible'] ) ? $params['dismissible'] : '0';
        $values['dismissible'] = ( $values['dismissible'] === true || $values['dismissible'] === '1' || $values['dismissible'] === 1 );
        return $values;
    }
}
