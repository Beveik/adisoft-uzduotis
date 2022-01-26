<?php
require_once("connection.php");

$webmaster_email = "slepikaite.migle@gmail.com";

$index_page = "index.html";
$error_page = "error.html";
$thankyou_page = "thank_you.html";

$pastas = $_REQUEST['pastas'];
$vardas = $_REQUEST['vardas'];
$numeris = $_REQUEST['numeris'];
$veisle = $_REQUEST['veisle'];
$svoris = $_REQUEST['svoris'];
$amzius = $_REQUEST['amzius'];
$spalva = $_REQUEST['spalva'];
$pozymiai = $_REQUEST['pozymiai'];


$msg =
    "vardas: " . $vardas . "<br>" .
    "El. paštas: " . $pastas . "<br>" .
    "Tel. numeris: " . $numeris . "<br>" .
    "Veislė: " . $veisle . ", Svoris: " . $svoris . "<br>" .
    "Amžius: " . $amzius . ", Spalva: " . $spalva . "<br>" .
    "Požymiai: " . $pozymiai;

if (!empty($pastas)) {
    $pastas = trim(htmlspecialchars($_POST['pastas']));
    $pastas = filter_var($pastas, FILTER_VALIDATE_EMAIL);

    if ($pastas === false) {
        header("Location: $error_page");
    }
}

if (empty($vardas) || empty($pastas) || empty($numeris) || empty($veisle)  || empty($svoris) || empty($amzius)  || empty($spalva)  || empty($pozymiai)) {
    header("Location: $error_page");
} else {
    $sql = "INSERT INTO `anketa`( `vardas`, `pastas`, `numeris`, `veisle`, `svoris`, `amzius`, `spalva`, `pozymiai`) VALUES ('$vardas', '$pastas', '$numeris', '$veisle', '$svoris', '$amzius', '$spalva', '$pozymiai')";

    if (mysqli_query($conn, $sql)) {

        mail("$webmaster_email", "Užklausa", $msg);
        // echo $msg ;
        header("Location: $thankyou_page");
    }
}
