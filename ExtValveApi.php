<?php

class ExtValveApi {

	/**
	 * @param $parser Parser
	 */
	public static function putvalvedota2prizepool( $parser, $leagueid ) {
		global $wgValveApiKey;
		
		if (isset ($wgValveApiKey) && !empty ($wgValveApiKey)) {
			$sJSON = file_get_contents('https://api.steampowered.com/IEconDOTA2_570/GetTournamentPrizePool/v1?key=' . $wgValveApiKey . '&leagueid=' . $leagueid);
         $aJSON = json_decode($sJSON, true);
			
			return number_format($aJSON['result']['prize_pool'], 0, '.', ',');
		} else {
			return 'Please set your Valve Api key in $wgValveApiKey in LocalSettings.php';
		}
	}

	/**
	 * @param $parser Parser
	 */
	public static function putvalvedota2rawprizepool( $parser, $leagueid ) {
		global $wgValveApiKey;
		
		if (isset ($wgValveApiKey) && !empty ($wgValveApiKey)) {
			$sJSON = file_get_contents('https://api.steampowered.com/IEconDOTA2_570/GetTournamentPrizePool/v1?key=' . $wgValveApiKey . '&leagueid=' . $leagueid);
         $aJSON = json_decode($sJSON, true);
			
			return $aJSON['result']['prize_pool'];
		} else {
			return 'Please set your Valve Api key in $wgValveApiKey in LocalSettings.php';
		}
	}

	/**
	 * @param $parser Parser
	 */
	public static function putvalvecsgoweaponprice( $parser, $weaponname ) {
		global $wgValveApiKey;
      $weaponname = str_replace('%7C', '|', $weaponname);
		
		if (isset ($wgValveApiKey) && !empty ($wgValveApiKey)) {
			$sJSON = file_get_contents('http://steamcommunity.com/market/priceoverview/?&appid=730&market_hash_name=' . urlencode($weaponname));
         $aJSON = json_decode($sJSON, true);
			
			return $aJSON['lowest_price'];
		} else {
			return 'Please set your Valve Api key in $wgValveApiKey in LocalSettings.php';
		}
	}
}
