<?php
$GLOBALS['THRIFT_ROOT'] = 'thrift';
require_once $GLOBALS['THRIFT_ROOT'].'/packages/cassandra/Cassandra.php';
require_once $GLOBALS['THRIFT_ROOT'].'/packages/cassandra/cassandra_types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TFramedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';

try {
  // Make a connection to the Thrift interface to Cassandra
  $socket = new TSocket('127.0.0.1', 9160);
  $transport = new TFramedTransport($socket, true, true);
  $protocol = new TBinaryProtocolAccelerated($transport);
  $client = new CassandraClient($protocol);
  $transport->open();

print $client->describe_version();
} catch (TException $tx) {
   print 'TException: '.$tx->why. ' Error: '.$tx->getMessage() . "\n";
}
?>