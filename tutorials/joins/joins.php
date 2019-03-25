<?php

//$connURL = "mysql://stsulb7r3snsyzl0:uhlelh2pp52opjjs@nt71li6axbkq1q6a.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/xl2340e4qfnbs20j"

$connUrl = getenv('JAWSDB_MARIA_URL');
$hasConnUrl = !empty($connUrl);

$connParts = null;
if ($hasConnUrl) {
    $connParts = parse_url($connUrl);
}

//var_dump($hasConnUrl);
$host = $hasConnUrl ? $connParts['host'] : getenv('IP');
$dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
$username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
$password = $hasConnUrl ? $connParts['pass'] : '';

return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);





?>

