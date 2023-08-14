<?php
namespace Elementor;

class Custom_Elementor_FAQ_Widget extends Widget_Base {

    public function get_name() {
        return 'custom-faq-block';
    }

    public function get_title() {
        return __('Custom FAQ Block', 'elementor-custom-faq-widget');
    }

    public function get_icon() {
        return 'fa fa-question-circle';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['faqs'])) {
            echo '<div class="custom-faq-block">';
            foreach ($settings['faqs'] as $faq) {
                echo '<div class="faq-item">';
                echo '<h3 class="faq-question">' . esc_html($faq['question']) . '</h3>';
                echo '<div class="faq-answer">' . wp_kses_post($faq['answer']) . '</div>';
                echo '</div>';
            }
            echo '</div>';
        }
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'faq_section',
            [
                'label' => __('FAQs', 'elementor-custom-faq-widget'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'question',
            [
                'label' => __('Question', 'elementor-custom-faq-widget'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'answer',
            [
                'label' => __('Answer', 'elementor-custom-faq-widget'),
                'type' => Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'faqs',
            [
                'label' => __('FAQ Items', 'elementor-custom-faq-widget'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ question }}}',
            ]
        );

        $this->end_controls_section();
    }
}
