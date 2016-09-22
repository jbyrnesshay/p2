<?php

$contents = explode("\n", file_get_contents('data/wordsEn.txt'));#reads contents of file
$dictionary = array_map('trim', $contents); #ensures there is no problematic whitespace in array elements, creates final wordlist
$lastIndex = count($dictionary) - 1;  #for use in loops with random function, the highest range index used in the random func, equals index of last item in dictionary
//$num = 5; //set default state before submit
//$max = 5; // default state before submit because I am seeing that $max below is inside a if isset submit statement
$addSymWhere = "";
$addNumWHere = "";

$userArray = [];
#the above will hold users passwords
//$rando = -1;
$symarray = ['!', '@', '#', '$', '%', '*', '&'];
$errStart = "<h2 class='error'>";
$errEnd = "</h2>";
$okStart ="<h2>";
$okEnd = "</h2>";


/*if (isset($_POST["submit"])) {
	if (!(empty($_POST["words"]))){$numWords = $_POST["words"];
}	if (!(empty($_POST["maxlength"]))){$max = $_POST["maxlength"];}
	if (!(empty($_POST["number"]))) {$number = $_POST["number"];}
	if (!(empty($_POST["symbol"]))) {$symbol = $_POST["symbol"];}
	if (!(empty($_POST["case"]))) {$case = $_POST["case"];}

	
	if (($_POST["words"]=="")) {
		$errMsg = "you must enter # of words";
		$error = $errStart.$errMsg.$errEnd;
	}
	elseif ($_POST["maxlength"]=="") {
		$errMsg = "you must enter maximum wordlength";
		$error = $errStart.$errMsg.$errEnd;
	}}
	else if (!(isset($_POST["submit"])) && (($_POST["words"]=="") || (($_POST["maxlength"]=="")))) 
	 {$max = 8; 
	 $numWords=5;
	 }//, /*$_POST["case"],$_POST["maxlength"])) && $_POST["maxlength"]==""){  */
  # used to enter 1st while loop below, or i could do, while
# my $_POST vars are "words" for #words, "number" and "symbol checkbboxes for adding either, 
#maxlength and minlegnth from select boxes, and submit
 
 
 
var_dump($_POST);
 
//var_dump($max);
	#error ehcking here
	#valldation chcking
	# is min > max
	# did user select word #
	# did user select min and max
for ($i = 0; $i < $numWords; $i++)
	{
		 	$rando = rand(0, $lastIndex);
		 while ( (strlen($dictionary[$rando]) > $max) || (in_array($dictionary[$rando], $userArray)))
		{
			#for that to work I need $rando assigned to something
			$rando = rand(0, $lastIndex);  # generate random index in value from 0 to last index value in dictionary  
		}
		$word = strtolower($dictionary[$rando]);
		$wordStart =$word[0];
		$capwordStart = strtoupper($wordStart);
		
			if (empty($_POST["case"])) {$case = "lower";}
				elseif ($case=="upper"){
				$word = strtoupper($word);}
			elseif ($case == "first"){
				$word = $capwordStart.substr($word, 1);
			}
			elseif ($case == "alternate"){
				if (($i % 2) == 0 ) {
					$word = strtoupper($word);

			}}
			 
		array_push($userArray, $word);

	}
	 #i have my list

	#additions.
 
			if (!(empty($_POST["symbol"])))

			 {  #make sure this is the right val,ue
		# get last index value of last word on $user array
		#symbol is what>
		$symbolToAdd = $symarray[rand(0,6)];
		#make new string
		$addSymWhere = rand(0, ($numWords-1));

		$newString1 = $userArray[$addSymWhere].$symbolToAdd;
		$userArray[$addSymWhere] = $newString1;
	} 

	if  (!(empty($_POST["number"]))) {  #make sure this is the right value
		# get last index value of first word on $user array
		#number is what
		   //if ($_POST["number"] != ""){
		$numberToAdd = rand(0, 9);
		$addNumWhere = rand(0, ($numWords-1));
		while ($addNumWhere == $addSymWhere) {
		$addNumWhere = rand(0, ($numWords-1));
			
		}
		 # dont try to add number to word where symbol was added

		$newString1 = $userArray[$addNumWhere].$numberToAdd;
		$userArray[$addNumWhere]=$newString1;
		 
	}  

//}
//$userArray=arraytolower($userArray);
  # this closes the if isset submit brace