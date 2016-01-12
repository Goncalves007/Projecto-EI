<?php 
App::import('Vendor','tcpdf/tcpdf'); 

//carrega o construtor do pdf
$Pdf = new TCPDF();

$Pdf->setPrintHeader(false);

$Pdf->setPrintFooter(false);

$Pdf->SetMargins(10, 20, 0);

$Pdf->AddPage('P','A4');

// Set some content to print
$html = <<<EOD
<p>Requisicao : <h4>$ref</h4></p>
<br>
<table>
<tr>
  <td>Office :</td>
  <td>$office</td>
</tr>
<tr>
  <td>Administration :</td>
  <td>$adminst</td>
</tr>
<tr>
  <td>Department :</td>
  <td>$dep</td>
</tr>
<tr>
  <td>Beneficiary :</td>
  <td>$benef</td>
</tr>
<tr>  
  <td>Amount :</td>
  <td>$amount</td>
</tr>
</table>
EOD;

$Pdf->writeHTML($html);

echo $Pdf->Output('etiqueta.pdf','I'); 