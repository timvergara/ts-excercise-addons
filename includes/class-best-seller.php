<?php 

class TS_EXERCISE_ADDONS {

    public function __construct() {
        add_action( 'woocommerce_product_options_general_product_data', array( $this, 'add_best_seller_checkbox' ) );
        add_action( 'woocommerce_process_product_meta', array( $this, 'save_best_seller_checkbox' ) );
        add_filter( 'woocommerce_get_price_html', array( $this, 'display_best_seller_badge' ), 10, 2 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_best_seller_styles' ) );
    }

    /**
     * Adds a custom "Best Seller" checkbox to the WooCommerce product edit page.
     *
     * This function outputs a checkbox field in the product data panel,
     * allowing store administrators to mark a product as a best seller.
     *
     * @return void
     */
    public function add_best_seller_checkbox() {
        echo '<div class="options_group">';

        woocommerce_wp_checkbox( array(
            'id'            => '_best_seller',
            'label'         => __( 'Best Seller', 'ts-excercise-addons' ),
            'description'   => __( 'Check this box to mark this product as a best seller', 'ts-excercise-addons' ),
            'desc_tip'      => false,
        ) );

        echo '</div>';
    }

    /**
     * Saves the value of the '_best_seller' custom field for a post.
     *
     * Checks if the '_best_seller' checkbox is set in the $_POST data and updates
     * the post meta accordingly. If the checkbox is checked, sets the value to 'yes';
     * otherwise, sets it to 'no'.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save_best_seller_checkbox( $post_id ) {
        $best_seller = isset( $_POST['_best_seller'] ) ? 'yes' : 'no';
        update_post_meta( $post_id, '_best_seller', $best_seller );
    }

    /**
     * Adds a "Best Seller" badge to the product price HTML if the product is marked as a best seller.
     *
     * Retrieves the '_best_seller' post meta for the given product. If the value is 'yes',
     * prepends a "Best Seller" badge to the price HTML.
     *
     * @param string   $price   The original price HTML.
     * @param WC_Product $product The WooCommerce product object.
     * @return string The modified price HTML with the badge if applicable.
     */
    public function display_best_seller_badge( $price, $product ) {
        $best_seller = get_post_meta( $product->get_id(), '_best_seller', true );

        if ( $best_seller === 'yes' ) {
            $badge = '<span class="best-seller-badge">' . __( 'Best Seller', 'ts-excercise-addons' ) . '</span>';
            $price = $badge . $price;
        }

        return $price;
    }

    /**
     * Enqueues the stylesheet for the Best Seller feature of the TS Exercise Addons plugin.
     *
     * This method registers and enqueues the 'ts-exercise-addons' CSS file,
     * ensuring it is loaded on the frontend with the appropriate versioning.
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_best_seller_styles() {
        wp_enqueue_style(
            'ts-exercise-addons',
            TS_EXERCISE_ADDONS_DIR . '/assets/ts-exercise-addons.css',
            array(),
            TS_EXERCISE_ADDONS_VERSION,
            'all'
        );
    }
}

new TS_EXERCISE_ADDONS();