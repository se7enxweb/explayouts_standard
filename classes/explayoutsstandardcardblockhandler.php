<?php

class expLayoutsStandardCardBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'image_url' => array (
  'name' => 'Image URL',
  'type' => 'text',
  'default' => '',
),
            'title' => array (
  'name' => 'Title',
  'type' => 'text',
  'default' => '',
),
            'content' => array (
  'name' => 'Content',
  'type' => 'textarea',
  'default' => '',
),
            'link_url' => array (
  'name' => 'Link URL',
  'type' => 'text',
  'default' => '',
),
            'link_label' => array (
  'name' => 'Link label',
  'type' => 'text',
  'default' => 'Read more',
)
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $values['image_url'] = isset( $params['image_url'] ) ? $params['image_url'] : '';
        $values['title'] = isset( $params['title'] ) ? $params['title'] : '';
        $values['content'] = isset( $params['content'] ) ? $params['content'] : '';
        $values['link_url'] = isset( $params['link_url'] ) ? $params['link_url'] : '';
        $values['link_label'] = isset( $params['link_label'] ) ? $params['link_label'] : 'Read more';
        return $values;
    }
}
