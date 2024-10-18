<?php
// Function to fetch a random joke
function fetchJoke() {
    $url = "https://v2.jokeapi.dev/joke/Any";
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        return "Error fetching joke.";
    }
    
    return json_decode($response, true);
}

$jokeData = fetchJoke();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Joke App</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .joke { font-size: 24px; margin: 20px 0; }
        button { padding: 10px 20px; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Random Joke</h1>
    <div class="joke">
        <?php
        if ($jokeData['type'] == 'single') {
            echo $jokeData['joke'];
        } else {
            echo $jokeData['setup'] . "<br>" . $jokeData['delivery'];
        }
        ?>
    </div>
    <form method="post">
        <button type="submit">Get Another Joke</button>
    </form>
</body>
</html>
