<?php

$textToShuffle = "According to a researcher at Cambridge University, it doesn't matter in what order the letters in a word are, the only important thing is that the first and last letter be at the right place. The rest can be a total mess and you can still read it without problem. This is because the human mind does not read every letter by itself but the word as a whole.";

function separateWords($text)
{
    $textSeparated = [];
    $textArray = preg_split("/([,.])/", $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($textArray as $element)
    {
        if (strlen($element) == 1) $textSeparated[] = $element;
        else
        {
            $elementSeparated = preg_split("/([\s])/", $element);
            foreach ($elementSeparated as $word)
            {
                if (strlen($word) != 0) $textSeparated[] = $word;
            }
        }
    }

    return $textSeparated;
}

$textArray = separateWords($textToShuffle);;

function shuffleWords($words)
{
    $shuffle = '';
    foreach ($words as $word)
    {
        if (strlen($word) == 1)
        {
            if($word == ',' OR $word == '.') $shuffle .= $word;
            else $shuffle .= ' '.$word;
        }
        else $shuffle = $shuffle. ' ' .$word[0].str_shuffle(substr($word,1,strlen($word)-2)).$word[strlen($word)-1]; 
    }

    return $shuffle;
}

$textShuffled = shuffleWords($textArray);

echo $textShuffled;

echo '<br> <br>';
?>

<?php

echo ucfirst('émile');
echo '<br>';
echo date('Y');
echo '<br>';
echo date('Y-m-d H:i:s');
echo '<br>';

function sum($a, $b)
{
    if (!is_numeric($a) OR !is_numeric($b))
    {
        return 'Error: argument is the not a number.';
    }
    else return $a + $b;
}
echo sum(1, 3);
echo '<br>';

function acronym($string)
{
    $acronym = '';
    $words = explode(' ', $string);
    foreach ($words as $word)
    {
        $acronym .= ucfirst($word[0]);
    }
    return $acronym;
}
echo acronym('In code we trust!');
echo '<br>';

function makeAE($string)
{
   return str_replace('ae','æ', $string);
}
echo makeAE('caecotrophie');
echo '<br>';

function unMakeAE($string)
{
    return str_replace('æ','ae', $string);
}
echo unMakeAE('cæcotrophie');
echo '<br>';

function feedback($message, $class = 'info')
{
    echo "<div class='$class'>$message</div>";
}
echo feedback("Incorrect email address");
echo '<br>';

function generateWord($min, $max)
{
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $finalWord = '';
    $lenght = random_int($min, $max);
    for ($i = 0; $i < $lenght; $i++)
    {
        $finalWord .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $finalWord;
}
echo "<h2>Generate a new word</h2>";
$word1 = generateWord(1, 5);
$word2 = generateWord(7, 15);
echo "<p>$word1</p>";
echo "<p>$word2</p>";
echo "<button>Generate</button>";

echo "<br><br>";
echo strtolower("STOP YELLING I CAN'T HEAR MYSELF THINKING!!");
echo "<br><br>";

function calculate_cone_volume($r, $h)
{
    return pow($r, 2) * pi() * $h * (1/3);
}

// Volume of a cone which ray is 5 and height is 2 
$volume = calculate_cone_volume(5, 2);  
echo 'The volume of a cone which ray is 5 and height is 2 = ' . $volume . ' cm<sup>3</sup><br />';  
// Volume of a cone which ray is 3 and height is 4  
$volume = calculate_cone_volume(3, 4);  
echo 'The volume of a cone which ray is 3 and height is 4 = ' . $volume . ' cm<sup>3</sup><br />';

echo "<br><br><br>";

function factorial($num)
{
    if ($num < 0) return;
    if ($num > 1) return $num * factorial($num-1);
    if ($num == 1) return 1;
}

$f = factorial(7);
echo "fractorial of 7 = $f";

echo "<br>";

function isPrime($num)
{
    if ($num <= 1) return;
    for ($i = 2; $i < $num; $i++)
    {
        if ($num % $i == 0) return false;
    }

    return true;
}

$prime = isPrime(3) ? "3 is a prime number" : "3 is not a prime number";
echo $prime;

echo "<br>";

function reverseString($string)
{
    return strrev($string);
}

$stringToReverse = "Reverse this string";
echo reverseString($stringToReverse);

echo "<br>";

function sortArray($array)
{
    sort($array);
    return $array;
}

$arrayToSort = [59, 21, 43, 62, 12];
$sortedArray = sortArray($arrayToSort);
echo '<pre>';
print_r($sortedArray);
echo '</pre>';

function isLowercase($string)
{

    $arr = preg_split('/([?,.\s])/', $string);
    foreach ($arr as $value)
    {
        if ($value != "" AND !ctype_lower($value)) return false;
    }

    return true;
}

$stringToCheck = 'is this in lowercase ?';
$isStringLowercase = isLowercase($stringToCheck) ? 'this string is in lowercase' : 'this string is not in lowercase';
echo "$stringToCheck : $isStringLowercase";

echo "<br>";

function isPalindrome($string)
{
    $string = preg_replace('/([\s])/','', $string);
    $arr = str_split($string);
    for ($i = 0; $i < count($arr); $i++)
    {
        if ($arr[0] != $arr[count($arr) -1]) return false;
        array_shift($arr);
        array_pop($arr);
    }
    return true;
}

$palindrome = 'nurses run';
$isPalindrome = isPalindrome($palindrome) ? 'is a palindrome' : 'is not a palindrome';
echo $palindrome. " " .$isPalindrome;

?>