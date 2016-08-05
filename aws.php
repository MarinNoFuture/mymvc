<?php
//自己写的autoload class
//require_once 'autoload.php';
require 'vendor/autoload.php';
date_default_timezone_set('UTC');

use lib\Db\aws\CURDTable;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
use lib\Decorator\HelloDecorator;

try {
    $param = Yaml::parse(file_get_contents('config/sdk.yml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}
$decorator = new HelloDecorator('Marvin');
$sdk = new Aws\Sdk($param);
####################################################################
# List all table names for this AWS account, in this region
echo "# Listing all of your tables in the current region...\n";
//// Print total number of tables
//echo "Total number of tables: \n";
$CURDTable = new CURDTable($sdk);
$decorator->before();
$tables = $CURDTable->listTab();
$decorator->after();
echo "\n";
