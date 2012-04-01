<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lib/class.browser.php';
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
