<?php

$keyword = $_GET["keyword"]; // first word
$from = $_GET["from"]; // the sms sender
$text = $_GET["text"]; // the remaining text after the first word
$timestamp = time();

echo "keyword: {$keyword} <br/>";
echo "from: {$from} <br/>";
echo "text: {$text} <br/>";
echo "timestamp: {$timestamp} <br/>";
