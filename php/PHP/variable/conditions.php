<?php

/**
 * Series of exercises on PHP conditional structures.
*/  

// temperature condition

$temperature = 10;
if( $temperature >= 15 ) 
{
   $clothes = "T-shirt";
   $should_i_wear_a_scarf = false;
 } 
 else 
 {
   $clothes = "Pull-over";
   $should_i_wear_a_scarf = true;
 }
 
 if ($should_i_wear_a_scarf == true)
 {
	 //grab_scarf_from_door_hanger();
 }
//cover_my_chest_with($clothes);
echo $clothes;


// 1.1 Clean your room Exercise 
echo "<br><br>";
$room_is_filthy = false;

if( $room_is_filthy ){
	echo "Yuk, Room is dirty : let's clean it up !";
	//cleanup_room();
	echo "Room is now clean!";
	$room_is_filthy = false;
} else {
	echo "Nothing to do, room is neat.";
}

// 1.2 Clean your room Exercise, improved
echo "<br><br>";
// Create the array of possible states
$possible_states = ["health hazard", "filthy", "dirty", "clean", "immaculate"];

// When testing, change the index value to navigate to the possible array values
$room_filthiness = $possible_states[0]; 

if($room_filthiness ==  $possible_states[0])
{
	echo "Yuk, Room is Disgusting! Let's clean it up !";
} 
else if($room_filthiness ==  $possible_states[1])
{
	echo "Yuk, Room is dirty : let's clean it up !";
} 
else if($room_filthiness ==  $possible_states[2])
{
	echo "Room is dirty : let's clean it up !";
} 
else if($room_filthiness ==  $possible_states[3])
{
	echo "Nothing to do, room is clean.";
} 
else 
{
	echo "Nothing to do, room is neat.";
}

// 2. "Different greetings according to time" Exercise
echo "<br><br>";
date_default_timezone_set("Europe/Brussels");
$now = date("H:i"); // How to get the current time in PHP ? Google is your friend ;-)
//echo $now;

// Test the value of $now and display the right message according to the specifications.
if($now >= "05:00" AND $now <= "09:00")
{
    echo "Good morning !";
}
else if($now >= "09:01" AND $now <= "12:00")
{
    echo "Good day !";
}
else if($now >= "12:01" AND $now <= "16:00")
{
    echo "Good afternoon !";
}
else if($now >= "16:01" AND $now <= "21:00")
{
    echo "Good evening !";
}
else
{
    echo "Good night !";
}

echo "<br><br>";
?>

<!-- // 3. "Different greetings according to age" Exercise -->
<form method="get" action="">
	<div>
        <label for="age">What is your age:</label>
        <input type="" name="age">
    </div>

    <div>
        <input type="radio" id="gender1" name="gender" value="male" />
        <label for="gender1">Male</label>

        <input type="radio" id="gender2" name="gender" value="female" />
        <label for="gender2">Female</label>
    </div>

    <div>
        <label for="language">Do you speak english?</label>

        <input type="radio" id="language1" name="language" value="true" />
        <label for="language1">Yes</label>

        <input type="radio" id="language2" name="language" value="false" />
        <label for="language2">No</label>
    </div>

	<input type="submit" name="submit" value="Greet me now">
</form>

<?php
if (isset($_GET['age'], $_GET['gender'], $_GET['language']))
{
	// Form processing
    if ($_GET['gender'] == "male") $gender = "mister";
    else $gender = "miss";

    if ($_GET['language'] == "true") $greatings = "Hello";
    else $greatings = "Aloha";

    if ($_GET['age'] < 12) echo "$greatings $gender kid!";
    else if ($_GET['age'] < 18) echo "$greatings $gender  Teen !";
    else if ($_GET['age'] < 115) echo "$greatings $gender Adult !";
    else echo "Wow! Still alive $gender? Are you a robot, like me ? Can I hug you ?";
}

echo "<br><br>";
?>

<!-- // 6. "The girls soccer team" Exercise -->
<form method="get" action="">
	<div>
        <label for="soccerAge">What is your age:</label>
        <input type="number" name="soccerAge">
    </div>

    <div>
        <input type="radio" id="soccerGender1" name="soccerGender" value="male" />
        <label for="soccerGender1">Male</label>

        <input type="radio" id="soccerGender2" name="soccerGender" value="female" />
        <label for="soccerGender2">Female</label>
    </div>

    <div>
        <label for="soccerName">What is your name:</label>
        <input type="text" name="soccerName">
    </div>

	<input type="submit" name="submit" value="Greet me now">
</form>

<?php
if (isset($_GET['soccerAge'], $_GET['soccerGender'], $_GET['soccerName']))
{
	// Form processing
    $soccerAge = $_GET['age'];
    $soccerGender = $_GET['gender'];
    $soccerMessage = "Sorry you don't fit the criteria";

    // if ($soccerGender == 'female' AND $soccerAge >= 21 AND $soccerAge <= 40) echo "Welcome to the team !";
    // else echo "Sorry you don't fit the criteria";

    if ($soccerGender == 'female' AND $soccerAge >= 21 AND $soccerAge <= 40) $soccerMessage = "Welcome to the team !";
    echo $soccerMessage;
}

echo "<br><br>";
?>

<!-- // 8. "School sucks" Exercise -->
<form method="get" action="">
	<div>
        <label for="schoolNote">Note:</label>
        <input type="number" name="schoolNote" min="0" max="20">
    </div>

	<input type="submit" name="submit" value="Grade me now">
</form>

<?php
if (isset($_GET['schoolNote']))
{
	// Form processing
    $schoolNote = $_GET['schoolNote'];

    if ($schoolNote < 4) echo 'This work is really bad. What a dumb kid!';
    else if ($schoolNote > 5 AND $schoolNote < 9) echo 'This is not sufficient. More studying is required.';
    else if ($schoolNote == 10) echo  'barely enough!';
    else if ($schoolNote > 11 AND $schoolNote < 14) echo 'Not bad!';
    else if ($schoolNote > 15 AND $schoolNote < 18) echo 'Bravo, bravissimo!';
    else echo 'Too good to be true : confront the cheater!';
}

?>