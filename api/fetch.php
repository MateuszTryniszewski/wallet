<?php
$api_url = "http://localhost/wallet/api/test_api.php?action=fetch_all";
$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);
$output = '';

if(count($result) > 0) {
  foreach($result as $item) {
    $output .= '
    <tr class="row">
    <td>'. $item->data. '</td>
    <td>'. $item->tytul. '</td>
    <td>'. $item->kategoria. '</td>
    <td>'. $item->kwota. '</td>
  </tr> ';
  }
} else {
  $output .= '<p style="text-align: center;">Brak danych</p>';
}

echo $output

?>