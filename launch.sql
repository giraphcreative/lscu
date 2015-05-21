
SET @wp_url_old = 'http://lscu.coop', @wp_url_new = 'http://www.lscu.coop';

UPDATE lscu_options SET option_value = replace( option_value, @wp_url_old, @wp_url_new ) 
	WHERE option_value LIKE CONCAT( '%', @wp_url_old, '%' );

UPDATE lscu_posts SET guid = replace( guid, @wp_url_old, @wp_url_new );

UPDATE lscu_posts SET post_content = replace( post_content, @wp_url_old, @wp_url_new );

UPDATE lscu_postmeta SET meta_value = replace( meta_value, @wp_url_old, '' ) WHERE `meta_key` IN( '_p_large-title-icon' );
