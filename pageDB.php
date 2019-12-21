<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <title>Search History & Stats</title>
      <meta charset="utf-8">
      <meta name="author" content="anon">
      <meta name="description" content="Phase: 3 Search Engine">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/animation.css">
      <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
      <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
      
    </head>
      <style> body{background:#f5f5f5;}
      li a {
          display: inline-block;
                               } </style>
    <body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #f5f5f5; border-bottom:2px solid #e5e5e5;">
          <a class="navbar-brand" href="index.php">
          <img src="img/logow3.png" width="35" height="35">
          &nbsp;Admin Mode
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
    	</header>
    	
		<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

        <main role="main" class="container">
 	        <div class="jumbotron jumbotron-result">
                <h1 class="text-center titlesindex"> Page Database</h1>
                <p class="text-center">Contains all the website indexed in our DB. Feel free to check it out.</p>
                
              <table class="table table-bordered" id="searchResults" data-pagination="true" data-toggle="table" data-search="true">
	            <thead>
						<th>Page ID</th>
	                    <th>URL</th>
	                    <th>Time to Index</th>
	            </thead>
	            
	            <tbody>	                
	            </tbody>
	            
	            </table>
            </div>

        </main>


	    <footer class="footer">
	      <div class="container">
	        <span class="text-muted">  <a class="navbar-brand" href="developers.php"> About the Developers.</a></span>
	      </div>
	    </footer>


		<script type="text/javascript">
		    window.onload = (function(){
		        $.ajax({
		            url:"php/getPageResults.php",
		            method: "GET",
		            success: function(data){
		                var response= jQuery.parseJSON(data);
		                table = document.getElementById("searchResults");
		                var data = "";
		                for(var i=0; i<response.length; i++){
			                        data += '<tr>';
			                        data += '<td> <p>' + response[i]["pageId"] +'</p> </td>';
			                        data += '<td> <p><a href="'+response[i]["url"]+'">'+ response[i]["url"]+'</a></p> </td>';
			                        data += '<td> <p>' + response[i]["timeToIndex"] +'</p> </td>';
			                        data +='</tr>';
			                }
		                $("#searchResults").append(data);
		            }
		        })
		    })

		</script>
		<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/10aea60dfb.js" crossorigin="anonymous"></script>
        <script src="js/main.js" crossorigin="anonymous"></script>
     </body>
</html>
