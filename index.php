<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <title>SARA</title>
      <meta charset="utf-8">
      <meta name="author" content="anon">
      <meta name="description" content="Phase: 3 Search Engine">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/animation.css">
      <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
      
    </head>
    <style>
    @media (max-width: 900px)
 	{ 
    body{overflow-y:hidden;}
    }
    body{overflow-y:hidden;}
        

    </style>
    
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: ##9bb67b;">
          <a class="navbar-brand" href="index.php">
          <img src="img/logow3.png" width="35" height="35">
          &nbsp; Bubble 6.0 &nbsp; <i class="fas fa-mug-hot"></i>
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
    
        <main role="main" class="container">
 	        <div class="jumbotron jumbotron-search">
                <h1 class="text-center titles"> Search!</h1>
                
                <form action="results.php" method="get" autocomplete="off">
		          
		            <div class="p-1 bg-light rounded rounded-pill shadow-lg mb-4">
		            <div class="input-group">
		              <input id="inputsearch" type="text" name="query" placeholder="Hey. Wanna find something?" class="form-control border-0 bg-light">
		             
		                <button id="button-addon1" type="submit" class="btn btn-link text-danger"><i class="fa fa-search"></i></button>
		           
			        </div>
			        </div>
		            
		          
		          <div class="text-center">					
						 <div class="pretty p-default p-curve p-thick p-smooth">
					        <input type="radio" name="checkOpt" value="case" />
					        <div class="state p-danger-o">
					            <label>Case-Insensitive</label>
					        </div>
					     </div>
					    
					     <div class="pretty p-default p-curve p-thick p-smooth">
					        <input type="radio" name="checkOpts" value="partial" />
					        <div class="state p-danger-o">
					            <label>Partial Word</label>
					        </div>
					    </div>       
				   </div>
				 
			
			    
			    <br>
            </div>
        <footer class="footer">
	      <div class="container spoofs">
	        <span class="text-muted">  <a class="navbar-brand" href="developers.php"> About the Developers.</a></span>
	      </div>
	    </footer>
		
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/10aea60dfb.js" crossorigin="anonymous"></script>
     </body>
</html>
