<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: liguo
 * Date: 14-11-24
 * Time: 下午4:06
 */
include('include/xmltofrom.php');

define('DB_PATH', 'common/db.xml', true);
$xml_obj = new XmlToFrom(DB_PATH);

var_dump($xml_obj->toFrom());