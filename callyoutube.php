<?php 
include 'hardware.php';
class CallYoutube {

	public $serverAddress;
	
	
	public function __construct() {
		$MacAdd = new Hardware();
		$this->serverAddress = $MacAdd->getServerAddress();
	}
	
	
	public function getYoutubeLink() {
		$MacAdd = new Hardware();
		$macAddress = $macAdd->getMyMacAdd();
		
		if($macAddress != false) 
		{
			$hashMacAdd = $this->hashMyMacAdd($macAddress);
	
			$curl = curl_init();

			curl_setopt($curl, CURLOPT_URL, $this->serverAddress.'/stream/start?hash='.$hashMacAdd);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			
			$response = curl_exec($curl);
			$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			if($code == '500')
			{	
				echo 'Error';
				exit;
			}
			else
			{
				echo substr($response,0,strlen($response)-1);
				return;
		
			}
		}
		else
		{
			exit;
		}
	}
	
}

	
	$Stream = new CallYoutube();
	$Stream->getYoutubeLink();
	
?>
