<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <title>Indexer</title>
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
      <style> body{background:#f5f5f5; overflow-y:hidden;}</style>
    <body>
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
        
        <main role="main" class="container">
 	        <div class="jumbotron jumbotron-index">
                <h1 class="text-center titlesindex"> Indexer</h1>
                <p class="text-center">Users can type/paste a URL to be indexed, passing it to our Indexing Engine <br> and (re-)index it in our database.</p>
                
                				<div id="le-alert" class="alert alert-danger alert-block text-center fade show">
	      		        <button type="button" class="close">
	      		        &times;</button>"Success.. Thank you for trying out or Indexing Engine. =)"
	      		        </div>
                
                <form id="webcrawl" method="post" enctype="multipart/form-data"> 
		            <div class="p-1 bg-light rounded rounded-pill shadow-lg mb-4">
		            <div class="input-group">
		              <input id="url" type="url" placeholder="Please enter a Valid URL here." class="form-control border-0 bg-light">  
		                <button id="button-addon1" name="submit" type="submit" class="btn btn-link text-danger"><i class="fas fa-plus"></i></button>         
		            </div>
		          </div> 
		        </form>
		
		        <br>
		        <br>
		        <br>
		        <br>
		        <br>
		        <br>
		        <br>
		        <br>
		        <br> 
          <footer class="footers">
	      <div class="container">
	        <span class="text-muted">  <a class="navbar-brand" href="developers.php"> About the Developers.</a></span>
	      </div>
	    </footer>	
        </main>
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/10aea60dfb.js" crossorigin="anonymous"></script>
     </body>
         <script type="text/javascript">
			
			$('#le-alert').hide();

		    $(document).ready(function(){

		        $('#webcrawl').on('submit',function(e){
		            e.preventDefault();
		            var urlStr = $('#url').val();
		            $.ajax({
		                url: 'webcrawler.php',
		                method: "POST",
		                data: {url: urlStr},
		                datatype: "json",
		                success: function(data){
		                    console.log(data);
		                    $('#le-alert').hide();
		                },   
		                error: function(req) {
                			
             			}
             			
		          })
		         
		        }); 
		    })
		    
		    $("#webcrawl").submit(function(e) {
		    $('#le-alert').show();
		    
			}); 
			
			$('.close').click(function () {
			  $(this).parent().hide(); // hides alert with Bootstrap CSS3 implem
			});
		</script> 
</html>
