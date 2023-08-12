<h1> 자 이것이 백엔드 팀의 힘이다</h1>  
<h2>client 테이블이다</h2> 

<ul> 
<?php
foreach ($clients as $client) {
    echo "<li>";
    $decodedClient = json_decode('"' . $client->client_name . '"');
    echo $decodedClient;
    echo "</li>";
}

    //  foreach ($clients as $client) {
    //      echo "<li>";
    //      //echo $client->BIN . " - " . $client->client_name;
    //      echo $client;
    //      echo "</li>";
    //  }
     ?>
