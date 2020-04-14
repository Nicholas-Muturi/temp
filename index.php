<?php
$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/';

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
	
}else if (preg_match("/1[*][a-zA-Z0-9_.+]+@[a-zA-Z0-9]+.[a-zA-Z]+[*][a-zA-Z0-9]+$/",$text)) {
	$exploded = explode("*",$text);
	$email = $exploded[count($exploded)-2];
	$pin = $exploded[count($exploded)-1];
	$response = "END Email/Pin are " . $email . " / " . $pin . "\n";

}else if (preg_match("/1[*][a-zA-Z0-9_.+]+@[a-zA-Z0-9]+.[a-zA-Z]+$/",$text)) {
	$response = "CON Enter pin number \n";

}else if (preg_match("/1$/",$text)) {
	$response = "CON Enter email address \n";
	
}
header('Content-type: text/plain');
echo $response;	



?>









