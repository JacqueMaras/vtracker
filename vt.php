<?php
include "connect.php";
function isBot(){
		$bots = array(
			'bingbot', 'msn', 'abacho', 'abcdatos', 'abcsearch', 'acoon', 'adsarobot', 'aesop', 'ah-ha', 'alkalinebot', 'almaden', 'altavista', 'antibot', 'anzwerscrawl', 'aol', 'search', 'appie', 'arachnoidea', 'araneo', 'architext', 'ariadne', 'arianna', 'ask', 'jeeves', 'aspseek', 'asterias', 'astraspider', 'atomz', 'augurfind', 'backrub', 'baiduspider', 'bannana_bot', 'bbot', 'bdcindexer', 'blindekuh', 'boitho', 'boito', 'borg-bot', 'bsdseek', 'christcrawler', 'computer_and_automation_research_institute_crawler', 'coolbot', 'cosmos', 'crawler', 'crawler@fast', 'crawlerboy', 'cruiser', 'cusco', 'cyveillance', 'deepindex', 'denmex', 'dittospyder', 'docomo', 'dogpile', 'dtsearch', 'elfinbot', 'entire', 'web', 'esismartspider', 'exalead', 'excite', 'ezresult', 'fast', 'fast-webcrawler', 'fdse', 'felix', 'fido', 'findwhat', 'finnish', 'firefly', 'firstgov', 'fluffy', 'freecrawl', 'frooglebot', 'galaxy', 'gaisbot', 'geckobot', 'gencrawler', 'geobot', 'gigabot', 'girafa', 'goclick', 'goliat', 'googlebot', 'griffon', 'gromit', 'grub-client', 'gulliver', 'gulper', 'henrythemiragorobot', 'hometown', 'hotbot', 'htdig', 'hubater', 'ia_archiver', 'ibm_planetwide', 'iitrovatore-setaccio', 'incywincy', 'incrawler', 'indy', 'infonavirobot', 'infoseek', 'ingrid', 'inspectorwww', 'intelliseek', 'internetseer', 'ip3000.com-crawler', 'iron33', 'jcrawler', 'jeeves', 'jubii', 'kanoodle', 'kapito', 'kit_fireball', 'kit-fireball', 'ko_yappo_robot', 'kototoi', 'lachesis', 'larbin', 'legs', 'linkwalker', 'lnspiderguy', 'look.com', 'lycos', 'mantraagent', 'markwatch', 'maxbot', 'mercator', 'merzscope', 'meshexplorer', 'metacrawler', 'mirago', 'mnogosearch', 'moget', 'motor', 'muscatferret', 'nameprotect', 'nationaldirectory', 'naverrobot', 'nazilla', 'ncsa', 'beta', 'netnose', 'netresearchserver', 'ng/1.0', 'northerlights', 'npbot', 'nttdirectory_robot', 'nutchorg', 'nzexplorer', 'odp', 'openbot', 'openfind', 'osis-project', 'overture', 'perlcrawler', 'phpdig', 'pjspide', 'polybot', 'pompos', 'poppi', 'portalb', 'psbot', 'quepasacreep', 'rabot', 'raven', 'rhcs', 'robi', 'robocrawl', 'robozilla', 'roverbot', 'scooter', 'scrubby', 'search.ch', 'search.com.ua', 'searchfeed', 'searchspider', 'searchuk', 'seventwentyfour', 'sidewinder', 'sightquestbot', 'skymob', 'sleek', 'slider_search', 'slurp', 'solbot', 'speedfind', 'speedy', 'spida', 'spider_monkey', 'spiderku', 'stackrambler', 'steeler', 'suchbot', 'suchknecht.at-robot', 'suntek', 'szukacz', 'surferf3', 'surfnomore', 'surveybot', 'suzuran', 'synobot', 'tarantula', 'teomaagent', 'teradex', 't-h-u-n-d-e-r-s-t-o-n-e', 'tigersuche', 'topiclink', 'toutatis', 'tracerlock', 'turnitinbot', 'tutorgig', 'uaportal', 'uasearch.kiev.ua', 'uksearcher', 'ultraseek', 'unitek', 'vagabondo', 'verygoodsearch', 'vivisimo', 'voilabot', 'voyager', 'vscooter', 'w3index', 'w3c_validator', 'wapspider', 'wdg_validator', 'webcrawler', 'webmasterresourcesdirectory', 'webmoose', 'websearchbench', 'webspinne', 'whatuseek', 'whizbanglab', 'winona', 'wire', 'wotbox', 'wscbot', 'www.webwombat.com.au', 'xenu', 'link', 'sleuth', 'xyro', 'yahoobot', 'yahoo!', 'slurp', 'yandex', 'yellopet-spider', 'zao/0', 'zealbot', 'zippy', 'zyborg', 'mediapartners-google'
		);
	$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	foreach($bots as $bot){
		if(strpos($user_agent, $bot) === true){
			return true;	
		}
	}
	return false;
}

$http_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);

$isbot = isBot();

$jfile = file_get_contents("http://ipinfo.io/json");

$jdecode = json_decode($jfile);

$ip = $jdecode->{'ip'};

$city = $jdecode->{'city'};
$region = $jdecode->{'region'};
$country = $jdecode->{'country'};
$latlong = $jdecode->{'loc'};

$latlong_arr = explode(",", $latlong);

$lat = $latlong_arr[0];
$long = $latlong_arr[1];

$location = $city.", ".$region.", ".$country;

$org = $jdecode->{'org'};

$hostname = $jdecode->{'hostname'};

$date = date("Y/m/d");
$month = date("m");
$year = date("Y");
$time = date("H:i:s");
$hour = date("H");

if($hostname == "No Hostname"){
	$hostname = "";
	$hashost = false;
} else{
	$hashost = true;
}

$querystring = isset($_SERVER["QUERY_STRING"]) ? $_SERVER['QUERY_STRING']:null;

$url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$from = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER']:$url;

if($mysqli->connect_errno) {
	echo "Connection Failed (".$mysqli->connect_errno.") : ".$mysqli->connect_error."<br />";
	exit();
}



$result = $mysqli->query("INSERT INTO `vtracker` (`ip`, `location`, `is_bot`, `lat`, `long`, `latlong`, `date`, `time`, `hashost`, `host`, `org`, `ua`, `year`, `hour`, `month`, `url`,`from`, `querystr`) VALUES ('$ip', '$location', '$isbot', '$lat', '$long', '$latlong', '$date', '$time', '$hashost', '$hostname', '$org', '$http_user_agent', '$year', '$hour','$month', '$url', '$from', '$querystring')");
