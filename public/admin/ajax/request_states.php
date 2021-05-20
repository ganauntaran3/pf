<?php

include "../connection.php";

$countryId = $_GET['country_id'] ?? $_POST['country_id'] ?? null;
$sql = "SELECT id, name FROM states WHERE country_id={$countryId}";

// When id is not provided, will response with
// this JSON object to prevent the app to
// break.

if (is_null($countryId)) {
  echo json_encode([
    'error' => true,
    'message' => "Can't resolve states with id is equal to null",
    'states' => [],
  ]);

  die;
}

$query = mysqli_query($c, $sql);

// Handling when the query is not executed properly
// Response with json object including the message

if (!$query) {
  echo json_encode([
    'error' => true,
    'message' => "Can't resolve states with country id: {$countryId}",
    'states' => [],
  ]);

  die;
}

// Handling on successfull query below,
// Will return an object with countries

$states = [];

while ($state = mysqli_fetch_assoc($query)) {
  $states[] = [
    'id' => $state['id'],
    'name' => $state['name'],
  ];
}

echo json_encode([
  'error' => false,
  'message' => 'Success fetching states data!',
  'states' => $states
]);

die;
