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
$resp_xml = new SimpleXMLElement($resp);

//use xpath to parse through the response
//build an output object, just with the data I want, with relevant bootstrap classes on each

//made an 'empty' SimpleXMLElement
$output_xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><mydoc></mydoc>');

//$output_xml->addChild('h3','test-content');

//$example_table = '<thead>
//      <tr>
//        <th>Firstname</th>
//        <th>Lastname</th>
//        <th>Email</th>
//      </tr>
//    </thead>
//    <tbody>
//      <tr>
//        <td>John</td>
//        <td>Doe</td>
//        <td>john@example.com</td>
//      </tr>
//      <tr>
//        <td>Mary</td>
//        <td>Moe</td>
//        <td>mary@example.com</td>
//      </tr>
//      <tr>
//        <td>July</td>
//        <td>Dooley</td>
//        <td>july@example.com</td>
//      </tr>
//    </tbody>';

//set up the parent table
$the_table = $output_xml->addChild('table');
$the_table->addAttribute('class', 'table');

//set up the head of the table
$thead = $the_table->addChild('thead');
$tr = $thead->addChild('tr');
$tr->addChild('th', 'Title');
$tr->addChild('th', 'Director');
$tr->addChild('th', 'Price');

//set up the body of the table
$table_body = $the_table->addChild('tbody');

//populate the body of the table

//TODO: find out why xpath does not work as advertised!
//foreach ($resp_xml->xpath('/feed/entry') as $entry) {
//    $table_body->addChild('loop');
//
//    $row = $table_body->addChild('tr');
//
//    //find this particular movie's info
//    $movie_name = $entry->name;
//    $movie_director = $entry->artist;
//    $movie_price = $entry->price;
//
//    $row->addChild('td', "$movie_name");
//    $row->addChild('td', "$movie_director");
//    $row->addChild('td', "$movie_price");
//
//}

////populate the body of the table
foreach ($resp_xml->xpath('//im:name') as $name) {
    $row = $table_body->addChild('tr');

    $row->addChild('td', "$name");

    $row->addChild('td', 'no director yet');
    $row->addChild('td', 'no price yet');
}

//foreach ($resp_xml->xpath('//im:artist') as $artist) {
//    $row = $table_body->addChild('tr');
//
//    $row->addChild('td', "$artist");
//}



////populate the body of the table
//TODO: this use of a for each loop with xpath is supposed to work!
//$entries = $resp_xml->xpath('//entry');
//foreach ($entries as $movie){
//    $row = $table_body->addChild('tr');
//}

//don't need - the table is already in the output xml!
//$output_xml->addChild('table', $the_table);

//send the XML back to the client
print($output_xml->asXML());

//$output = "<div><success>true</success><div>Hi there!</div></div>";

//$output = new SimpleXMLElement($output);

//print($output->asXML());

//print($resp)

//print($resp->asXML());