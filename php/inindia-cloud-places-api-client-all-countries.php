<?php

/**
 * InIndia Cloud Places API Client - PHP Version
 *
 * A simple PHP client for interacting with the InIndia Cloud Places API.
 * Free to use for public with proper attribution.
 *
 * @author ININDIA
 * @license MIT License
 * @link https://github.com/inindia-cloud/inindia-cloud-places-api-client
 */

// API endpoint URL
$countriesUrl = "https://api.inindia.cloud/api/public/places";

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

// Get a list of all countries
$countriesData = fetchData($countriesUrl);

if ($countriesData) {
    // Display the list of country code and name
    foreach ($countriesData as $country) {
        $countryCode = isset($country['CountryCode']) ? $country['CountryCode'] : "N/A";
        $countryName = isset($country['CountryName']) ? $country['CountryName'] : "N/A";
        echo "Country Code: " . $countryCode . ", Country Name: " . $countryName . "<br>";
    }
} else {
    echo "Failed to fetch countries data.";
}