<?php

include "../connection.php";

$sql = "SELECT * FROM countries";
$query = mysqli_query($c, $sql);

if (!$query) {
  // When query isn't executed successfully, then
  // we will handle that error to prevent the
  // app to break.
  echo json_encode([
    'countries' => [],
    'error' => true,
    'message' => "Can't resolve countries!"
  ]);

  die;
}

// Handling on successfull query below,
// Will return an object with countries

$countries = [];

while ($row = mysqli_fetch_assoc($query)) {
  $countries[] = [
    'id' => $row['id'],
    'name' => $row['name']
  ];
}

echo json_encode([
  "error" => false,
  "message" => "Success fetching countries data!",
  "countries" => $countries
]);

die;
