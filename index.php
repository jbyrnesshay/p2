 
<!DOCTYPE html>
<html>
  <head>
    <title> p2 </title>
    <link href="css\styles.css" rel="stylesheet">
    <?php require "logic.php"; ?>
    
  </head>
  <body>
  	<h1> Joachim's password generator </h1>
  	 <div id="msgwindow">

  	  <?php if (isset($error)) {
  	                  echo $error;} 
  	        elseif(isset($newArray)) { ?>
			  	   
  	  <?php echo "<h2>";	foreach($newArray as $item) 
  	  						{ 
  	  	           				if (isset($symboladd) && $item==$symboladd)
  	  	           					{echo "<span class='s'>".$item."</span>";}
  	  	           				else 
  	  	           				 echo $item; 
  	  	           				}
  	  	           			}
  				  echo "</h2>"; ?>
  	  
  	 </div>
 
 <div id="fields">
  <form  method='POST' action ='index.php' id="thisform" novalidate>
  <!-- novalidate tag disables built-in validation messages and allows php validation to take over-->
 
   <p style="margin-bottom: 0;">how many words? [3 to 9]</p><br> 

   <fieldset>
   
	
  <!--<input type="number"  min=3 max=9 title="this is an error" name = "words"  ><br>-->
  <input type="text"  pattern="[0-9]{1}"  name ="words"> <br>
  <input type="checkbox" name="number">add a number?<br>
  <input type="checkbox" name="symbol">add a symbol?<br>
  <div class="maxlength">
    <p>maxlength</p>
  <select name="maxlength" form="thisform">
    <option value="5">5</option>
    <option value="10">10</option>
    <option value="15">15</option>
    <option value="20">20</option>
    
   </select>
   

  <input type="submit" name="submit" form="thisform"><br>
  </div>
  </fieldset>

  </form>
</div>
 </body>
  </html>