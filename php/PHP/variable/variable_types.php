<?php
$MyName = 'Justine';
$MyAge = 24;
$MyEyes = 'brown';
$MyFamily = array('Margaux','Philippe');
$IsHungry = true;
?>

<html>
  <head><title>PHP exos</title></head>
  <body>
    <p>Hi! My name is <?php echo $MyName; ?></p>
    <p>I am <?php echo $MyAge; ?> years old.</p>
    <p>My eyes are <?php echo $MyEyes; ?></p>
    <p>The first person in my family is <?php echo $MyFamily[0]; ?></p>
  </body>
</html>