<form method="post" action="">
	<div>
        <label for="childName">Child name:</label>
        <input type="text" name="childName">
    </div>

    <div>
        <label for="childGender">Child gender:</label>

        <input type="radio" id="gender1" name="childGender" value="male" />
        <label for="gender1">M</label>

        <input type="radio" id="gender2" name="childGender" value="female" />
        <label for="gender2">F</label>
    </div>

    <div>
        <label for="teacherName">Teacher name:</label>
        <input type="text" name="teacherName">
    </div>

    <div>
        <label for="childGender">Excuse:</label>

        <input type="radio" id="excuse1" name="excuse" value="excuse1" />
        <label for="excuse1">Illness</label>

        <input type="radio" id="excuse2" name="excuse" value="excuse2" />
        <label for="excuse2">Death of the pet (or a family member)</label>

        <input type="radio" id="excuse3" name="excuse" value="excuse3" />
        <label for="excuse3">Significant extra-curricular activity</label>

        <input type="radio" id="excuse4" name="excuse" value="excuse4" />
        <label for="excuse4">I am tired of that kid</label>
    </div>

	<input type="submit" name="submit" value="Apology generation">
</form>

<?php

if (isset($_POST["childName"], $_POST["childGender"], $_POST["teacherName"], $_POST["excuse"]))
{
    $childName = $_POST["childName"];
    $childType = ($_POST["childGender"] == 'male') ? 'son' : 'daughter';
    $childGender = ($_POST["childGender"] == 'male') ? 'he' : 'she';
    $teacherName = $_POST["teacherName"];
    $excuseType = $_POST["excuse"];
    $excuse;
    $excuses1 = ["$childGender was sick", "$childGender had a stomach ache", "$childGender felt in the stairs", "$childGender had a cold", "$childGender had a fever"];
    $excuses2 = ["our cat died", "our dog died", "our bunny died", "our chinchilla died", "grandma died"];
    $excuses3 = ["$childGender had sport", "$childGender had pony", "$childGender had swimming lessons", "$childGender had music lessons", "$childGender had something to do"];
    $excuses4 = ["$childGender is a stupid kid", "$childGender is a dumb kid" , "$childGender is an annoying kid", "$childGender asked nicely", "$childGender scared me a little"];
    $date = date("Y-m-d");

    function random()
    {
        return mt_rand(0,4);
    }
    $randNum = random();

    switch ($excuseType)
    {
        case "excuse1":
            $excuse = $excuses1[$randNum];
            break;
        case "excuse2":
            $excuse = $excuses2[$randNum];
            break;
        case "excuse3":
            $excuse = $excuses3[$randNum];
            break;
        case "excuse4":
            $excuse = $excuses4[$randNum];
            break;
    }

    echo "Dear $teacherName, My $childType $childName was unable to attend class this $date because $excuse.";
}
?>