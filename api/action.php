<?php
  if('POST' === $_SERVER['REQUEST_METHOD']) {
    if($_POST["action"] == 'insert') {
      $form_data = array(
        'tytul' =>  $_POST['tytul'],
        'kategoria' =>  $_POST['kategoria'],
        'kwota' =>  $_POST['kwota'],
      );
      $api_url = "http://localhost/wallet/api/test_api.php?action=insert";
      $client = curl_init($api_url);
      curl_setopt($client, CURLOPT_POST, true);
      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($client);
      curl_close($client);
      $result = json_decode($response, true);
      foreach($result as $keys => $values) {
        if($result[$keys]['succes'] == '1') {
          echo 'dodano';
        } else {
          echo 'error';
        }
      }

    }
  }
?>