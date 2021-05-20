<?php

include "../connection.php";

$stateId = $_GET['state_id'] ?? $_POST['state_id'] ?? null;
$sql = "SELECT id, name FROM cities WHERE state_id={$stateId}";

// When id is not provided, will response with
// this JSON object to prevent the app to
// break.
if (is_null($stateId)) {
  echo json_encode([
    'error' => true,
    'message' => "Can't resolve cities with id is equal to null",
    'cities' => [],
  ]);

  die;
}

$query = mysqli_query($c, $sql);

// Handling on unsuccessfull query, and will
// response with JSON object with message

if (!$query) {
  echo json_encode([
    'error' => true,
    'message' => "Can't resolve cities with state id: {$countryId}",
    'cities' => [],
  ]);

  die;
}

// Handling for successfully executed query
// Response with JSON object with cities

$cities = [];

while ($city = mysqli_fetch_assoc($query)) {
  $cities[] = [
    'id' => $city['id'],
    'name' => $city['name'],
  ];
}

echo json_encode([
  'error' => false,
  'message' => 'Success fetching states data!',
  'cities' => $cities
]);

die;
