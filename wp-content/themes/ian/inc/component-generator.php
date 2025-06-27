<?php
    class iptComponentGenerator {
        public function __construct(string $template, string $slug, string $label, array $fields) {
            $this->prefix = 'ipt_';
            $this->template = $template.'_';
            $this->slug = $slug;
            $this->label = $label;
            $this->fields = $fields;
        }

        /**
         * Generate the field group that's unique to the template
         */

        public function generate() {
            $component = [
                'key' => $this->prefix.$this->template.$slug.'_group', 
                'name' => $this->prefix.$this->template.$slug.'_group',
                'label' => $this->label,
                'display' => 'block',
                'subfields' => [
                    [
                        'key' => $this->prefix.$this->template.$slug.'_tab', ,
                        'name' => $this->prefix.$this->template.$slug.'_tab', ,
                        'type' => 'tab',
                        'label' => $this->label
                    ]
                ]
            ];

            foreach($this->fields as $field) {
                $field_data = [
                    'key' => $this->prefix.$this->template.$slug.'_'.$field['slug'],
                    'name' => $this->prefix.$this->template.$slug.'_'..$field['slug'],
                    'type' => $field['type'],
                    'label' => $field['label']
                ];
                if($field['type'] == 'select') {
                    $field_data['choices'] = $field['choices'];
                }
                array_push(
                    $component['sub_fields'],
                    $field_data
                );
            }
            return $component;
        }
    }