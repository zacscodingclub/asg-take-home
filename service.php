<?php
// Autoload Composer Packages
require 'vendor/autoload.php';

// Import packages and assign alias
use GuzzleHttp\Client as GuzzleClient;

// Set header for content type
header('Content-Type: application/json');

// URLs for the API
$metaDataUrl = 'http://nflarrest.com/api/v1/team';
$detailDataUrl = 'http://nflarrest.com/api/v1/team/topCrimes/';

// Setup finalObject
$finalObject = new stdClass();

// Standard Class for Response
$response = new stdClass();
$response->status = 200;
$response->data = false;

/**
*   Closure to get API data. Take the URL as an argument, will return false if
*   the request does not succeed.
*
*   @param string $requestUrl The Request URL for getting data from
*
*   @return object The response object json decoded
*/
$getData = function ($requestUrl) {
    // Instantiate Guzzle Client
    $client = new GuzzleClient();

    // Request API Data and catch request exceptions
    try {
        $apiResponse = $client->request('GET', $requestUrl);
    } catch (RequestException $e) {
        $apiResponse = false;
    }

    return $apiResponse;
};

// Get the list of the most crime active teams
$apiResponse = $getData($metaDataUrl);
if (!$apiResponse) {
    $response->status = 400;
    $response->data = false;
    echo json_encode($response);
}

// Setup data body the way we want it
$apiObject = json_decode((string) $apiResponse->getBody());

// Get team id for the team with the most crimes and to make the second API call
$finalObject->teamId = $apiObject[0]->Team;
$finalObject->teamCity = $apiObject[0]->Team_city;
$finalObject->teamName = $apiObject[0]->Team_name;

// Get the API response for the team details
$teamResponse = $getData($detailDataUrl . $finalObject->teamId);
if (!$teamResponse) {
    $response->status = 400;
    $response->data = false;
    echo json_encode($response);
}

// Populate response object with API response
$response->status = $teamResponse->getStatusCode();

// Setup data body the way we want it
$teamCrimeObject = json_decode((string) $teamResponse->getBody());
$finalObject->categories = array();
foreach ($teamCrimeObject as $crime) {
    $finalObject->categories[] = $crime;
}

$response->data = $finalObject;

echo json_encode($response);
