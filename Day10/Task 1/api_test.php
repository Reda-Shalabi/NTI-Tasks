<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $data = [
      "data" => [["message" => "Wrong Try To Get Data"]],
      "connection" => false,
      "message" => "wrong domain"
    ];
    echo json_encode($data);
  } else {
    $d = [
      "data" => [
        [
          "name" => "Jhon",
          "age" => 30,
          "city" => "New York"
        ],
        [
          "name" => "reda",
          "age" => 21,
          "city" => "Egypt"
        ]
      ],
      "connection" => true,
      "message" => "Data Retrieved Successfully"
    ];
    echo json_encode($d); 
  }
?>