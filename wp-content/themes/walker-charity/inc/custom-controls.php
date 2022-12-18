<?php 
/**
 * Custom Control
 * 
 * @package walker_charity
*/
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

if( ! function_exists( 'walker_charity_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function walker_charity_custom_controls( $wp_customize ){
    if( ! class_exists( 'Walker_Charity_Radio_Image_Control_Horizontal' ) ){

        /**
         * Create a Radio-Image control
         * 
         * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
         */
        class Walker_Charity_Radio_Image_Control_Horizontal extends WP_Customize_Control {
            
            /**
             * Declare the control type.
             *
             * @access public
             * @var string
             */
            public $type = 'walker-charity-radio-image';
            
            /**
             * Render the control to be displayed in the Customizer.
             */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }           
                
                $name = 'walker-charity-radio-' . $this->id;
                ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </span>
                <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image horizontal-layout">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                                <input class="radio-image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                                <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                                </input>
                            </label>
                    <?php endforeach; ?>
                </div>
                <?php
            }
        }
    }
    if( ! class_exists( 'Walker_Charity_Radio_Image_Control_Vertical' ) ){

        /**
         * Create a Radio-Image control
         * 
         * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
         */
        class Walker_Charity_Radio_Image_Control_Vertical extends WP_Customize_Control {
            
            /**
             * Declare the control type.
             *
             * @access public
             * @var string
             */
            public $type = 'walker-charity-radio-image-veritical';
            
            /**
             * Render the control to be displayed in the Customizer.
             */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }           
                
                $name = 'walker-charity-radio-' . $this->id;
                ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </span>
                <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image vertical-layout">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                                <input class="radio-image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                                <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                                </input>
                            </label><br />
                    <?php endforeach; ?>
                </div>
                <?php
            }
        }
    }


  if( ! class_exists( 'Walker_Charity_Dropdown_Taxonomies_Control' ) ):
    class Walker_Charity_Dropdown_Taxonomies_Control extends WP_Customize_Control{
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->name, selected($this->value(), $cat->name, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
endif;


if( ! class_exists( 'Walker_Charity_Dropdown_Pages_Control' ) ):
    class Walker_Charity_Dropdown_Pages_Control extends WP_Customize_Control{
    private $pages = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->pages = get_pages($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->pages))
            {
                ?>
                    <label>
                      <span class="customize-pages-select-control customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                       <san class="description customize-control-description"> <?php echo esc_html( $this->description ); ?></san>
                     
                      <select <?php $this->link(); ?>>
                        <option><?php echo esc_html('None','walker-charity');?></option>
                           <?php
                                foreach ( $this->pages as $page )
                                {
                                    printf('<option value="%s" %s>%s</option>', $page->post_title, selected($this->value(), $page->post_title, false), $page->post_title);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
endif;
if( ! class_exists( 'Walker_Charity_Custom_Text_Control' ) ):
class Walker_Charity_Custom_Text_Control extends WP_Customize_Control{
        public $type = 'walker-charity-custom-text';
        /**
        * Render the content on the theme customizer page
        */
        public function render_content()
        {
            ?>
            <label>
                <strong class="customize-text_editor"><?php echo wp_kses_post( $this->label ); ?></strong>
                <br />
                <span class="customize-text_editor_desc">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            </label>
            <?php
        }
    }
endif;
}
if( ! class_exists( 'Walker_Charity_Customizer_Range_Control' ) ):
    class Walker_Charity_Customizer_Range_Control extends WP_Customize_Control {

        public $type = 'walker-charity-range-slider';

        public function to_json() {
            if ( ! empty( $this->setting->default ) ) {
                $this->json['default'] = $this->setting->default;
            } else {
                $this->json['default'] = false;
            }
            parent::to_json();
        }

        public function enqueue() {
            wp_enqueue_script( 'walker-charity-range-slider',  get_template_directory_uri() . '/inc/custom-controls/range-slider/range-slider.js', array( 'jquery' ), '', true );
            wp_enqueue_style( 'walker-charity-range-slider', get_template_directory_uri() . '/inc/custom-controls/range-slider/range-slider.css' );
        }

        public function render_content() {
        ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                <div id="<?php echo esc_attr( $this->id ); ?>">
                    <div class="walker-charity-range-slider">
                        <input class="walker-charity-range-slider-range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
                        <input class="walker-charity-range-slider-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
                        <?php if ( ! empty( $this->setting->default ) ) : ?>
                            <span class="walker-charity-range-reset-slider" title="<?php _e( 'Reset', 'walker-charity' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
                        <?php endif;?>
                    </div>
                </div>
            </label>
        <?php }

    }
endif;
endif;
add_action( 'customize_register', 'walker_charity_custom_controls' );

