<?php
/*
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com> <nekhaenko.ru>
 * @version 1.0.1
 * @release_date 02.04.2012
 */
class browser
{
	public $browser;
	public function __construct()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		echo $ua.'<br>';
		/* pattern part start */
		$iphone = "/iPhone/"; /* iPhone device */
		$ipad = "/iPad/"; /* iPad device */
		$ipod = "/iPod/"; /* iPod device */
		$android = "/Android/"; /* Google Android device */
		$black_berry = "/BlackBerry/"; /* Black Berry mobile device */
		$opera_mini = "/Opera Mini/"; /* Opera Mini mobile Browser */
		$opera_mobile = "/Opera Mobi/"; /* Opera Mobile mobile Browser */
		$opera = "/Opera/"; /* Opera Browser */
		$s60 = "/S60/"; /* Nokia S60 */
		$samsung_galaxy = "/Samsung Galaxy/"; /* Samsung Galaxy S */
		$mozilla_firefox = "/Firefox/"; /* Mozilla Firefox desctop Browser */
		$google_chrome = "/Chrome/"; /* Google Chrome desctop browser */
		$chromium = "/Chromium/"; /* Chromium desctop browser */
		$safari = "/Safari/"; /* Apple Safari desctop browser */
		$ie = "MSIE"; /* Microsoft Internet explorer */ 
		$amaya = "/amaya/"; /* Amaya WYSIWYG editor */
		$avant = "/Avant Browser/"; /* Awant desctop Browser */
		$camino = "/Camino/"; /* Camino MAC OS web Browser */
		$epiphany = "/Epiphany/"; /* Epiphany web Browser (default Gnome Browser) */
		$konqueror = "/Konqueror/"; /* Konqueror web Browser */
		$flock = "/Flock/"; /* Flock desctop Web Browser */
		/* pattern part stop */
		
		/* detect type part start */
		
		if(preg_match($ipod,$ua))
		{
			/* iPod device */
			$this->browser['device'] = 'iPod';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($ipad,$ua))
		{
			/* iPad device */
			$this->browser['device'] = 'iPad';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($iphone,$ua))
		{
			/* iPhone device */
			$this->browser['device'] = 'iPhone';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($android,$ua))
		{
			/* Android device */
			$this->browser['device'] = 'Android';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($black_berry,$ua))
		{
			/* Black Berry Device */
			$this->browser['device'] = 'Black Berry';
		}
		else
		if(preg_match($s60,$ua))
		{
			/* Nokia S60 */
			$this->browser['device'] = 'Nokia S60';
			$this->get_opera_mini();
			$this->get_opera_mobile();
		}
		else
		if(preg_match($samsung_galaxy,$ua))
		{
			/* Samsung Galaxy Devices */
			if(preg_match('/Samsung Galaxy S/',$ua))
			{
				$this->browser['device'] = 'Samsung Galaxy S';
			}
			else
			if(preg_match('/Samsung Galaxy Tab/',$ua))
			{
				$this->browser['device'] = 'Samsung Galaxy Tab';
			}
			else
				$this->browser['device'] = 'Samsung Galaxy';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($opera_mini,$ua))
		{
			/* Opera Mini Device */
			$this->browser['device'] = 'Opera Mini';
			$this->get_opera_mini();
		}
		else
		if(preg_match($opera_mobile,$ua))
		{
			/* Opera Mobile Device */
			$this->browser['device'] = 'Opera Mibile';
			$this->get_opera_mobile();
		}
		else
		if(preg_match($opera,$ua))
		{
			/* Opera Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_opera_desctop();
		}
		else
		if(preg_match($mozilla_firefox,$ua))
		{
			/* Mozilla Firefox Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_firefox_desctop();
		}
		else
		if(preg_match($chromium,$ua))
		{
			$this->browser['device'] = 'PC';
			$this->get_chromium_desctop();
		}
		else
		if(preg_match($google_chrome,$ua))
		{
			/* Google Chrome Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_chrome_desctop();
		}
		else
		if(preg_match($safari,$ua))
		{
			/* Apple Safari Desctop Browser */
			$this->browser['device'] = 'PC';
			$this->get_safari();
		}
		else
		if(preg_match($avant,$ua))
		{
			/* Apple Safari Desctop Browser */
			$this->browser['device'] = 'PC';
			$this->browser['browser']['title'] = 'Avant'; 
		}
		else
		if(preg_match($ie,$ua))
		{
			/* MS IE desctop Browser */
			$this->browser['device'] = 'PC';
			$this->get_ie();
		}
		else
		if(preg_match($amaya,$ua))
		{
			/* amaya editor */
			$this->browser['device'] = 'PC';
			$this->get_amaya();
		}
		else
		if(preg_match($camino,$ua))
		{
			/* Camino desctop Browser */
			$this->browser['device'] = 'PC';
			$this->get_camino();
		}		
		else
		if(preg_match($epiphany,$ua))
		{
			/* Camino desctop Browser */
			$this->browser['device'] = 'PC';
			$this->get_epiphany();
		}
		else
		if(preg_match($konqueror,$ua))
		{
			/* Camino desctop Browser */
			$this->browser['device'] = 'PC';
			$this->get_konqueror();
		}		
		$this->get_os();
		/* detect type part stop */
	}
	
	private function get_opera_desctop()
	{
		$this->browser['browser']['title'] = 'Opera';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Version\/[0-9.]{1,8}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Version/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_opera_mobile()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match("/Opera Mobi/",$ua))
		{
			$this->browser['browser']['title'] = 'Opera Mobile';
			$version = "/Opera Mobi\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Opera Mobi/','',$version);
			$version = substr($version,0,1).'.'.substr($version,1,1);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_opera_mini()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match("/Opera Mini/",$ua))
		{
			$this->browser['browser']['title'] = 'Opera Mini';
			$version = "/Opera Mini\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Opera Mini/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_firefox_desctop()
	{
		$this->browser['browser']['title'] = 'Mozilla Firefox';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Firefox\/[0-9.]{1,8}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Firefox/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_chrome_desctop()
	{
		$this->browser['browser']['title'] = 'Google Chrome';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Chrome\/[0-9.]{1,15}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Chrome/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_chromium_desctop()
	{
		$this->browser['browser']['title'] = 'Chromium';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Chromium\/[0-9.]{1,15}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Chromium/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_safari_mobile()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Safari/',$ua))
		{
			$this->browser['browser']['title'] = 'Safari mobile';
			$version = "/Version\/[0-9.]{1,12}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Version/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_safari()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Safari/',$ua))
		{
			$this->browser['browser']['title'] = 'Safari';
			$version = "/Version\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Version/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_amaya()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/amaya/',$ua))
		{
			$this->browser['browser']['title'] = 'amaya';
			$version = "/amaya\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('amaya/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_camino()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Camino/',$ua))
		{
			$this->browser['browser']['title'] = 'Camino';
			$version = "/Camino\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Camino/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_epiphany()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Epiphany/',$ua))
		{
			$this->browser['browser']['title'] = 'Epiphany';
			$version = "/Epiphany\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Epiphany/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_flock()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Flock/',$ua))
		{
			$this->browser['browser']['title'] = 'Flock';
			$version = "/Epiphany\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Flock/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_konqueror()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Konqueror/',$ua))
		{
			$this->browser['browser']['title'] = 'Konqueror';
			$version = "/Konqueror\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Konqueror/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_ie()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/MSIE [0-9.]{1,10}/',$ua))
		{
			$this->browser['browser']['title'] = 'Internet Explorer';
			$version = "/MSIE [0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('MSIE ','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_os()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		
		/* pattern part start */
		
		$ubuntu = "/Ubuntu/"; /* Ubuntu */
		$debian = "/Debian/"; /* Debian */
		$linux = "/X11/"; /* Linux */
		$ios = "/(CPU iPhone|CPU OS [0-9_]{2,10} like Mac OS X)/"; /* iOS */
		$windows = "/(Windows|Win|WIN)/"; /* Windows */
		$macos = "/Mac OS X/"; /* Mac OS X */ 
		$android = "/Android/"; /* Android */
		$symbian = "/(SymbOS|Symbian OS)/"; /* Symbian */
		/* pattern part end */
		if(preg_match($ubuntu,$ua))
		{
			$this->browser['os']['title'] = 'Ubuntu';
			$v = "/Ubuntu\/[0-9.]{2,5}/";
			if(preg_match($v,$ua))
			{
				preg_match($v,$ua,$result);
				$version = $result[0];
				$version = str_replace('Ubuntu/','',$version);
				$this->browser['os']['version'] = $version;
			}
		}
		else
		if(preg_match($debian,$ua))
		{
			$this->browser['os']['title'] = 'Debian';
			$v = "/Debian-\/[0-9.-]{2,10}/";
			if(preg_match($v,$ua))
			{
				preg_match($v,$ua,$result);
				$version = $result[0];
				$version = str_replace('Debian','',$version);
				$version = str_replace('-','',$version);
				$this->browser['os']['version'] = $version;
			}
		}
		else
		if(preg_match($linux,$ua))
		{
			$this->browser['os']['title'] = 'Linux';
		}
		if(preg_match($ios,$ua))
		{
			$this->browser['os']['title'] = 'iOS';
			$v = "/OS [0-9_]{2,10}/";
			preg_match($v,$ua,$result);
			$version = $result[0];
			$version = str_replace('OS ','',$version);
			$version = str_replace('_','.',$version);
			$this->browser['os']['version'] = $version;
		}
		else
		if(preg_match($windows,$ua))
		{
			$this->browser['os']['title'] = 'Windows ';
			$win2000 = '(NT 5.0|2000|NT 5.01)'; /* Windows 2000 */
			$me = '9x 4.90'; /* Windows ME (Millenium Edition) */
			$win95 = '(Windows |Win)95'; /* Windows 95 */
			$win98 = '(Windows |Win)98'; /* Windows 98 */
			$win8 = '/NT 6.2/'; /* Windows 8 */
			$win7 = '/NT 6.1/'; /* Windows 7 */
			$vista = '/NT 6.0/'; /* Windows Vista */
			$xp = '/NT (5.1|5.2)/'; /* Windows XP */
			$mobile = '/(Mobile|CE)/'; /* Windows Mobile */
			
			if(preg_match($win2000,$ua))
			{
				$this->browser['os']['title'] .= '2000';
			}
			else
			if(preg_match($me,$ua))
			{
				$this->browser['os']['title'] .= 'ME';
			}
			else
			if(preg_match($win95,$ua))
			{
				$this->browser['os']['title'] .= '95';
			}
			else
			if(preg_match($win98,$ua))
			{
				$this->browser['os']['title'] .= '98';
			}
			else
			if(preg_match($win7,$ua))
			{
				$this->browser['os']['title'] .= '7';
			}
			else
			if(preg_match($vista,$ua))
			{
				$this->browser['os']['title'] .= 'Vista';
			}
			else
			if(preg_match($xp,$ua))
			{
				$this->browser['os']['title'] .= 'XP';
			}
			else
			if(preg_match($win8,$ua))
			{
				$this->browser['os']['title'] .= '8';
			}
			else
			if(preg_match($mobile,$ua))
			{
				$this->browser['os']['title'] .= 'Mobile';
			}
		}
		else
		if(preg_match($macos,$ua))
		{
			$this->browser['os']['title'] = 'Mac OS X';
			$v = '/Mac OS X [0-9_.]{2,10}/';
			preg_match($v,$ua,$result);
			$version = $result[0];
			$version = str_replace('OS ','',$version);
			$version = str_replace('_','.',$version);
			$this->browser['os']['version'] = $version;
		}
		else
		if(preg_match($android,$ua))
		{
			$this->browser['os']['title'] = 'Android';
			$v = '/Android [0-9_.]{2,10}/';
			if(preg_match($v,$ua,$result))
			{
				preg_match($v,$ua,$result);
				$version = $result[0];
				$version = str_replace('Android ','',$version);
				$this->browser['os']['version'] = $version;
			}
		}
		else
		if(preg_match($symbian,$ua))
		{
			$this->browser['os']['title'] = 'Symbian';
		}
	}
}
$browser = new browser();
echo '<br>';
foreach($browser->browser as $key => $value)
{
echo $key.': '.$value.'<br>';	
}
echo '[Browser]<br>';
foreach($browser->browser['browser'] as $key => $value)
{
echo $key.': '.$value.'<br>';	
}
if(isset($browser->browser['os']))
{
echo '[OS]<br>';
foreach($browser->browser['os'] as $key => $value)
{
echo $key.': '.$value.'<br>';	
}
}
?>
