<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

$ambil = query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota Pembelian</title>
</head>

<body>
<h1>Nota Pembelian</h1>
<table border="1" cellpadding="10" cellspacing="0">
            <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Jumlah</th>
            <th>Subberat</th>
            <th>Subtotal</th>
            </tr>';

$no = 1;
foreach ($ambil as $pecah) {
    $html .= '<tr>
        <td>' . $no++ . '</td>
        <td>' . $pecah["nama"] . '</td>
        <td>' . number_format($pecah["harga"]) . '</td>
        <td>' . $pecah["berat"] . '</td>
        <td>' . $pecah["jumlah"] . '</td>
        <td>' . $pecah["subberat"] . '</td>
        <td>' . number_format($pecah["subharga"]) . '</td>
    </tr>';
}

$html .= ' </table>
            </body>
            </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('nota-sans-gaming.pdf', \Mpdf\Output\Destination::INLINE);
