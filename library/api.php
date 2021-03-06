<?php


function jwt_auth_function( $data, $user ) { 

	// get more user data
	$user_data = get_userdata( $user->data->ID );
	$user_meta = get_user_meta( $user->data->ID );
	// $data['user_data'] = $user_data;
	// $data['user_meta'] = $user_meta;

	$is_member = false;
	if ( in_array( 'member', $user_data->roles ) ) $is_member = true;
	if ( in_array( 'administrator', $user_data->roles ) ) $is_member = true;
	if ( in_array( 'editor', $user_data->roles ) ) $is_member = true;
	if ( in_array( 'author', $user_data->roles ) ) $is_member = true;
	if ( in_array( 'boardofdirectors', $user_data->roles ) ) $is_member = true;
	if ( in_array( 'lscustaff', $user_data->roles ) ) $is_member = true;

	// add our actual fields.
	$data['user_id'] = $user->data->ID;
	$data['user_is_member'] = $is_member;
	$data['user_fname'] = $user_meta['first_name'][0];
	$data['user_lname'] = $user_meta['last_name'][0];
	$data['cu_name'] = ( isset( $user_meta['cu_name'] ) ? $user_meta['cu_name'][0] : '' );
	$data['cu_charter_id'] = ( isset( $user_meta['Credit Union'][0] ) ? $user_meta['Credit Union'][0] : ( isset( $user_meta['cu_charter_id'][0] ) ? $user_meta['cu_charter_id'][0] : '' ) );

	return $data;

}
add_filter( 'jwt_auth_token_before_dispatch', 'jwt_auth_function', 10, 2 );


