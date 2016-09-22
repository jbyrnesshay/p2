
<!DOCTYPE html>
<html>
  	<head>
    <title> p2 </title>
    <meta charset="utf-8">
    <link href="styles.css" rel="stylesheet">
    <?php require "logic.php"; ?>
  	</head>
  	<body>
	    <h1> Joachim's password generator </h1>
	  		<h2 id="msgwindow">
	  	  		put stuff here
	        	<?php if (isset($error)){echo $error;}   
	            	elseif(isset($userArray)){ ?>
				<!--<h2>-->
	        	<?php foreach($userArray as $item){ ?> 
	     	   <?php if ((isset($newString2) && $item == $newString2) || (isset($newString1) && $item == $newString1)) {echo "<span class='s'>".$item.'</span>';} else echo $item;}} ?>
	       	</h2>
	   	<form  method='GET' action ='index.php' id="thisform" novalidate>
	          <!-- novalidate tag disables built-in validation messages and allows php validation to take over-->
	    	<p class="wordconfig">  
	       		<label for = "quant"> how many words? (3 to 9)</label>
	      		<input id="quant" type= "number" min="3" max="9" name = "words" value="5">
	      	</p>
			<p class="numconfig">
	      		<input type="checkbox"  name="number">add a number?
			</p>
	   		<p class="lengthconfig">
				<label for ="max">max length (5 to 14)</label>
	     		<input id="max" type="number" min="5" max="14" name="maxlength">
	     	</p>
			<p class = "symbolconfig">
	     		<input type="checkbox"  name="symbol">add a symbol?
	      	</p>
	      	<p  class="caseconfig">
	      		<input type="checkbox" id="case_config" name="config">
	     		<label for="case_config">
	      			configure case? 
	      		<span>(unchecked = lowercase)</span>
	       		</label>
	    	</p>
	   		<p id="switchable" class="caseoptions">
	      		<input type ="radio" name="case" class="switch" id="upper" value="upper"><label for="upper" class="hide">all  upper-case?</label>
	     		<input type="radio" name="case"  class="switch" id="first" value="first"><label for ="first" class="hide">cap 1st letter?</label>
	    		<input type="radio" name="case" class="switch" id="alternate" value="alternate"> <label for="alternate" class="hide">WORD,word,WORD,word,...</label>
	    	</p>
	   	 	<p class = "submitbut">	
	      		<input type="submit" name="submitter" value="submit" form="thisform"><br>
	   		</p>
	    </form>
	    <script>

	        var $optiondiv = document.getElementById("switchable");
	        $optiondiv.style.visibility = "hidden";
	        var $children = $optiondiv.childNodes;   
	        var $labl = document.getElementsByClassName("hide");
	        for (i=0; i< $children.length; i++) {
	            $children[i].disabled = true;

	        }
	        /*for (j=0; j<$labl.length; j++) {
	        	$labl[j].style.color = "pink";
	        	$labl[j].style.display ="none";
	        }*/
	        var listen = document.getElementById("case_config");
	        listen.onchange = function () { 
	            var state;
	            var col;
	            if (listen.checked==true) {
	                state = false;
	                $optiondiv.style.visibility = "visible";
	            }
	            else {
	                state = true;
	            	$optiondiv.style.visibility = "hidden";
	           	}
	            for (i=0; i < $children.length; i++) {
	              	$children[i].disabled = state;
	            }
	            /*for (j=0; j<$labl.length; j++) {
	            	$labl[j].style.color = col;
	            }*/
	      	}      
	    </script>
	</body>
</html>