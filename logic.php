<?php

$contents = explode("\n", file_get_contents('data/wordsEn.txt'));#reads contents of file
$dictionary = array_map('trim', $contents); #ensures there is no problematic whitespace in array elements, creates final wordlist
$lastIndex = count($dictionary) - 1;  #for use in loops with random function, the highest range index used in the random func, equals index of last item in dictionary
//$num = 5; //set default state before submit
//$max = 5; // default state before submit because I am seeing that $max below is inside a if isset submit statement
$addSymWhere = "";
$addNumWHere = "";

$userArray = [];
$stuff = [];
#the above will hold users passwords
//$rando = -1;
$symarray = ['!', '@', '#', '$', '%', '*', '&'];
$errClass = "";//errEnd = "</h2>";
//$okStart ="<h2>";
//$okEnd = "</h2>";
if (isset($_GET) && $_GET == []) {
	$numWords = 5;
	$max = 7;
} else if (isset($_GET)) {
	 $numWords = $_GET["words"];
	 $max = $_GET["maxlength"];
	 if ($numWords == "" || $max == "") {
	$errClass = "error";
	$error = "you must enter # of words and max wordlength to proceed";
}}
else if ( $_GET["words"] >= 3 && $_GET["words"] <= 9) {
	$numWords= $_GET["words"];}
   else if ( $_GET["words"] < 3 || $_GET["words"] > 9) {
   	$errClass="error";
		$error = "# of words must be between 3 and 9";
	}
if (( $_GET["caseconfig"]) == "ON" && (!(isset($_GET["caseconfig"]) || $_GET["caseconfig"] == ""))) {
	$errClass ="error";
	$error = "if you want to configure case, you must make a configuration selection";

}
 
 

  
echo isset($_GET)."  "; 
var_dump($_GET);
echo (isset($_GET["submitter"]));
 
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