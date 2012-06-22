<?php

$data_dir = "assets/data";

if (isset($_GET['resourceid'])) {
  $filename = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['resourceid']) . ".txt";
} else {
  #barf if no filename passed
  header("HTTP/1.0 400 Bad Request"); 
  exit;
}

#create the file if necessary
if (!file_exists("$data_dir/$filename")) {
  $fp = fopen("$data_dir/$filename", 'w');
  fwrite($fp, 0);
  fclose($fp);
}

#read file
$number = file_get_contents("$data_dir/$filename");

if (isset($_GET['reset'])) { $reset = $_GET['reset']; } else { $reset = false; }
if (isset($_GET['increment'])) { $increment = $_GET['increment']; } else { $increment = false; }

if ($reset == 1) {
  $new_number = 1;
} else if ($increment == 1) {
  $new_number = $number + 1;
} else {
  $new_number = $number;
}

#write new number
$fp = fopen("$data_dir/$filename", 'w');
$result = fwrite($fp, $new_number);
fclose($fp);

header('Content-type: text/plain');
printf("%s", $new_number);
?>
