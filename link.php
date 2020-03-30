<center>
<pre>
<?php
  // link.php?v4t1&backlinks=https://t13r.blogspot.com/&my=https://v4t1.eu
  error_reporting(0);
  set_time_limit(900);
  if(isset($_GET['v4t1']))
  {
    $error=1;                      

    $target_url = $_GET['backlinks'];

    $url2=$_GET['my'];

    $userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
  
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

    curl_setopt($ch, CURLOPT_URL,$target_url);

    curl_setopt($ch, CURLOPT_FAILONERROR, true);

    curl_setopt($ch, CURLOPT_AUTOREFERER, true);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $html= curl_exec($ch);

if (!$html) {

    echo "<br />ERROR " .curl_errno($ch);

    echo "<br />ERROR " . curl_error($ch);

    exit; 

}

$dom = new DOMDocument();

@$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

$hrefs = $xpath->evaluate("/html/body//a");

for ($i = 0; $i < $hrefs->length; $i++) {

  $href = $hrefs->item($i);

  $url = $href->getAttribute('href');

  $rel = $href->getAttribute('rel');

  $length=strlen($url2);

  $changethis=substr($url2,0 , $length);

  $length2=strlen($url);

  $changethis2=substr($url,0 , $length);

  if($changethis2==$changethis)
  {

      echo "<br /><font color='green'>BACKLINK VAR -> FOUND -> </font><strong> $target_url </strong>";

      $error=0;

  }
} 

if($error <>0) {
  echo "<br /><font color='red'>BACKLINK YOK / NOT FOUND</font>";        
}
echo "</div>";

  }
?>
</div>
</pre>
