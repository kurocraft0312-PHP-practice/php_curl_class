<?php
require_once('check/check.php');

// HTMLをパースする：https://pulogu.net/blog/020-computer/php/php-xml-data-read-parse-test/
$sURL = simplexml_load_file("https://news.yahoo.co.jp/rss/topics/it.xml");
echo $sURL->channel[0]->description;

// var_test($sURL);


$conn = curl_init();
// var_test($conn);
curl_setopt($conn,CURLOPT_URL,$sURL);
curl_setopt($conn,CURLOPT_RETURNTRANSFER,true);
curl_setopt($conn,CURLOPT_TIMEOUT,5);
curl_setopt($conn,CURLOPT_HEADER,false); 

$ret = curl_exec($conn);
// $RSSinfo = curl_getinfo($conn); // HTTP情報を仮で取得
curl_close($conn);

// TODO:XPathで動作テストする
$domDocument = new DOMDocument();
$html_src = mb_convert_encoding($ret,"HTML-ENTITIES","auto");
@$domDocument->loadHTML($html_src);
// $xpath 

// var_test($RSSinfo);

// simplexml_load_string: XML文字列をオブジェクトに代入する
$xml = simplexml_load_string($ret);
// MEMO:API内にある<channel>要素の中にある<item>要素から<title>要素を取得している
foreach($xml->channel->item as $item) {
    echo (string)$item->title."\n";
}
?>