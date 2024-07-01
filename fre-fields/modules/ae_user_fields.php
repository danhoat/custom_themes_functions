<?php 

function box_save_user_fields($result, $user_data){

	$phone = $user_data['phone'];
	update_user_meta($result, 'phone', $phone);


	$com_fields = array();
	if(isset($user_data['company_address'])){
		$com_fields['company_address'] = $user_data['company_address'];
	}
	if(isset($user_data['company_city'])){
		$com_fields['company_city'] = $user_data['company_city'];
	}

	if(isset($user_data['company_state'])){
		$com_fields['company_state'] = $user_data['company_state'];
	}


	if(isset($user_data['zipcode'])){
		$com_fields['zipcode'] = $user_data['zipcode'];
	}
	if(isset($user_data['country'])){
		$com_fields['country'] = $user_data['country'];
	}
	if(isset($user_data['bus_reg_number'])){
		$com_fields['bus_reg_number'] = $user_data['bus_reg_number'];
	}

	if(isset($user_data['vat_number'])){
		$com_fields['vat_number'] = $user_data['vat_number'];
	}
	if(isset($user_data['eu_vat_number'])){
		$com_fields['eu_vat_number'] = $user_data['eu_vat_number'];
	}
	

	if( !empty($com_fields) ){
		update_user_meta($result,'company_fieds', $com_fields);
	}

}
add_action('ae_insert_user','box_save_user_fields', 10, 2);

function box_save_profile_fields($result, $user_data){


	global $user_ID;

	$phone = $user_data['phone'];
	if( isset( $user_data['phone'] ) ){
		update_user_meta($user_ID, 'phone', $user_data['phone']);
	}

	$com_fields = array();
	if(isset($user_data['company_address'])){
		$com_fields['company_address'] = $user_data['company_address'];
	}
	if(isset($user_data['company_city'])){
		$com_fields['company_city'] = $user_data['company_city'];
	}

	if(isset($user_data['company_state'])){
		$com_fields['company_state'] = $user_data['company_state'];
	}


	if(isset($user_data['zipcode'])){
		$com_fields['zipcode'] = $user_data['zipcode'];
	}
	if(isset($user_data['country'])){
		$com_fields['country'] = $user_data['country'];
	}
	if(isset($user_data['bus_reg_number'])){
		$com_fields['bus_reg_number'] = $user_data['bus_reg_number'];
	}

	if(isset($user_data['vat_number'])){
		$com_fields['vat_number'] = $user_data['vat_number'];
	}
	if(isset($user_data['eu_vat_number'])){
		$com_fields['eu_vat_number'] = $user_data['eu_vat_number'];
	}
	

	if( !empty($com_fields) ){
		update_user_meta($user_ID,'company_fieds', $com_fields);
	}

}
add_action('ae_update_fre_profile','box_save_profile_fields',10,2);


function box_add_phone_fields($methods){
	$methods['phone'] = 'Phone Number';
	
	return $methods;
}
add_filter('user_contactmethods','box_add_phone_fields');