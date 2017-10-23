<?php
header('Content-Type: text/xml');

//this php script is executed based on a request from the client

//make a cURL request to the remote server

//make a curl resource
$ch = curl_init();

//set the url
curl_setopt($ch,CURLOPT_URL, 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topMovies/xml');

// Tell it to return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute
$resp = curl_exec($ch);

//use file_put_contents() to save XML string to a file
file_put_contents('target.txt', $resp);

//make XML string into SimpleXMLElement
$resp = new SimpleXMLElement($resp);

//use xpath to parse through the response

//make a bootstrap table in an XML object to send back to the client

//send the XML back to the client


//$output = [
//    'someKey' => 'someKeyValue',
//    'someOtherKey' => 'someOtherKeyValue',
//    'someArray' => [5,4,3,2,1]
//];

//$output = "<div><success>true</success><div>Hi there!</div></div>";

//$output = new SimpleXMLElement($output);

//print($output->asXML());

//print($resp)

print($resp->asXML());