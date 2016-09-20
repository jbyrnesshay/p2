<?php


$testArr = ['fun', 'times', 'university', "schooldays", 'wrongway', 'gangsters', 'lotsabackers', 'despicable', 'cowardly', 'evil'];
$newArray = []; //new array will hold password
$blList = [];//index blacklist
$rando=[];
$num=5;
$rNum = []; 
    
$errStart = "<h2 class='error'>";
$errEnd = "</h2>";
$okStart ="<h2>";
$okEnd = "</h2>";

$symbolizer ="OFF";   
	//validation
 
  
 //$safeinput = htmlspecialchars($_POST["words"]);
//echo htmlspecialchars($_POST["words"]);
   if (isset($_POST["words"])){
   			$safeinput = htmlspecialchars($_POST["words"]);
   if ($safeinput =="")  {
   			$errMsg = "you need to enter a number";
   			$error = $errStart.$errMsg.$errEnd;
   	  #$num = 5;
   }
   elseif ($safeinput < 3 || $safeinput >9) {
   			$errMsg = "enter number between 3 and 9";
   	 		$error = $errStart.$errMsg.$errEnd;
   }
	else
   	{
   		$num =$safeinput;//_POST["words"];
   		//$_POST=array();
   	}}
   	 
  // 	$_POST=array();
   	for($i=0; $i<$num; $i++) {
   		$rando=rand(0,9);
   		while (in_array($rando, $blList)){
   			$rando = rand(0,9);
   		}
   		array_push($blList, $rando);
   	
   			//blList is a blacklist which prevents repeat words.  this will need to be reprogrammed for scraped list
   		if (isset($_POST["symbol"]) ) { 
   			if ($_POST["symbol"] !== ""){
   			$symbolizer = "ON";}
   		} 
   		else {
   			($symbolizer ="OFF");  
   		}  	

   		if ($i< ($num - 1)) {
   				$string = $testArr[$rando]."--"; 
   		}//appends symbol, dashes to words except for last word
   		else $string = $testArr[$rando]; 

   	 	array_push($newArray, $string);//$testArr[$rando]);*/
   	 		//newArray is password string
    	}
   		echo $symbolizer;
   		if ($symbolizer == "ON" ){ 
   			$thing=count($newArray);
   			//echo "thing is ".$thing;
   			$symboladdindex = rand(0, ($thing-1));//select random word in wordlist array
   			$symboladd = $newArray[$symboladdindex];
   			$lenword = strlen($symboladd);//char length of that word
   			$wordindx = rand(0, ($lenword - 3));//random character index of that word, 1 less index for -- charactr
   			$changeit = $symboladd[$wordindx];
   			$symboladd[$wordindx] = "*";
   			//echo "   s-".$symboladdindex;
   			//echo "   Wordindex is -".$wordindx;
   			//echo "   word is ".$newArray[$symboladdindex];
   			//echo "   characteris -".$symboladd[$wordindx];
   			//substr_replace($symboladd, $symboladd."*", 0); 	
   			$newArray[$symboladdindex]=$symboladd;}
   // testing dumping webpage contents to file below
   $myfile = fopen("new.txt", "w");
   $tester=file("http://www.cnn.com");
   fwrite($myfile, htmlspecialchars_decode($tester[0]));
