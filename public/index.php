<?php

$resource_id = $_GET['resourceid'];
if ($resource_id == null) { 
  $resource_id = time();
  header("Location: $resource_id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Take a Number</title>
  <meta name="author" content="Donald L. Merand">
  <meta name="description" content="Get a number counter, like at the RMV">
  <meta name="keywords" content="RMV, Number, Counter">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">
  <link href='http://fonts.googleapis.com/css?family=Lato:100italic,400,900' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="top">
    <div id="number"></div>
  </div>
  <div id="bottom">
    <div id="advance">ADVANCE</div>
    <div id="reset">RESET</div>
  </div>
  <div id="resource-id" data-resource-id="<?php print $resource_id; ?>">
    Share this counter:
    <br> 
    <?php print "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="assets/scripts/jquery-ui-1.8.21.custom.min.js"></script>
  <script src="assets/scripts/takeanumber.js"></script>
</body>
</html>
