<?php


function jwt_auth_function( $data, $user ) { 
	$user_data = get_userdata( $user->data->ID );
	$data['user_id'] = $user->data->ID;
	$data['user_is_member'] = ( in_array( 'member', $user_data->roles ) ? true : false );
	$data['user_data'] = $user_data;
	$data['user_meta'] = get_user_meta( $user->data->ID );
	return $data;
}
add_filter( 'jwt_auth_token_before_dispatch', 'jwt_auth_function', 10, 2 );


