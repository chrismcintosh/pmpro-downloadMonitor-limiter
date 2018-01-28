<?php
/**
 * WordPress Settings Framework
 *
 * @author Gilbert Pellegrom, James Kemp
 * @link https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */

/**
 * Define your settings
 * 
 * The first parameter of this filter should be wpsf_register_settings_[options_group],
 * in this case "my_example_settings".
 * 
 * Your "options_group" is the second param you use when running new WordPressSettingsFramework()
 * from your init function. It's importnant as it differentiates your options from others.
 * 
 * To use the tabbed example, simply change the second param in the filter below to 'wpsf_tabbed_settings'
 * and check out the tabbed settings function on line 156.
 */
 
add_filter( 'wpsf_register_settings_download_settings', 'wpsf_tabless_settings' );

/**
 * Tabless example
 */
function wpsf_tabless_settings( $wpsf_settings ) {

    // General Settings section
    $wpsf_settings[] = array(
        'section_id' => 'general',
        'section_title' => 'General Settings',
        'section_description' => 'Some intro description about this section.',
        'section_order' => 5,
        'fields' => array(
            array(
                'id' => 'downloads_per_user',
                'title' => 'Downloads Per User',
                'desc' => 'This is the number of downloads a user can download in a month.',
                'placeholder' => 'This is a placeholder.',
                'type' => 'text',
                'std' => 'This is std'
            ),
        )
    );

    return $wpsf_settings;
}
