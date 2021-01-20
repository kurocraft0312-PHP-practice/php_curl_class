<?php
require_once('check/check.php');

$sURL = "https://news.yahoo.co.jp/rss/topics/it.xml";

$conn = curl_init();
curl_setopt($conn,CURLOPT_URL,$sURL);
curl_setopt($conn,CURLOPT_RETURNTRANSFER,true);
curl_setopt($conn,CURLOPT_TIMEOUT,5);
curl_setopt($conn,CURLOPT_HEADER,false);
$ret = curl_exec($conn);
$RSSinfo = curl_getinfo($conn); // RSS情報を仮で取得
curl_close($conn);

var_test($RSSinfo);


// simplexml_load_string: XML文字列をオブジェクトに代入する
$xml = simplexml_load_string($ret);
// MEMO:API内にある<channel>要素の中にある<item>要素から<title>要素を取得している
foreach($xml->channel->item as $item) {
    echo (string)$item->title."\n";
}
?>