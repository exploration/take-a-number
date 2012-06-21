<?php
$filename = "assets/data/number.txt";

#read file
$number = file_get_contents($filename);

if ($_GET['reset'] == 1) {
  $new_number = 1;
} else if ($_GET['increment'] == 1) {
  $new_number = $number + 1;
} else {
  $new_number = $number;
}

#write new number
$fp = fopen($filename, 'w');
fwrite($fp, $new_number);
fclose($fp);

header('Content-type: text/plain');
printf("%s", $new_number);
?>
