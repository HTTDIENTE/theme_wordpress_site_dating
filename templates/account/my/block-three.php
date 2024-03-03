<?php
/**
 * @var array $args array with data about one event
 */

get_template_part( 'templates/account/my/tabs/tabs' );
get_template_part( 'templates/account/my/tabs/about', '', $args );
get_template_part( 'templates/account/my/tabs/photos', '', $args );
get_template_part( 'templates/account/my/tabs/videos', '', $args );
