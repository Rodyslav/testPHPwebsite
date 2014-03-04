<?php
include 'config.php';
include 'opendb.php';
$sql = "SELECT id, name FROM upload";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
    $id = $row["id"];
    $name = $row["name"];
?>
<li><img src="/image.php?id=<?php echo $id; ?>" alt="<?php echo htmlEntities($name, ENT_QUOTES); ?>" /></li>
<?php
}
include 'closedb.php';
?>