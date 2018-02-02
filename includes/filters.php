<?php

function allow_to_download() {
     // return true;
     global $valid_memberships;
     if (pmpro_hasMembershipLevel($valid_memberships)) {
          check_reset(get_current_user_id());
          $available_downloads = get_user_meta(get_current_user_id(), 'available_downloads_this_month', true);
          if ($available_downloads > 0) {
               return true;
          }
          
     }
     return false;
}

function download_content($content, $id, $atts) {
     // return $content;
     if( allow_to_download() ) {
          return $content;
     }
     return "You've exceeded your available download limit for the month";
}

add_filter('dlm_shortcode_download_content', 'download_content', 10, 3);