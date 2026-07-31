<?php

class expLayoutsStandardTitleBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'title' => array(
                'name' => 'Title text',
                'type' => 'text',
                'default' => '',
            ),
            'tag' => array(
                'name' => 'HTML tag',
                'type' => 'text',
                'default' => '',
            ),
            'level' => array(
                'name' => 'Heading level',
                'type' => 'select',
                'options' => array( '1', '2', '3', '4', '5', '6' ),
                'default' => '2',
            ),
            'use_link' => array(
                'name' => 'Link title',
                'type' => 'checkbox',
                'default' => '0',
            ),
            'link' => array(
                'name' => 'Link URL',
                'type' => 'text',
                'default' => '',
            ),
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values = array(
            'title' => isset( $params['title'] ) ? $params['title'] : '',
            'tag' => isset( $params['tag'] ) ? $params['tag'] : '',
            'level' => isset( $params['level'] ) ? (int)$params['level'] : 2,
            'use_link' => isset( $params['use_link'] ) ? (bool)$params['use_link'] : false,
            'link' => isset( $params['link'] ) ? $params['link'] : '',
        );

        if ( $values['tag'] === '' )
            $values['tag'] = 'h' . $values['level'];

        return $values;
    }
}
