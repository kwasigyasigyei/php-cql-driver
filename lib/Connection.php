<?php
/**
 * Represents a single connection to a single server
 *
 * We can use this connection to actually execute CQL statements and fetch
 * results.
 *
 * Responsible for:
 *  - Establishing a transport to server (eg: via Thrift, using config)
 *  - Closing the connection
 *  - Determining if a connection is currently open, or if it has been closed
 *  - Executing CQL queries and yielding responses
 *  - Compressing CQL queries before transmission
 *
 * Collaborates with:
 *  - DecoderInterface (containment; some kind of decoder that will interpret
 *          results [check this is actually what it does])
 *  - RowsProxy (returns these as the result of a successful CQL query, if the
 *          query naturally returns N rows)
 *
 * Thoughts:
 *  - We should inject a CompressorInterface object in addition to the
 *    decoder and handle compression like this.
 * - Ideally, we would require decoder/compressor to be injected; to avoid any
 *   calls to "new" (hard to test). However end-users might prefer to be able
 *   to pass in NULL (or leave the params off the constructor) so that some
 *   kind of "default" is used. Not sure how to handle this.
 */
class Connection
{
    /**
     * Constructor
     *
     * @param string $host                      Hostname of Cassandra node.
     * @param integer $port                     Port number to connect to (optional).
     * @param string|NULL $keyspace             Keyspace name (optional).
     * @param string|NULL $username             Username used in authentication (optional).
     * @param string|NULL $password             Password used in authentication (optional).
     * @param DecoderInterface|NULL $decoder    Result decoder instance (optional, defaults to none).
     */
    public function __construct(
            $host,
            $port = 9160,
            $keyspace = NULL,
            $username = NULL,
            $password = NULL,
            DecoderInterface $decoder = NULL
            )
    {
        
    }

    /**
     * Prepare query
     *
     * This will substitute any ? with the appropriate $args element, ensuring
     * encoding etc.. is carried out correctly.
     *
     * @param string $query The query
     * @param array $args Arguments to substitute into query
     *      @todo should arguments be optional? why call this method if there
     *      are none
     *
     * @throws <something> If the query is empty (?) [fail early principle]
     */
    public function prepare(
            $query,
            array $args = array()
            )
    {
    }

    /**
     * Execute query
     *
     * @param string $query
     * @param array $args Arguments to substitute into query
     *
     * @throws CQL/InvalidRequestException
     * @throws CQL/SchemaDisagreementException
     * @throws CQL/InternalApplicationError
     */
    public function execute(
            $query,
            array $args = array(),
            array $kwargs = array()
            )
    {
    
    }

    /**
     * Test if connection open
     *
     * @return boolean
     */
    public function isOpen()
    {

    }

    /**
     * Close connection
     */
    public function close()
    {
        
    }
}