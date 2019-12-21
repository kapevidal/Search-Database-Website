<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Search Engine</title>
      <meta charset="utf-8">
      <meta name="author" content="anon">
      <meta name="description" content="CS355 Phase 3 Search Engine">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/animation.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
      <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
      <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    </head>
    <style> body{background:#f5f5f5;}
    
    .searchrelocate {
		  margin: 2% 0;
		  text-align: center; 
		  font-family: 'Staatliches', cursive !important; 
		
		}
    @media (max-width: 900px)
    {
    	.boop
    	{
    	margin-top:-25px;
    	margin-left:200px;
    		width:60%;
     	}	
    
    }
    
    </style>
    
    <body>
        
         <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #f5f5f5; border-bottom:2px solid #e5e5e5;">
            <a class="navbar-brand" href="index.php">
          <img src="img/logow3.png" width="35" height="35">
          &nbsp; Here's the results:
          </a> 
          <button class="navbar-toggler navbar-toggler-left collapsed" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span> </span>
            <span> </span>
            <span> </span>		
          </button>
          
	      <div class="collapse navbar-collapse" id="collapsingNavbar">
	            <ul class="nav navbar-nav ml-auto">
	            
	              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  ADMIN
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="indexer.php">Database Indexer</a>
                <a class="dropdown-item" href="searchHistory.php">History & Stats</a>
                <a class="dropdown-item" href="pageDB.php">Page DB</a>

                </div>
              </li>           
	            </ul>
	          </div>
        </nav>
    
    <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    
        <main role="main" class="container">
 	        <div class="jumbotron jumbotron-result">
          		<br>
                <p><a href="index.php" style="color: #444444;"> <i class="fas fa-chevron-left"></i>BACK <a></p>
                
                
                
                
   				<form id="searchbar" action="" method="get">
   				
   				    <div class="p-1 bg-light rounded rounded-pill shadow- mb-3">
		            <div class="input-group">
		              <input id="inputsearch" type="text" name="query" placeholder="Hi. Looking for something?" class="form-control border-0 bg-light" value="<?php if(isset($_GET['query'])) echo $_GET['query']; ?>">
		                <button id="button-addon1" type="submit" class="btn btn-link text-danger"><i class="fa fa-search"></i></button>
		      
		            </div>
		          </div>
		            
		          	
		          		<div class="selector2">
					          
					<div class="row">
		 			 <div class="col-sm text-left">
			          <button id="slct" onclick="selectAll()" value='click1' type='button' class='btn btn-danger btn-sm'><i class="fas fa-check-double"></i>&nbsp;Select All</button>&nbsp;
					  <button id="dslct" onclick="deselectAll()" type='button' value='click2' class='btn btn-secondary btn-sm'><i class="fas fa-times"></i>&nbsp;Deselect All</button>
					</div>
                					
					
					 <div class="col-sm text-right boop">
						 <div class=" pretty p-default p-curve p-thick p-smooth">
					        <input type="checkbox" name="checkOpt" value="case"  <?php if (isset($_GET['checkOpt']) && $_GET['checkOpt'] == 'case')  echo ' checked="checked"';?>>
					        <div class="state p-danger-o">
					            <label id="lbl1">Case-Insensitive</label>
					        </div>
					    </div>
					    
					     <div class="pretty p-default p-curve p-thick p-smooth">
					        <input type="checkbox" name="checkOpts" value="partial" <?php if (isset($_GET['checkOpts']) && $_GET['checkOpts'] == 'partial')  echo ' checked="checked"';?>>
					        <div class="state p-danger-o">
					            <label id="lbl2">Partial Word</label>
					        </div>
					    </div>
				      </div>
			            </div>
			         </div>
			         
          		</form>	
        <div class="results">
        <h2><br>Here's the result: </h2>
      
        <?php
          require 'php/connection.php';

          if(isset($_GET['query'])) {
            $query = $_GET['query'];
          $start = microtime(true);
 		  $number = 0;
          $results = array();
          if(isset($_GET['checkOpt']) || isset($_GET['checkOpts'])) {
          	$checkOpt = $_GET['checkOpt'];
          	$checkOpts = $_GET['checkOpts'];
          	
	          if($_GET['checkOpt'] == 'case' && $_GET['checkOpts'] != 'partial'){
	           $sql = $conn->query("SELECT page.url, page.title, page.description, page_word.freq
                FROM page, word, page_word
                WHERE page.pageId = page_word.pageId
                AND word.wordId = page_word.wordId
                AND UPPER(word.wordName) = UPPER('$query')
                GROUP BY url
                ORDER BY freq");
	             }
             
	            else if($_GET['checkOpts'] == 'partial' && $_GET['checkOpt'] != 'case'){
	           $sql = $conn->query("SELECT page.url, page.title, page.description, page_word.freq
                FROM page, word, page_word
                WHERE page.pageId = page_word.pageId
                AND word.wordId = page_word.wordId
                AND word.wordName LIKE '%$query%'
                GROUP BY url
                ORDER BY freq");
	             }
	              else if($_GET['checkOpt'] == 'case' && $_GET['checkOpts'] == 'partial'){
	           $sql = $conn->query("SELECT page.url, page.title, page.description, page_word.freq
	                FROM page, word, page_word
	                WHERE page.pageId = page_word.pageId
	                AND word.wordId = page_word.wordId
	                AND MATCH(word.wordName) AGAINST( '$query' IN NATURAL LANGUAGE MODE)
	                OR word.wordName LIKE '%$query%'
	                GROUP BY url
	                ORDER BY freq");
     
	             }    
             }
             else
             {
             $sql = $conn->query("SELECT page.url, page.title, page.description, page_word.freq
                FROM page, word, page_word
                WHERE page.pageId = page_word.pageId
                AND word.wordId = page_word.wordId
                AND UPPER(word.wordName) = UPPER('$query')
                GROUP BY url
                ORDER BY freq");
	         }

			             
	              if ($sql->num_rows > 0)
	              {
	              while($row = $sql->fetch_assoc()) {
	               ++$count;
	                echo "\n<div class=result>\n<input type='checkbox'><a href='" . $row["url"] . "'>" . $row["title"] . "</a>";
	                echo "\n<p class='url'>" . $row["url"] . "</p>\n";
	                echo "<p class='desc'>" . $row["description"] . "</p>\n<br>\n</div>\n";
	                
	              }
	              echo "<h2> $count results in total.. </h2>";
	  			}
  			
				 else {
				    echo "<p>0 results</p>";
				}
			

      
            $finish = microtime(true) - $start;
			$datedate = '"' . date("Y-m-d") . '"';
            $sql = "INSERT INTO `search` (terms, count,  searchDate, timeToSearch) VALUES ('$query',  '$count',$datedate,  $finish)";
            mysqli_query($conn, $sql);
          }
        ?>
      
  
     		</div>
     		 <div class="download">
	  	    	<div class="float-right">
		          	  <form id="download-form" class="form-inline" method="post" onsubmit="return downlow()" role="form"> 
			          	
			          <div class="form-group">	
			          	<label class="my-1 mr-2" for="inlineform">File Format:</label>
	                    <select class="custom-select my-1 mr-sm-2 form-control" id="inlineform" required="required" data-error="File Type not specified.">
					    <option value=""></option>
					    <option value="1">CSV</option>
					    <option value="2">JSON</option>
					    <option value="3">XML</option>
					    </select>  
					    <div class="help-block with-errors"></div>
		          	   </div>
		          	   
		          	   <div class="form-group">
		          	    <label for="form_name">File Name:</label>
	                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter File Name*" required="required" data-error="File name required.">
	                    <div class="help-block with-errors"></div>
	                     &nbsp;
	                    <input type="submit" class="btn btn-danger btn-send" value="Download"> 
	      		  
	                   </div>
	                  	
	      		      
                       </form> 
                       
               
                     </div>	     
                  </div>
            </div>
            
       
          		  <div class="searchrelocate">
          		  	<h2>Shortcuts:</h2>
			      <form action="pageDB.php" class="boxbtnform">
			        <button type="submit" class="boxbtns">
			          <span class="btnname">Database</span>
			          <p>Check our URL database.</p>
			        </button>
			      </form>
			      
			      <form action="searchHistory.php" class="boxbtnform">
			        <button type="submit" class="boxbtns">
			          <span class="btnname"> History & Stats</span>
			          <p>Check all the search queries.</p>
			        </button>
			      </form>
			      
			      <form action="indexer.php" class="boxbtnform">
			        <button type="submit" class="boxbtns">
			          <span class="btnname">ADD <i class="fas fa-plus-square"></i></span>
			          <p>Can't find it? Add it in our database! &#x1F44C;</p>
			        </button>
			      </form>
			  </div>
			    
			       <footer class="footer">
	      <div class="container">
	        <span class="text-muted">  <a class="navbar-brand" href="developers.php"> About the Developers.</a></span>
	      </div>
	    </footer>
            
			    
			    
			    </div>
            </div>
        </main>
        <script>
		        
		function selectAll(){
		    var results = document.getElementsByClassName("results")[0];
		    var indivResults = results.children;
		    for (var i = 1; i < indivResults.length-1; i++)
		    
		    {	if(i==1)
				{indivResults[1].children[0].children[0].checked=true;
				}
				else{indivResults[i].children[0].checked=true;}
		    }
		    }
		function deselectAll(){
		    var results = document.getElementsByClassName("results")[0];
		    var indivResults = results.children;
		    for (var i = 1; i < indivResults.length-1; i++)
		    
		    {	if(i==1)
				{indivResults[1].children[0].children[0].checked = false;
				}
				else{indivResults[i].children[0].checked = false;}
		    }	
		    
		    	    
		function downlow() {
		         selectElement = document.querySelector('#inlineform'); 
		                      
		            output = selectElement.options[selectElement.selectedIndex].value;
		            if(output=='0')
		            {
		            alert(" Broken!!");
		            }
		            else if(output=='1')
		            {
		            writeCSV();
		            }
		            else if(output=='2')
		            {
		            writeJSON();
		            }
		            else if(output=='3')
		            {
		            writeXML();
		            }
		   
		    }	 
		    
			function writeJSON() {
		    var resultsObject = {"Result" : []};
		    var fileName = document.getElementById("form_name").value;
		    var name = fileName + ".json";
		    var results = document.getElementsByClassName("result")[0];
		    var indRes = results.children;
		    for (var i = 0; i < indRes.length; i++)
		    {
		    if(i==1){
		    if (indRes[1].children[0].children[0].checked=true) {
			    var title = indRes[1].children[1].innerHTML;
			    var url =   indRes[i].children[2].innerHTML;
			    var description = indRes[i].children[3].innerHTML;
			    var result = {"title": title, "url":url, "description":description};
			    resultsObject["Result"].push(result);
			}}
		    
			else{
			if (indRes[i].children[0].checked=true) {
			    var title = indRes[i].children[1].innerHTML;
			    var url =   indRes[i].children[2].innerHTML;
			    var description = indRes[i].children[3].innerHTML;
			    var result = {"title": title, "url":url, "description":description};
			    resultsObject["Result"].push(result);
			}
		    }
		    }
		    download(JSON.stringify(resultsObject), name, 'text/plain');
		}   
		    
		}


		function download(text, name, type) {
		    var a = document.createElement('a');
		    var file = new Blob([text], {type: type});
		    a.href = URL.createObjectURL(file);
		    a.download = name;
		    a.click();
		
		} 
		
		if (navigator.userAgent.match(/Mobile/)) {
		document.getElementById('slct').innerHTML = '<i class="fas fa-check-double"></i>';
		}
		
		if (navigator.userAgent.match(/Mobile/)) {
		document.getElementById('dslct').innerHTML = '<i class="fas fa-times"></i>';
		}
		
		if (navigator.userAgent.match(/Mobile/)) {
		document.getElementById('lbl1').innerHTML = 'Case';
		}
		
		if (navigator.userAgent.match(/Mobile/)) {
		document.getElementById('lbl2').innerHTML = 'Part';
		}
		
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/10aea60dfb.js" crossorigin="anonymous"></script>
        <script src="js/download.js"></script>
        <script src="js/main.js" crossorigin="anonymous"></script>
    </body>
</html>
