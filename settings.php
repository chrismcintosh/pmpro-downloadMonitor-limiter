<?php

class DownloadLimitSettings {

    private $plugin_path;
    private $wpsf;

    function __construct()
    {
        $this->plugin_path = plugin_dir_path( __FILE__ );
        add_action( 'admin_menu', array( $this, 'init_settings' ), 99 );

        // Include and create a new WordPressSettingsFramework
        require_once( $this->plugin_path .'wp-settings-framework.php' );
        $this->wpsf = new WordPressSettingsFramework( $this->plugin_path .'settings/download-settings.php', 'download_settings' );
        
        // Add an optional settings validation filter (recommended)
        add_filter( $this->wpsf->get_option_group() .'_settings_validate', array(&$this, 'validate_settings') );
    }

    public function init_settings() {
        
        $this->wpsf->add_settings_page( array(
            'parent_slug' => 'options-general.php',
            'page_title'  => __( 'Download Limit Settings' ),
            'menu_title'  => __( 'Download Limit' )
        ) );
        
    }

    function validate_settings( $input ) {
    	// Do your settings validation here
	// Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
    	return $input;
    }

}

$wpsf_test = new DownloadLimitSettings();
