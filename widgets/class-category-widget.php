<?php
/**
 * TawardsWidget class.
 *
 * @category   Class
 * @package    TawardsWidget
 * @subpackage WordPress
 * @author     Alex Darmos
 * @copyright  2021 Alex Darmos
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       #
 * @since      1.0.0
 * php version 7.3.9
 */

namespace TawardsWidget\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// use Elementor\Controls_Stack;
// use Elementor\Group_Control_Typography;
// use Elementor\Scheme_Typography;
// use Elementor\Scheme_Color;
// use Elementor\Group_Control_Border;
// use Elementor\Repeater;

// use Elementor\Utils;
// use Elementor\Group_Control_Text_Shadow;
// use Elementor\Plugin;


/**
 * PromoCategories widget class.
 *
 * @since 1.0.0
 */
class PromoCategories extends Widget_Base {
    /**
     * Class constructor.
     *
     * @param array $data Widget data.
     * @param array $args Widget arguments.
     */
    public function __construct( $data = array(), $args = null ) {
        parent::__construct( $data, $args );

        wp_register_style( 'tawardswidget', plugins_url( '/assets/css/tawards-addon.css ', Elementor_Tawards ), array(), '1.0.0' );
    }

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'elementor-promo-categories';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Promo Categories', 'elementor-promo-categories' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-briefcase';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'promo_categories',
            [
                'label' => esc_html__( 'Promo Categoires', 'elementor-promo-categories' ),
            ]
        );
        
        $this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-awesomesauce' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-awesomesauce' ),
			)
		);

        // $this->add_control(
        //     'bg_image',
        //     [
        //         'label' => __( 'Background Pattern Image', 'elementor-promo-categories' ),
        //         'type' => Controls_Manager::MEDIA,
        //         'default' => ['url' => Utils::get_placeholder_image_src(),],

        //     ]
        // );
        // $this->add_control(
        //     'about_image',
        //     [
        //         'label' => __( 'About Image', 'elementor-promo-categories' ),
        //         'type' => Controls_Manager::MEDIA,
        //         'default' => ['url' => Utils::get_placeholder_image_src(),],

        //     ]
        // );
        // $this->add_control(
        //     'icon_image',
        //     [
        //         'label' => __( 'Icon Image', 'elementor-promo-categories' ),
        //         'type' => Controls_Manager::MEDIA,
        //         'default' => ['url' => Utils::get_placeholder_image_src(),],

        //     ]
        // );
        // $this->add_control(
        //     'title',
        //     [
        //         'label'       => __('Title', 'elementor-promo-categories'),
        //         'type'        => Controls_Manager::TEXTAREA,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __('Enter your Title', 'elementor-promo-categories'),
        //     ]
        // );
        // $this->add_control(
        //     'btn_title',
        //     [
        //         'label'       => __( 'Button Title', 'elementor-promo-categories' ),
        //         'type'        => Controls_Manager::TEXT,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __( 'Enter your Button Title', 'elementor-promo-categories' ),
        //         'default'     => __( 'Guides & E-books', 'elementor-promo-categories' ),
        //     ]
        // );
        // $this->add_control(
        //     'btn_link',
        //     [
        //         'label' => __( 'Button Url', 'elementor-promo-categories' ),
        //         'type' => Controls_Manager::URL,
        //         'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
        //         'show_external' => true,
        //         'default' => [
        //             'url' => '',
        //             'is_external' => true,
        //             'nofollow' => true,
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'subtitle',
        //     [
        //         'label'       => __('Sub Title', 'elementor-promo-categories'),
        //         'type'        => Controls_Manager::TEXTAREA,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __('Enter your Sub Title', 'elementor-promo-categories'),
        //     ]
        // );
        // $this->add_control(
        //     'heading',
        //     [
        //         'label'       => __('Title/Heading', 'elementor-promo-categories'),
        //         'type'        => Controls_Manager::TEXTAREA,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __('', 'elementor-promo-categories'),
        //     ]
        // );
        // $this->add_control(
        //     'text',
        //     [
        //         'label'       => __('Text', 'elementor-promo-categories'),
        //         'type'        => Controls_Manager::TEXTAREA,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __('Enter your Text', 'elementor-promo-categories'),
        //     ]
        // );
        // $this->add_control(
        //     'btn_title1',
        //     [
        //         'label'       => __( 'Button Title', 'elementor-promo-categories' ),
        //         'type'        => Controls_Manager::TEXT,
        //         'dynamic'     => [
        //             'active' => true,
        //         ],
        //         'placeholder' => __( 'Enter your Button Title', 'elementor-promo-categories' ),
        //         'default'     => __( 'More About Us', 'elementor-promo-categories' ),
        //     ]
        // );
        // $this->add_control(
        //     'btn_link1',
        //     [
        //         'label' => __( 'Button Url', 'elementor-promo-categories' ),
        //         'type' => Controls_Manager::URL,
        //         'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
        //         'show_external' => true,
        //         'default' => [
        //             'url' => '',
        //             'is_external' => true,
        //             'nofollow' => true,
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'our_tabs',
        //     [
        //         'type' => Controls_Manager::REPEATER,
        //         'seperator' => 'before',
        //         'default' =>
        //             [
        //                 ['title1' => esc_html__('Hire Your Next Candidate On Eazy Recruitz', 'eazyrecruitz')],
        //                 ['title1' => esc_html__('Explore Your Career Path With Eazy Recruitz', 'eazyrecruitz')],
        //             ],
        //         'fields' =>
        //             [
        //                 [
        //                     'name' => 'icons',
        //                     'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::SELECT,
        //                     'options'  => get_fontawesome_icons(),
        //                 ],
        //                 [
        //                     'name' => 'button_title',
        //                     'label' => esc_html__('Tab Button Title', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXT,
        //                     'default' => esc_html__('', 'eazyrecruitz')
        //                 ],
        //                 [
        //                     'name' => 'subtitle1',
        //                     'label' => esc_html__('Sub Title', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXTAREA,
        //                     'default' => esc_html__('', 'eazyrecruitz')
        //                 ],
        //                 [
        //                     'name' => 'title1',
        //                     'label' => esc_html__('Title', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXTAREA,
        //                     'default' => esc_html__('', 'eazyrecruitz')
        //                 ],
        //                 [
        //                     'name' => 'text1',
        //                     'label' => esc_html__('Text', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXTAREA,
        //                     'default' => ''
        //                 ],
        //                 [
        //                     'name' => 'icon_image1',
        //                     'label' => esc_html__('Icon image V1', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::MEDIA,
        //                     'default' => ['url' => Utils::get_placeholder_image_src(),],
        //                 ],
        //                 [
        //                     'name' => 'list_title1',
        //                     'label' => esc_html__('Description', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXTAREA,
        //                     'default' => ''
        //                 ],
        //                 [
        //                     'name' => 'icon_image2',
        //                     'label' => esc_html__('Icon image V2', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::MEDIA,
        //                     'default' => ['url' => Utils::get_placeholder_image_src(),],
        //                 ],
        //                 [
        //                     'name' => 'list_title2',
        //                     'label' => esc_html__('Description', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXTAREA,
        //                     'default' => ''
        //                 ],
        //                 [
        //                     'name' => 'btn_title',
        //                     'label' => esc_html__('Button Title', 'eazyrecruitz'),
        //                     'type' => Controls_Manager::TEXT,
        //                     'default' => ''
        //                 ],
        //                 [
        //                     'name' => 'btn_link',
        //                     'label' => __( 'Button Url', 'eazyrecruitz' ),
        //                     'type' => Controls_Manager::URL,
        //                     'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
        //                     'show_external' => true,
        //                     'default' => ['url' => '','is_external' => true,'nofollow' => true,],
        //                 ],
        //             ],
        //         'title_field' => '{{title1}}',
        //     ]
        // );
        $this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>

        <p><?php echo wp_kses( $settings['title'], $allowed_tags );?></p>

 
       

        <?php
    }

}
