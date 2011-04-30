<?php

include_once 'Connection.php';
$conn = new Connection();
$client = $conn->getRawThriftClient();
//print $client->describe_version;
//print_r($client->describe_keyspaces());
try
{
    $query = "CREATE KEYSPACE Keyspace4Drop WITH strategy_options:replication_factor = '1'
                   AND strategy_class = 'SimpleStrategy'";
    $client->execute_cql_query($query, 2);
}
catch (TException $tx)
{
    print 'TException: ' . $tx->getMessage();
    print_r($tx->getTrace());
}