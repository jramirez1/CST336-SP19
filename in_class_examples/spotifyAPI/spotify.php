<?php

/*
curl    -X "GET" "https://api.spotify.com/v1/search?q=talk%20&type=track&market=US" 
        -H "Accept: application/json" 
        -H "Content-Type: application/json" 
        -H "Authorization: Bearer BQDa4-n0LgFx2bv45UjcwswqMrljblF3ANtsgbWl7XrNB5ftbwgcpoj-3eNz44KOwM6J0skdrEd7q26tksfwiDEtoijCvu4bv3vH_pwhc1rh1wLKj2PfvkdzwlczTGba8XX3vV-2TbzkhA9vIQxz0zELggJZ_iyJBw"
*/

// Set the API key for my test account
$apiKey = "BQDa4-n0LgFx2bv45UjcwswqMrljblF3ANtsgbWl7XrNB5ftbwgcpoj-3eNz44KOwM6J0skdrEd7q26tksfwiDEtoijCvu4bv3vH_pwhc1rh1wLKj2PfvkdzwlczTGba8XX3vV-2TbzkhA9vIQxz0zELggJZ_iyJBw";




//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/search?q=talk%20&type=track&market=US");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);


// Add headers to the HTTP command
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));



//step3
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);


// Convert the results to an associative array
$results = json_decode($results);


// Let's just get one of the items and echo the JSON for that only.
echo json_encode($results->tracks->items[0]);




?>

