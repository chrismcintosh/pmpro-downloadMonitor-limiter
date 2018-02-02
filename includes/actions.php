<?php


/** Function to Reset Filecount */
function reset_monthly_user_filecount($user_id, $reset_date) {
     $download_count_per_month = get_download_per_month_setting();
     update_user_meta($user_id, 'available_downloads_this_month', $download_count_per_month);
     update_user_meta($user_id, 'reset_date', $reset_date);
}
 /** Check Download Per Month Limitation in Admin Dashboard */
function get_download_per_month_setting() {
     $options = get_option('download_settings_settings');
     $download_count_per_month = $options['general_downloads_per_user'];
     return $download_count_per_month;
}

/** Determine if date has passed where reset should happen */
function check_reset($user_id) {

     $reset_date = get_user_meta($user_id, 'reset_date', true);
     $reset = false;
     
     if (! $reset_date) {    
         $reset  = true;
     } else {
          $now  = time();
          $thirty_days = (30 * 24 * 60 * 60);
          if (($now - $reset_date) > $thirty_days){
               $reset  = true;
          }
     }
     
     if ($reset){
          reset_monthly_user_filecount( $user_id, time() );
     }
     
}

function decrement_downloads($dl_id,$version, $file_path) {
     $user_id = get_current_user_id();
     if ($user_id){
          global $valid_memberships;
          // d(get_current_user_id());
          if (pmpro_hasMembershipLevel($valid_memberships)) {
               $available_downloads = get_user_meta($user_id, 'available_downloads_this_month', true);
               $available_downloads -= 1;
               update_user_meta($user_id, 'available_downloads_this_month',$available_downloads);
          }
     }
}

add_action('dlm_downloading','decrement_downloads',10,3);

