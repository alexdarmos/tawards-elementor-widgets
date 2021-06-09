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
use Elementor\Repeater;
use Elementor\Utils;

// use Elementor\Controls_Stack;
// use Elementor\Group_Control_Typography;
// use Elementor\Scheme_Typography;
// use Elementor\Scheme_Color;
// use Elementor\Group_Control_Border;



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
				'label'   => __( 'Title', 'elementor-promo-categories' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-promo-categories' ),
			)
		);

        $this->add_control(
            'category_tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' =>
                    [
                        ['category_title' => esc_html__( 'Trophies', 'elementor-promo-categories')],
                        ['category_title' => esc_html__( 'Ribbons', 'elementor-promo-categories')],
                    ],
                'fields' => 
                    [
                        [
                            'name' => 'category_title',
                            'label' => esc_html__('Category Title', 'eazyrecruitz'),
                            'type' => Controls_Manager::TEXT,
                            'default' => esc_html__('', 'elementor-promo-categories')
                        ],
                        [
                            'name' => 'category_url',
                            'label' => esc_html__( 'Category Url', 'elementor-promo-categories' ),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com', 'elementor-promo-categories' ),
                            'show_external' => true,
                            'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                        ],
                        [
                            'name' => 'category_image',
                            'label' => esc_html__( 'Category Image', 'elementor-promo-categories' ),
                            'type' => Controls_Manager::MEDIA,
                            'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
                        [
                            'name' => 'single_col',
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Full Width', 'elementor-promo-categories' ),
                            'label_off' => __('Half Width' , 'elementor-promo-categories' ),
                            'return_value' => 'true',
                            'default' => 'false'
                            
                        ]
                    ]
            ]
        );
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

        <div class="promo-categories-container">
            <?php $counts = 1; foreach ( $settings['category_tabs'] as $key => $item): ?>
                <div id="promo-category-<?php echo esc_attr($counts); ?>" class="promo-category-item <?php echo wp_kses( $item['single_col'], $allowed_tags ) === 'true' ? 'full-width' : 'half-width'  ?>" >
                    <img src="<?php echo wp_get_attachment_url( $item['category_image']['id'] ); ?>" alt="replace later!"/>
                    <h2><?php echo wp_kses( $item['category_title'], $allowed_tags ); ?></h2>
                    <a href="<?php echo esc_url( $item['category_url']['url'] ); ?>">test</a>
                </div>

            <?php $counts++; endforeach; ?>
        </div>
       

        <?php
    }

}
