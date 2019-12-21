<?php

function crawl_page($url)
{
    require 'php/connection.php';
 	$safe_url = mysqli_real_escape_string($conn, $url);
    $starttime = microtime(true);

    $dom = new DOMDocument();
    @$dom->loadHTMLFile($url);

    $anchors = $dom->getElementsByTagName('a');
    $nodes = $dom->getElementsByTagName('title');
    $ps = $dom->getElementsByTagName('p');
    $title = strval($nodes->item(0)->nodeValue);

	  
	$tags = get_meta_tags($url);
    $description = $tags['description'];

    $metas = $dom->getElementsByTagName('meta');
  
	
	
	$curl = curl_init("$url");


	curl_setopt($curl, CURLOPT_NOBODY, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FILETIME, true);
	
	$result = curl_exec($curl);
	
	if ($result === false) {
	    die (curl_error($curl)); 
	}

	$lastModified;
	$timestamp = curl_getinfo($curl, CURLINFO_FILETIME);
	if ($timestamp != -1) { //otherwise unknown
	    $lastModified= date("Y-m-d H:i:s", $timestamp); //etc
	} 
	
	$datedate = '"' . date("Y-m-d") . '"';
    //Index page

    $result = $conn->query("SELECT pageId FROM page WHERE url = '$safe_url'");
    if($result->num_rows == 0) {       
            $insertPage = "INSERT INTO page (url, title, description, lastModified, lastIndexed, timeToIndex)
            VALUES ('$safe_url', '$title', '$description', '$lastModified', $datedate,0)";
        mysqli_query($conn, $insertPage);
        

        $pageQuery = $conn->query("SELECT pageId FROM page WHERE url = '$safe_url'");
        $pageRow = $pageQuery->fetch_assoc();
        $pageId = $pageRow["pageId"];
        foreach($ps as $element){
            $text = $element->textContent;
            if(trim($text) != ""){
                $words = explode(" ", $text);
                foreach($words as $word){
                    if(trim($word) != ""){
                        $word = '"' . $word . '"';
                        $wordResult = $conn->query("SELECT wordId FROM word WHERE wordName = $word");
                        if($wordResult->num_rows == 0) {
                            $insertWord = "INSERT INTO word (wordName)
                                VALUES ($word)";
                            mysqli_query($conn, $insertWord);
                        }
                        // pageword part
                        // Get the word id for comparison
                        $wordQuery = $conn->query("SELECT wordId FROM word WHERE wordName = $word");
                        if($wordQuery->num_rows == 0) {
                            //Word isn't in table, something is wrong with escaped char
                        }
                        else {
                            $wordRow = $wordQuery->fetch_assoc();
                            $wordId = $wordRow["wordId"];
                            // Query for page word
                            $pageWordResult = $conn->query(
                                    "SELECT pageId, wordId  FROM page_word 
                                    WHERE pageId = '$pageId' AND wordId = '$wordId'");
                            // If not in table yet, add
                            if($pageWordResult->num_rows == 0){
                                $insertPageWord = "INSERT INTO page_word (pageId, wordId, freq)
                                    VALUES ('$pageId','$wordId', 1)";
                            }
                            //else is in table, incr
                            else {
                                $insertPageWord = "UPDATE page_word
                                    SET freq = freq + 1
                                    WHERE pageId = '$pageId' AND wordId = '$wordId'";
                            }
                            mysqli_query($conn, $insertPageWord);
                        }  
                    }
                }
            }
        }
		 $endtime = microtime(true);
		        $loadtime = $endtime - $starttime;
		        
		        
		        $updatePage = "UPDATE page
		            SET timeToIndex = $loadtime
		            WHERE url = '$safe_url'";
		        mysqli_query($conn, $updatePage);
    }
    else {
        
        $endtime = microtime(true);
        $loadtime = $endtime - $starttime;
        
        
        $updatePage = "UPDATE page
            SET timeToIndex = $loadtime
            WHERE url = '$safe_url'";
        mysqli_query($conn, $updatePage);
    }

    $conn -> close();
}


crawl_page($_POST['url']);
echo "Indexed ",$_POST['url'];

