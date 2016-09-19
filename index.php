 
<!DOCTYPE html>
<html>
  <head>
    <title> p2 </title>
    <link href="css\styles.css" rel="stylesheet">
    <?php require "logic.php"; ?>
    
  </head>
  <body>
  	<h1> Joachim's password generator </h1>
  	 <div>

  	  <?php if (isset($error)) {
  	                  echo $error;} 
  	        elseif(isset($newArray)) { ?>
			 <h2> 	  
  	  <?php 	foreach($newArray as $item) { 
  					echo $item." "; 
  				} }?> </h2>
  	  
  	 </div>
 

  <form  method='POST' action ='index.php'>
   
   
  <p style="margin-bottom: 0;">how many words? [1 to 10]</p><br>  
	
  <input type="number" style="width:5em;font-size:2em" min="1" max="9" name = "words"  ><br>
  <input type="checkbox" name="number">add a number?<br>
  <input type="checkbox" name="symbol">add a symbol?<br>

  <input type="submit" name="submit"><br>
  </form>

 </body>
  </html>