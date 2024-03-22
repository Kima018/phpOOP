<?php
require __DIR__ . '/vendor/autoload.php';
include 'partials/header.php';
?>
<h1 class="text-red-500"> Maki </h1>
<?php
$maki = new \models\User();
$maki->setIme("Marijan");
echo $maki->getIme();
?>

<?php
include 'partials/footer.php';
?>
