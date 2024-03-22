<?php
require __DIR__ . '/vendor/autoload.php';
include 'partials/header.php';
?>

<?php
$maki = new \models\User();
$maki->setIme("Marijan");
$maki->setPassword('maki123test');
//var_dump($maki);
echo $maki->getPass(). "</br>";

?>

<?php
include 'partials/footer.php';
?>
