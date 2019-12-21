<?php

function getResults($terms)
{
	require 'connection.php';
    
    $sql = "SELECT * FROM search Order by searchDate Desc";
    $result = mysqli_query($conn, $sql);

	    $results = array();
    if($result->num_rows > 0) {
        while($r = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $results[] = $r;
        }
    }

    print json_encode($results);
    $conn -> close();
}

getResults();
?>