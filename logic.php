<?php


$testArr = ['fun', 'times', 'university', "schooldays", 'wrongway', 'gangsters', 'lotsabackers', 'despicable', 'cowardly', 'evil'];
$newArray = []; //new array will hold password
$blList = [];//index blacklist
$rando=[];
 $num=5;
 $rNum = []; 
   echo isset($_POST["words"]);
   $errStart = "<h2 class='error'>";
   $errEnd = "</h2>";
   $okStart ="<h2>";
   $okEnd = "</h2>";
   if ($_POST["words"] =="")  {
   	$errMsg = "you need to enter a number";
   	$error = $errStart.$errMsg.$errEnd;
   	  $num = 5;
   }
   else
   		{
   		$num = $_POST["words"];
   		$_POST=array();
   	}
   		$_POST=array();
   		for($i=0; $i<$num; $i++) {
   			$rando=rand(0,9);
   			while ((in_array($rando, $blList))){
   				$rando = rand(0,9);
   			}
   			array_push($blList, $rando);
   	 		array_push($newArray, $testArr[$rando]);//newArray is password string
    
   		}
 	 unset($num);
	#var_dump($_POST);
	#$num = rand(0, 9);
   #var_dump($newArray);
   #var_dump($blList);
	 
