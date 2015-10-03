<?php 
include 'hardware.php'
class DisconnectVideo {

	public $serverAddress;
	
	public function __construct() {
		$MacAdd = new Hardware();
		$this->serverAddress = $MacAdd->getServerAddress();
	}
	
	public function disconnect() {
		$MacAdd = new Hardware();
		$macAddress = $MacAdd->getMyMacAdd();
		
		if($macAddress != false) 
		{
			$hashMacAdd = $this->hashMyMacAdd($macAddress);
			
			$curl = curl_init();

			curl_setopt($curl, CURLOPT_URL, $this->serverAddress.'/stream/stop?hash='.$macAddress);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_exec($curl);
			curl_close($curl);
		}
		else
		{
			exit;
		}
	}
	
}

	$Stream = new DisconnectVideo();
	$Stream->disconnect();	
?>
