<?php

function check_already_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if ($user_session) {
		redirect('dashboard');
	}
}

function check_not_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if (!$user_session) {
		redirect('auth/login');
	}
}

function check_super_user($tipe_user, $previllage) {	
	if ($tipe_user < $previllage) {
		redirect('auth/login');
	}
}

function check_right_user($user_id, $item_id, $tipe_user, $previllage) {	
	if ($user_id != $item_id && $tipe_user < $previllage) {
		redirect('dashboard');
	}
}

function isRightUser($user_id, $item_id) {	
	if ($user_id != $item_id) {
		redirect('dashboard');
	}
}

?>