<?php
 include "db.php";
require "vendor/autoload.php";
$result = $conn->query("select * from users");
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->setFont('times', 'B', '12');
$html = '<table border="1" cellpadding="5">
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
<td>phone</td>
<td>City</td>
</tr>
';
while ($row = $result->fetch_assoc()) {
    $html .= '
    <tr>
<td>' . $row['id'] . '</td>
<td>' . $row["name"] . '</td>
<td>' . $row["email"] . '</td>
<td>' . $row["phone"] . '</td>
<td>' . $row["city"] . '</td>
</tr>
';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('users.pdf', 'D');


?>