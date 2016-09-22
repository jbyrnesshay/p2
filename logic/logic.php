<?php

	$contents = explode("\n", file_get_contents('data/wordsEn.txt'));#reads contents of file
	#wordsEn.txt dictionary courtesy of SIL international, file found at http://www-01.sil.org/linguistics/wordlists/english/
	$dictionary = array_map('trim', $contents); #use array_map with trim to ensure there is no problematic accidental whitespace in array elements, creates final wordlist
	$lastIndex = count($dictionary) - 1;  #for use in loops with random function, the highest range index used in the random func, equals index of last item in dictionary
	$userArray = [];#sets userArray which will hold dynamically generated password list
	$case = "lower"; #the default case for display of passord content
	$symarray = ['!', '@', '#', '$', '%', '*', '&']; #array of symbols that will be used for selection by rand function when user opts to include symbol
	$errClass = ""; #sets var that will be used to set styling class for error messages

	if 	(isset($_POST) && $_POST == []) {
 		$numWords = 5;
 		$max = 7;
 		#default values used to create user with 1st password selections when user first land on homepage p2.midnightoil.com, before submitting
 	} 
	else if (isset($_POST)) {
		#pass $_POST number inputs to htmlspecialchars in case user tries to hack the page
		$numWords = htmlspecialchars($_POST["words"]);
 	 	$max = htmlspecialchars($_POST["maxlength"]);
 	 	$symbolToAdd = $symarray[rand(0,6)];
		$numberToAdd = rand(0, 9);
		#when there is GET data, num of words and max wordlength are set to user selection, symbol and number are prepared in event user opts to include these
 	}

 	#error messages are configured below 
	if ($numWords == "" || $max == "") {  
		#if user did not input either max wordlength choice or num of words choice
			$errClass = "error";
			$error = "ERROR: enter # of words and max wordlength";
		}
	else if ( $numWords < 3 || $numWords > 9) {
		#if users num of words choice is not within the valid range
		$errClass="error";
			$error = "ERROR: # of words must be between 3 and 9";
		}
	else if ($max < 5 || $max > 14 ) {
		#if users max word length is not in the valid range
		$errClass="error";
		$error = "ERROR: max word length must be 5 to 14";
	}
	else if (isset($_POST["config"]) && empty($_POST["case"])) {
		#if user checks they wish to configure case, but does not select a specific configuration option
		$errClass ="error";
		$error = "ERROR: to configure case, make a configuration selection";
	} 
	else if (!(empty($_POST["case"]))) {
		#if not sent to the above error, the case options are set to the user's choice
		$case = $_POST["case"];
	}

	
	for ($i = 0; $i < $numWords; $i++) {
		$rando = rand(0, $lastIndex);
		/*check that the value (word) at the random index is not longer than the maxlength a
		nd that it is not already in the user array to prevent duplicate words in the password list */
		while ( (strlen($dictionary[$rando]) > $max) || (in_array($dictionary[$rando], $userArray)))
		{
			$rando = rand(0, $lastIndex);  # generate random index in value from 0 to last index value in dictionary  
		}
		$word = strtolower($dictionary[$rando]);
		$wordStart =$word[0];
		$capwordStart = strtoupper($wordStart);
		/*if ($case=="upper"){
			$word = strtoupper($word);
		}
		else*/
			if ($case == "first") {
			$word = $capwordStart.substr($word, 1);
		}
		elseif ($case == "alternate") {
			if (($i % 2) == 0 ) {
				$word = strtoupper($word);
			}
		}
			#create array of word selections that will constitute the password list outputted to the user
			array_push($userArray, $word);
	}
	if ($case=="upper") {
	$userArray = array_map('strtoupper', $userArray);}
	#first check that the below statements are not entered when the password array is empty
 	if (!(empty($userArray))) {
  		if (isset($_POST["symbol"]) && $_POST["symbol"]!="") {
			if ($_POST["symbol"] == "on") {  
			#if user has chosen to include a symbol, it will be appended to the end of the 1st word	
			$addSymWhere = 0;
			$newString1 = $userArray[$addSymWhere].$symbolToAdd;
			$userArray[$addSymWhere] = $newString1;
			}
		}
		if (isset($_POST["number"]) && $_POST["number"]!="") {
			if (($_POST["number"] == "on")){
				#if user has chosen to include a number, it will be appended to the end of the last word
				$addNumWhere = $numWords-1;
				$newString2 = $userArray[$addNumWhere].$numberToAdd;
				$userArray[$addNumWhere]=$newString2;
			}
		} 
	} 

 