<?php
Class Hardware {
	
	public $serverAddress;
	
	public function __construct() {
		$this->serverAddress = 'http://api.pimasjid.com';
	}
	
	public function getMyMacAdd() {
		exec('netstat -ie | grep eth0', $result);
		
		$macAdd = explode('HWaddr',$result[0]);
		
		if(isset($macAdd[1]))
		{
			
			return trim($macAdd[1]);
		}
		else
		{
			return false;
		}
		

	}
	
	public function getServerAddress() {
		return $this->serverAddress;
	}
	
	private function hashMyMacAdd($macAddress) {
		
		return md5(md5(md5(md5(md5($macAddress)))));
	}
}

?>