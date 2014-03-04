<?php
include 'config.php';
include 'opendb.php';

$id = (int)$_GET['id'];
if (empty($id)) die('Error');

$sql = "SELECT name, type, size, content FROM upload WHERE id = $id";
$result = mysql_query($sql);

if (!$result || mysql_num_rows($result) == 0) {
	header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    include 'closedb.php';
    exit();
}

$row = mysql_fetch_assoc($result);

//$fileName = $row["name"];
$contentType = $row["type"];
$contentSize = $row["size"];
$content = $row["content"];

header('Content-Type: ' . $contentType);
header('Content-Length: ' . $contentSize);

echo $content;
include 'closedb.php';
exit();