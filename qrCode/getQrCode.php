<?php

header('Content-Type:image/png');

//Inherits the QRCode.php files and contents for reference
require_once 'src/QrCode.php';

//Queries the Endroid library and drills down to QRCode class to generate QRCode image
use Endroid\QrCode\QrCode;
$qr =  new Endroid\QrCode\QrCode();


//Sets the static text to form the QR Code, the size of the outputed image
$qr->setText ("https://google.com?testtoken");
$qr->setSize(200);
$qr->setPadding(10);

//Renders the QR Code as a png image rather than code
$qr->render();

?>