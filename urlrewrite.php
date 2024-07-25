<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/news/([0-9]{2}.[0-9]{2}.[0-9]{4})/([^/]+)/?#',
    'RULE' => 'DATE_OF_FUTURE=$1&CODE=$2',
    'ID' => '',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
);
