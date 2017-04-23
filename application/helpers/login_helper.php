<?php
function is_logged_in() {
    $CI =& get_instance();
    $user = $CI->session->userdata('id');
    if (!isset($user)) { return false; } else { return true; }
}
