
<!DOCTYPE html>
<html>
  	<head>
    <title> Joachim Byrnes-Shay, Project 2: XKCD Style Password Generator, CSCI E-15  </title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet">
    <?php require "logic/logic.php"; ?>
  	</head>
  	<body>
	    <h1> P2:  Dictionary based XKCD Password Creator <span> by Joachim Byrnes-Shay </span></h1>

	    		<!-- dynamicallly create h2 using 0, 1, or 2 classes for styling its content depending on user submit data or error -->
	  			<h2 <?php echo "class = '".$errClass."'"; ?> > 
	  	  				<?php if (isset($error)){echo $error;}   
	            			elseif(isset($userArray)){ ?>
	        			<?php foreach($userArray as $item){ ?> 
	     	   			<?php if ((isset($newString2) && $item == $newString2) || (isset($newString1) && $item == $newString1)) { ?>
	     	   		<span class='nonalpha'> <?php echo $item ?></span>
	     	   			<?php } else echo $item; ?>
	     	   			<?php ;}} ?>
	       		</h2>
	       	<form  method='GET' action ='index.php' id="thisform" novalidate>
	          <!-- novalidate tag disables built-in validation messages and allows php validation to take over-->
	          <!-- for purposes of proof of concept -->
	    	<p class="wordconfig">  
	       		<label for = "quant"> how many words? (3 to 9)</label>
	      		<input id="quant" type= "number" min="3" max="9" name = "words">
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
	   			<!-- this p of id switchable is used by javascript to conceal or reveal the case configuration options below -->
	      		<input type ="radio" name="case" class="switch" id="upper" value="upper"><label for="upper" class="hide">all  upper-case?</label>
	     		<input type="radio" name="case"  class="switch" id="first" value="first"><label for ="first" class="hide">cap 1st letter?</label>
	    		<input type="radio" name="case" class="switch" id="alternate" value="alternate"> <label for="alternate" class="hide">WORD,word,WORD,word,...</label>
	    	</p>
	   	 	<p class = "submitbut">	
	      		<input type="submit" name="submitter" value="submit" form="thisform"><br>
	   		</p>
	    </form>
	    <script text="javascript" src="scripts/scripts.js">
	    // script in scripts.js hides or reveal case configuration options when user checks config box
		</script>
	</body>
</html>