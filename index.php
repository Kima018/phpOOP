<?php
require __DIR__ . '/vendor/autoload.php';

$maki = new \models\User();
$maki->setIme("Marijan");
echo $maki->getIme();
?>