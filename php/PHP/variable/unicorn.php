<form method="post" action="">
    <div>
        <label for="race">Are you a human, a cat or a unicorn ?</label>

        <input type="radio" id="human" name="race" value="human" />
        <label for="human">Human</label>

        <input type="radio" id="cat" name="race" value="cat" />
        <label for="cat">Cat</label>

        <input type="radio" id="unicorn" name="race" value="unicorn" />
        <label for="unicorn">Unicorn</label>
    </div>

	<input type="submit" name="submit" value="Gif">
</form>

<?php
$gif;

if (isset($_POST["race"]))
{
    $race = $_POST["race"];

    $gif = ($race == 'human') ? 'https://giphy.com/embed/l46Cj9QLmsgtR3qsU' : (($race == 'cat') ? 'https://giphy.com/embed/l9yPNEGdNdQtMxYm2i' : 'https://giphy.com/embed/j0kQJxo5mzGYb4EvWK') ;
}

?>

<iframe src=<?php echo $gif; ?> width="480"  frameBorder="0" class="giphy-embed" allowFullScreen></iframe>