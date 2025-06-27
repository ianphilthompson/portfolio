<?php
    function ipt_hero_header(string $prefix, string $template) {
        $slug = 'hero_header';
        return [
            'key' => $prefix.'_'.$template.'_'.$slug, 
            'name' => $prefix.'_'.$template.'_'.$slug,
            'label' => 'Hero Header',
            'display' => 'block',
            'sub_fields' => [
                [
                    'key' => $prefix_.'_'.$template.'_'.$slug.'_title',
                    'name' => 'sf_collage_title',
                    'label' => 'Title',
                    'type' => 'text',
                    'instructions' => 'Main header text of the block'
                ],
                [
                    'key' => 'sf_field_collage_content',
                    'name' => 'sf_collage_content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'instructions' => 'Main Content'
                ],
                [
                    'key' => 'sf_field_collage_link_one',
                    'name' => 'sf_collage_link_one',
                    'label' => 'Link One',
                    'type' => 'link',
                    'instructions' => 'Link One'
                ],
            ]
        ];
    }
    
