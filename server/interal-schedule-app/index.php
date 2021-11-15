<?php

# Create an app that let's users download their schedule files from a local 'schedules' directory.
# The app should have a nice graphical interface showing the available schedules. 


# The interface should have a button for downloading the schedule. 
# List of schedules available in the schedules directory should be shown and allow the user to chose a schedule to download


# The app should be runnable on a server, and should work with a local file as well. 
# The app should not use any external libraries. 
# The app should not use any database. 

$dir = 'schedules';
$files = scandir($dir);
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'download') {
    $file = $_GET['file'];
    if (file_exists($dir.'/'.$file)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.$file.'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($dir.'/'.$file));
      readfile($dir.'/'.$file);
      exit;
    }
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Downloader</title>
</head>
<body>
  <h1>Downloader</h1>
<img src="https://i.imgur.com/hly6ap7.png" />
  <hr>
  <hr>
  <h2>Available schedules</h2>
<table>
<?php
// Display the schedules in a table

for ($i = 0; $i < count($files); $i++) {
  if ($files[$i] != '.' && $files[$i] != '..') {
    $name_without_extension = explode('.', $files[$i])[0];
    echo '<tr><td><a href="?action=download&file='.$files[$i].'">'.$name_without_extension.'</a></td></tr>';
  }
}
?>
</table>


<!-- create a material design style for all elements on the page -->
<style>
* {
  box-sizing: border-box;
}

html, body {
  height: 100%;
  background-color: #eee;
}

body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

div {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
}

a {
  color: #000;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}


/*
 * Add styles for the button
 */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

/*
 * Add styles for the input
 */
input[type=text] {
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
}

.textbox {
  border: none;
  width: 100%;
  font-size: 16px;
  padding: 16px 20px;
  border-radius: 10px;
  opacity: 0.8;
  transition: 0.5s;
}

.textbox:focus {
  opacity: 1;
  background-color: #ddd;
  color: #000;
}

/*
 * Add styles for the table
 */
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</body>
</html>

