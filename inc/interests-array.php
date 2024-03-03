<?php
$explode_interests              = '';
$explode_activiets              = '';
$explode_leisure_activities     = '';
$explode_music                  = '';
$explode_arts_and_entertainment = '';
$array_interests                = array();

while ( wld_loop( 'wld_interests_array' ) ) :
	$explode_interests              = explode( ', ', wld_get( 'sports_and_fitness' ) );
	$explode_activiets              = explode( ', ', wld_get( 'activities' ) );
	$explode_leisure_activities     = explode( ', ', wld_get( 'leisure_activities' ) );
	$explode_music                  = explode( ', ', wld_get( 'music' ) );
	$explode_arts_and_entertainment = explode( ', ', wld_get( 'arts_and_entertainment' ) );
endwhile;

foreach ( $explode_interests as $row ) :
	$array_interests[] = $row;
endforeach;

foreach ( $explode_activiets as $row ) :
	$array_interests[] = $row;
endforeach;

foreach ( $explode_leisure_activities as $row ) :
	$array_interests[] = $row;
endforeach;

foreach ( $explode_music as $row ) :
	$array_interests[] = $row;
endforeach;

foreach ( $explode_arts_and_entertainment as $row ) :
	$array_interests[] = $row;
endforeach;

return $array_interests;
