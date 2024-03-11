<?php

/**
 * InIndia Cloud Places API Client - PHP Version for Indian States
 *
 * A simple PHP client for interacting with the InIndia Cloud Places API to get a list of states within India.
 * Free to use for public with proper attribution.
 *
 * Please note:
 * - This script is designed for free public use and may have limitations.
 * - For countries other than India, an API key may be required, which can be obtained from ooltah.com.
 *
 * @author ININDIA
 * @license MIT License
 * @link https://github.com/inindia-cloud/inindia-cloud-places-api-client
 */

// API endpoint URL for Indian States
$indiaStatesUrl = "https://api.inindia.cloud/api/public/places/India/";

// Function to make a GET request and decode JSON response
function fetchData($url) {
    $response = file_get_contents($url);

    if ($response === false) {
        // Handle the case where the request failed
        die("Failed to fetch data from the API.");
    }

    $jsonData = json_decode($response, true);

    if ($jsonData === null) {
        // Handle JSON decoding errors
        die("Failed to decode JSON response.");
    }

    return $jsonData;
}

// Get a list of all states within India
$indiaStatesData = fetchData($indiaStatesUrl);

if ($indiaStatesData) {
    // Check for 404 response (No states available for India)
    if (isset($indiaStatesData['message']) && $indiaStatesData['message'] === "No states available for India") {
        echo "No states available for India.";
    } else {
        // Display the list of states within India
        foreach ($indiaStatesData as $state) {
            if (isset($state['State'])) {
                echo "State: " . $state['State'] . "<br>";
            }
        }
    }
} else {
    echo "Failed to fetch India states data.";
}
