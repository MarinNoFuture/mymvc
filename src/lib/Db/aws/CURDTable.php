<?php
namespace lib\Db\aws;

use Aws\DynamoDb\Exception\DynamoDbException;
use lib\Db\aws\Db;

class CURDTable extends Db
{
    private $response;

    public function createTab($tableName)
    {
        try {
            $this->response = $this->dynamodb->createTable([
                'TableName' => $tableName,
                'AttributeDefinitions' => [
                    [
                        'AttributeName' => 'Id',
                        'AttributeType' => 'N'
                    ]
                ],
                'KeySchema' => [
                    [
                        'AttributeName' => 'Id',
                        'KeyType' => 'HASH'  //Partition key
                    ]
                ],
                'ProvisionedThroughput' => [
                    'ReadCapacityUnits'    => 5,
                    'WriteCapacityUnits' => 6
                ]
            ]);

            $this->dynamodb->waitUntil('TableExists', [
                'TableName' => $tableName,
                '@waiter' => [
                    'delay'       => 5,
                    'maxAttempts' => 20
                ]
            ]);

            print_r($this->response->getPath('TableDescription'));

            echo "table $tableName has been created.\n";
        } catch (DynamoDbException $e) {
            echo $e->getMessage() . "\n";
            exit ("Unable to create table $tableName\n");
        }
    }

    public function updateTab($tableName)
    {
        try {

            $this->response = $this->dynamodb->updateTable([
                'TableName' => $tableName,
                'ProvisionedThroughput'    => [
                    'ReadCapacityUnits'    => 6,
                    'WriteCapacityUnits' => 7
                ]
            ]);

            $this->dynamodb->waitUntil('TableExists', [
                'TableName' => $tableName,
                '@waiter' => [
                    'delay'       => 5,
                    'maxAttempts' => 20
                ]
            ]);

            echo "New provisioned throughput settings:\n";

            $this->response = $this->dynamodb->describeTable(['TableName' => $tableName]);

            echo "Read capacity units: " .
                $this->response['Table']['ProvisionedThroughput']['ReadCapacityUnits']."\n";
            echo "Write capacity units: " .
                $this->response['Table']['ProvisionedThroughput']['WriteCapacityUnits']."\n";

        } catch (DynamoDbException $e) {
            echo $e->getMessage() . "\n";
            exit ("Unable to update table $tableName\n");
        }
    }

    public function deleteTab($tableName)
    {
        try {
            echo "# Deleting table $tableName...\n";

            $this->response = $this->dynamodb->deleteTable([ 'TableName' => $tableName]);

            $this->dynamodb->waitUntil('TableNotExists', [
                'TableName' => $tableName,
                '@waiter' => [
                    'delay'       => 5,
                    'maxAttempts' => 20
                ]
            ]);
            echo "The table has been deleted.\n";

        } catch (DynamoDbException $e) {
            echo $e->getMessage() . "\n";
            exit ("Unable to delete table $tableName\n");
        }
    }

    public function listTab()
    {
        $tables = [];
        unset($this->response);

        do {
            if (isset($response)) {
                $params = [
                    'Limit' => 2,
                    'ExclusiveStartTableName' => $response['LastEvaluatedTableName']
                ];
            }else {
                $params = ['Limit' => 2];
            }

            $response = $this->dynamodb->listTables($params);

            foreach ($response['TableNames'] as $key => $value) {
                echo "\n$value\n";
            }

            $tables = array_merge($tables, $response['TableNames']);

        } while ($response['LastEvaluatedTableName']);

        return $tables;
    }
}