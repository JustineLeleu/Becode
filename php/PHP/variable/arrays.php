<?php

$me = array(
	'age'=> 24 ,
	'firstname' => 'Justine' ,
	'lastname'  => 'Leleu' ,
	'favourite_movies' => array('Treasure planet ', 'The incredible Journey', 'Jurassic Park'),
    'hobbies' => ['video-games', 'series', 'drawing']
);

$sister = array(
	'age'=> 24 ,
	'firstname' => 'Margaux' ,
	'lastname'  => 'Leleu' ,
	'favourite_movies' => array('Movie1', 'Movie2', 'Movie3'),
    'hobbies' => ['video-games', 'series', 'fencing']
);

$soulmate = array(
	'age'=> 24 ,
	'firstname' => 'Truc' ,
	'lastname'  => 'Bidule' ,
	'favourite_movies' => array('Movie1', 'Movie2', 'Movie3'),
    'hobbies' => ['video-games', 'hobbie2', 'hobbie3']
);

$myHobbiesCount = count($me['hobbies']);
$sisterHobbiesCount = count($sister['hobbies']);
$totalHobbiesCount = $myHobbiesCount + $sisterHobbiesCount;
echo $totalHobbiesCount;

$me['hobbies'][] = 'taxidermy';

$me['lastname'] = "Durand";

$possible_hobbies_via_intersection = array_intersect($me["hobbies"], $soulmate["hobbies"]);
$possible_hobbies_via_merge = array_merge($me["hobbies"], $soulmate["hobbies"]);

// echo '<pre>';
// print_r($possible_hobbies_via_intersection);
// print_r($possible_hobbies_via_merge);
// echo '</pre>';

$web_development = array(
    'frontend' => [],
    'backend'=> []
);

$web_development['frontend'][] = 'xhtml';
$web_development['backend'][] = 'Ruby on Rails';
$web_development['frontend'][] = 'css';
$web_development['backend'][] = 'flash';
$web_development['frontend'][] = 'javascript';
$web_development['frontend'][0] = 'html';
array_pop($web_development['backend']);

echo '<pre>';
print_r($web_development);
echo '</pre>';

?>