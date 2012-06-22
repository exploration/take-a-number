<?php
$filename = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['resourceid']);
$data_dir = "assets/data";

#barf if no filename passed
if ($filename == null) { 
  header("HTTP/1.0 400 Bad Request"); 
  exit;
} else {
  $filename .= ".txt";
}

#create the file if necessary
system("/bin/test -e $data_dir/$filename || echo 0 > $data_dir/$filename");

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
fwrite($fp, $new_number);
fclose($fp);

header('Content-type: text/plain');
printf("%s", $new_number);
?>
