<?php
$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$networkCode = $_POST['networkCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];
$response = "";

if($text == "" ){
	
	$response = "CON Welcome. Select an option below \n";
	$response .= "1. Register \n";
	$response .= "2. Get baby name \n";
	$response .= "3. Check for health professionals \n";
    $response .= "4. Subscribe for health reminders \n";
    $response .= "5. Ovulation Calculator \n";
    $response .= "6. More \n";


}else if(preg_match("/6[*]00$/",$text)){
	
	$response = "CON Welcome. Select an option below \n";
	$response .= "1. Register \n";
	$response .= "2. Get baby name \n";
	$response .= "3. Check for health professionals \n";
    $response .= "4. Subscribe for health reminders \n";
    $response .= "5. Ovulation Calculator \n";
    $response .= "6. More \n";
	
}else if (preg_match("/6$/",$text)) {
	$response = "CON Select an option below \n";	
	$response .= "7. Get instant ambulance \n";
    $response .= "8. Subscribe daily tips \n";
    $response .= "00. Back \n";

}else if(preg_match("/2[*]2$/",$text)){
	$response = "END Female names \n";
	$femalenames = array("Jane", "Racheal", "Anna", "Tokyo", "Nairobi");
	for($i=0;$i<count($femalenames);$i++){
		$response .= ($i + 1) . " " . $femalenames[$i] . "\n";
	}
	

}else if(preg_match("/2[*]1$/",$text)){
	$response = "END Male names \n";
	$malenames = array("Steve", "Tom", "Andrew", "Greg", "John");
	for($i=0;$i<count($malenames);$i++){
		$response .= ($i + 1) . " " . $malenames[$i] . "\n";
	}
	
}else if(preg_match("/2[*]0$/",$text)){
	
	$response = "CON Welcome. Select an option below \n";
	$response .= "1. Register \n";
	$response .= "2. Get baby name \n";
	$response .= "3. Check for health professionals \n";
    $response .= "4. Subscribe for health reminders \n";
    $response .= "5. Ovulation Calculator \n";
    $response .= "6. More \n";

}else if(preg_match("/2$/",$text)){
	$response = "CON Select an option below \n";
	$response .= "1. Male names \n";
	$response .= "2. Female names \n";
	$response .= "00. Back \n";
	
}else if (preg_match("/1[*][a-zA-Z0-9]+[*][a-zA-Z0-9]+$/",$text)) {
	$exploded = explode("*",$text);
	$email = $exploded[count($exploded)-1];
	$pin = $exploded[count($exploded)-2];
	$response = "END Details are " . $email . " - " . $pin . "\n";

}else if (preg_match("/1[*][a-zA-Z0-9]+$/",$text)) {
	$response = "CON Enter pin number \n";

}else if (preg_match("/1$/",$text)) {
	$response = "CON Enter email address \n";
	
}
header('Content-type: text/plain');
echo $response;	

?>









