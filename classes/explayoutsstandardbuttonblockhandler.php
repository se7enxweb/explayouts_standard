<?php

class expLayoutsStandardButtonBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'text' => array(
                'name' => 'Button text',
                'type' => 'text',
                'default' => '',
            ),
            'link' => array(
                'name' => 'Link URL',
                'type' => 'text',
                'default' => '',
            ),
            'target' => array(
                'name' => 'Target',
                'type' => 'select',
                'options' => array( '_self', '_blank', '_parent', '_top' ),
                'default' => '_self',
            ),
            'class' => array(
                'name' => 'CSS class',
                'type' => 'text',
                'default' => 'btn btn-primary',
            ),
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        return array(
            'text' => isset( $params['text'] ) ? $params['text'] : '',
            'link' => isset( $params['link'] ) ? $params['link'] : '',
            'target' => isset( $params['target'] ) ? $params['target'] : '_self',
            'class' => isset( $params['class'] ) ? $params['class'] : 'btn btn-primary',
        );
    }
}
