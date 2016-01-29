<?php
class ValveApi extends ApiBase {
	public function execute() {
		// Get specific parameters
		$leagueid = $this->getMain()->getVal( 'leagueid' );
		global $wgValveApiKey;
		
		if (isset ($wgValveApiKey) && !empty ($wgValveApiKey)) {

			$sJSON = file_get_contents('https://api.steampowered.com/IEconDOTA2_570/GetTournamentPrizePool/v1?key=' . $wgValveApiKey . '&leagueid=' . $leagueid);
			$aJSON = json_decode($sJSON, true);
			
			$result = $this->getResult();
			
			// Top level
			$this->getResult()->addValue( null, $this->getModuleName(), $aJSON );
		
		} else {
			$this->getResult()->addValue( null, $this->getModuleName(), array ('error' => 'Please set your Valve Api key in $wgValveApiKey in LocalSettings.php') );
		}
		return true;
	}

	// Description
	public function getDescription() {
		return 'valveapi-shortdesc';
	}

	public function getAllowedParams() {
		/*return array_merge( parent::getAllowedParams(), array(
			'leagueid' => array (
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true
			)
		) );*/
		return array(
			'leagueid' => array (
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true
			)
		);
	}

	public function getParamDescription() {
		return array_merge( parent::getParamDescription(), array(
			'leagueid' => 'The valve internal ID of the tournament'
		) );
	}

	// Get examples
	public function getExamplesMessages() {
		return array(
			'api.php?action=valvedota2api&leagueid=2733&format=xml'
			=> 'valvedota2api-example'
		);
	}
}