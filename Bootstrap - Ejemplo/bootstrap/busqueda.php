
<?php
// Produce: <body text='black'>
$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// Produce: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");

// Produce: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);

// Produce: 2
$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $count;
?>
