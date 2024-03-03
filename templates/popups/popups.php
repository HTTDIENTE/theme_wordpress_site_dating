<?php
get_template_part( 'templates/popups/cycle/pre-loader' );
get_template_part( 'templates/popups/cycle/report-abuse' );

if ( WLD_Account::get_fields( 'uncompleted' ) ) {
	get_template_part( 'templates/popups/cycle/complete-account' );
}
