<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
	function is_logged_in() {
		$CI           = &get_instance();
		$is_logged_in = $CI->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect(base_url()."welcome");
			echo 'You don\'t have permission to access this page. <a href="'.base_url().'welcome">Login</a>';
			die();
		}
	}
	function addActiveClass($current_uri = null, $opturi = 4, $arrayData = 6) {
		$CI   = &get_instance();
		$url  = $CI->uri->segment(2, '');
		$flag = 0;
		if ($url == $current_uri or $url == $opturi) {
			echo 'active';
			return;
		}
		if (is_array($arrayData)) {
			foreach ($arrayData as $value) {
				if ($value == $url) {
					$flag = 1;
				}
				if ($flag == 1) {
					echo 'active';
					return;
				}
			}
		}
		return;

	}
}