<?php
header('Content-Type: text/xml');

//this php script is executed based on a request from the client

//make a cURL request to the remote server

//turn data from JSON into XML (just to simulate if the data came back as XML in the first place)
//JSON decode into an associative array
//make into XML string
//use file_put_contents() to save XML string

//make XML string into SimpleXMLElement


//make a bootstrap table in an XML object to send back to the client

//send the XML back to the client


//$output = [
//    'someKey' => 'someKeyValue',
//    'someOtherKey' => 'someOtherKeyValue',
//    'someArray' => [5,4,3,2,1]
//];

$output = "<div><success>true</success><div>Hi there!</div></div>";

$output = new SimpleXMLElement($output);

print($output->asXML());