
/*this script conceals and reveals the the div which holds the case configuration options
until the user checks the config checkbox */ 

var $optiondiv = document.getElementById("switchable");
$optiondiv.style.visibility = "hidden"; // sets default stqte of hidden
var listen = document.getElementById("case_config");
listen.onchange = function () { 
    if (listen.checked==true) {
        state = false;
        $optiondiv.style.visibility = "visible";//when checkbox with id case_config is checked sets case options to visible
    }
    else {
        state = true;
    	$optiondiv.style.visibility = "hidden";//hides options
   	}
}
    
	      	     