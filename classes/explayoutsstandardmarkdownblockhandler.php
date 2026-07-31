<?php
class expLayoutsStandardMarkdownBlockHandler implements expLayoutsBlockHandlerInterface
{
    public function getParameters()
    {
        return array(
            'content' => array(
                'name' => 'Markdown content',
                'type' => 'textarea',
                'default' => '',
            ),
        );
    }

    public function getValues( $block )
    {
        $params = is_array( $block ) && isset( $block['parameters'] ) ? $block['parameters'] : array();
        $content = isset( $params['content'] ) ? $params['content'] : '';
        // No CommonMark available in eZ 4 legacy; fall back to plain text with line breaks.
        $html = nl2br( htmlspecialchars( $content, ENT_QUOTES, 'UTF-8' ), false );
        return array(
            'content' => $content,
            'html' => $html,
        );
    }
}
