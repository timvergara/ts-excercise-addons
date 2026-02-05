# TS Exercise Addons

A WordPress plugin that adds best seller functionality to WooCommerce products, allowing store administrators to mark products as best sellers and display a custom badge.

## Description

TS Exercise Addons is a lightweight WooCommerce extension that provides an easy way to highlight your best-selling products. The plugin adds a simple checkbox to the product edit screen and automatically displays a "Best Seller" badge on products that are marked as best sellers.

## Features

- Add a "Best Seller" checkbox to WooCommerce product edit pages
- Automatically display a "Best Seller" badge on marked products
- Custom styling for the best seller badge
- Integration with Advanced Custom Fields (ACF) for field management
- Translation-ready with text domain support
- Lightweight and performance-optimized

## Requirements

- WordPress 5.0 or higher
- WooCommerce 3.0 or higher
- PHP 7.0 or higher
- Advanced Custom Fields (ACF) plugin

## Installation

1. Download the plugin files
2. Upload the `ts-excercise-addons` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Ensure WooCommerce and ACF are installed and activated

## Usage

### Marking a Product as Best Seller

1. Go to **Products** > **All Products** in your WordPress admin
2. Edit any product
3. Scroll down to the **Product Data** section
4. Find the **Best Seller** checkbox in the General tab
5. Check the box to mark the product as a best seller
6. Click **Update** to save your changes

### Frontend Display

Once a product is marked as a best seller, a "Best Seller" badge will automatically appear alongside the product price on:
- Shop pages
- Product archive pages
- Individual product pages
- Any other location where the product price is displayed

## File Structure

```
ts-excercise-addons/
├── acf-json/
│   └── ts-exercise-addons.json    # ACF field configurations
├── assets/
│   └── ts-exercise-addons.css     # Plugin styles
├── includes/
│   └── class-best-seller.php      # Main plugin class
├── ts-excercise-addons.php        # Plugin entry point
└── README.md                       # This file
```

## Customization

### Styling the Badge

The best seller badge can be customized by modifying the CSS in [assets/ts-exercise-addons.css](assets/ts-exercise-addons.css) or by adding custom CSS to your theme.

The badge uses the class `.best-seller-badge`.

### Changing Badge Text

To change the badge text, you can use WordPress translation filters or modify the text domain strings in the plugin files.

## Developer Information

### Constants

The plugin defines the following constants:

- `TS_EXERCISE_ADDONS_DIR` - Plugin directory URL
- `TS_EXERCISE_ADDONS_PATH` - Plugin directory path
- `TS_EXERCISE_ADDONS_WP_DIR` - WordPress site URL
- `TS_EXERCISE_ADDONS_PLUGIN_NAME` - Plugin display name
- `TS_EXERCISE_ADDONS_VERSION` - Current plugin version
- `TS_EXERCISE_ADDONS_OPTIONS` - Options identifier

### Hooks and Filters

The plugin uses the following WordPress/WooCommerce hooks:

- `woocommerce_product_options_general_product_data` - Adds the checkbox to product edit page
- `woocommerce_process_product_meta` - Saves the checkbox value
- `woocommerce_get_price_html` - Displays the best seller badge
- `wp_enqueue_scripts` - Enqueues plugin styles
- `acf/settings/load_json` - Loads ACF field configurations
- `acf/settings/save_json` - Saves ACF field configurations

## Changelog

### 1.0.0
- Initial release
- Best seller checkbox functionality
- Badge display on product prices
- ACF integration
- Custom styling support

## Author

**Timothy Roy Vergara**
- Website: [https://timothyroyvergara.com/](https://timothyroyvergara.com/)

## Support

For bug reports, feature requests, or general support, please contact the author through the website.

## License

This plugin is provided as-is for educational and commercial use.

## Credits

Built with:
- WordPress
- WooCommerce
- Advanced Custom Fields (ACF)
