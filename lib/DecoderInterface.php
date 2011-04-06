<?php
/**
 * Decoder interface
 *
 * A decoder is responsible for translating the raw response from the transport
 * layer into a useable result (eg: RowsProxy, Row, ColumnsProxy, Column
 * objects - where appropriate). It handles any decoding of the raw data.
 *
 * @todo this is where most of the work is within Python implementation. It
 * looks like it uses the "marshall" functionality (inherits?) to achieve this.
 * I'd like to be able
 */
interface DecoderInterface
{
    /**
     * @todo explain what this actually does in detail
     *
     *
     * @param <type> $keyspace
     * @param <type> $columnFamily
     * @param <type> $name
     * @param <type> $value
     *
     * @return @todo explain
     */
    public function decodeColumn(
            $keyspace,
            $columnFamily,
            $name,
            $value
            );
}