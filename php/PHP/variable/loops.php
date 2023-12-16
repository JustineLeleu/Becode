<?php

$pronouns = array ('I', 'You', 'He/She','We', 'You', 'They');

foreach ($pronouns as $key => $pronoun)
{
    $text;
    $text = ($key == 2) ? 'codes' : 'code';
    echo $pronoun. ' ' .$text;
    echo '<br>';
}

$num = 1;
while ($num <= 120)
{
    echo $num.' ';
    $num++;
}

echo '<br>';

for ($i = 1; $i <= 120; $i++)
{
    echo $i.' ';
}

echo '<br>';

$people = ["AlexandreVa", "AlexandreVe", "Antoine", "Bastien", "Carole", "Elisabeth", "Elodie", "Justin", "Justine", "Kimi", "Layla", "Lidwine", "Lucas", "Mathias", "Okly", "Pierre", "Robin", "Rosalie", "Stephane", "Tim", "Toms", "Valentin", "Virginie"];

foreach ($people as $person)
{
    echo $person." ";
}

//$countrys = ['Belgium', 'France', 'England', 'USA', 'Spain', 'Italy', 'Canada', 'Australia', 'Japan', 'China'];
$countrys = array(
    'BE' => 'Belgium',
    'FR' => 'France',
    'EN' => 'England',
    'US' => 'USA',
    'ES' => 'Spain',
    'IT' => 'Italy',
    'CA' => 'Canada',
    'AU' => 'Australia',
    'JP' => 'Japan',
    'CN' => 'China'
)

?>

<form method="get" action="">
    <select name="countrys">
        <?php
        foreach ($countrys as $key => $value)
        {
            ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php
        }
        ?>
    </select>
</form>