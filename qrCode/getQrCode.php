<?php

header('Content-Type:image/png');

require_once 'src/QrCode.php';

use Endroid\QrCode\QrCode;

//Queries the Endroid library and drills down to QRCode class to generate QRCode image
$qr =  new Endroid\QrCode\QrCode();


//
$qr->setText ("https://fuckgithub-donwhelan.c9users.io/events.php?testtoken");
$qr->setSize(200);
$qr->setPadding(10);

$qr->render();

?>