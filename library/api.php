<?php


function jwt_auth_function( $data, $user ) { 
	$data['user_id'] = $user->data->ID;
	$data['user_data'] = get_userdata( $user->data->ID );
	return $data;
}
add_filter( 'jwt_auth_token_before_dispatch', 'jwt_auth_function', 10, 2 );


