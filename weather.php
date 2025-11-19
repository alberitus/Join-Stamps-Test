<?php

$apiKey = "40d72cb6c8c959779a33b92ab2078af8";
$city   = "Jakarta";
$apiUrl = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=$apiKey&units=metric";

$response = file_get_contents($apiUrl);

if (!$response) {
    die("Failed to fetch weather data.");
}

$data = json_decode($response, true);

$middayForecasts = array_filter(
    $data["list"],
    fn($item) => str_contains($item["dt_txt"], "12:00:00")
);

$nextFiveDays = array_slice($middayForecasts, 0, 5);

$formatted = array_map(
    fn($item) =>
        date("D, d M Y", strtotime($item["dt_txt"])) .
        ": " . $item["main"]["temp"] . "°C",
    $nextFiveDays
);

echo "<pre>";
echo "Weather Forecast:\n\n";
echo implode("\n", $formatted);
echo "</pre>";

?>
