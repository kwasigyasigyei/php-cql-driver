<?php
/**
 * Represets a single row
 *
 * Responsible for:
 *  - Representing a single row from a CQL result
 *  - Yielding columns sequentially via Iterator interface
 *
 * Collaborates with:
 *  - ColumnsProxy (containment; we contain a list of columns)
 *    (@todo not sure about supercolumns here; what happens there?)
 *
 * Thoughts:
 *  - When comparing to Python implementation, we could construct the object
 *    fully-formed and hence pass in a ColumnsProxy object of pre-decoded
 *    columns; this removes knowledge of the "decoding" functionality from
 *    this object. This is how I've done it here.
 *  - One possible reason to pass down the "decoder" is for lazy-decoding;
 *    although I haven't figured out what that is yet really.
 */
class Row implements Iterator
{
    /**
     * Keyspace
     * @var string
     */
    private $keyspace;

    /**
     * Column family
     * @var string
     */
    private $columnFamily;

    /**
     * Row key
     * @var string
     */
    private $rowKey;

    /**
     * Columns
     * @var ColumnsProxy
     */
    private $columns;

    /**
     * Constructor
     *
     * @param string $keyspace          The keyspace that this row is part of
     * @param string $columnFamily      The column family this row is part of
     * @param string $rowKey            The row key
     * @param ColumnsProxy $columns     An iteratable list of columns
     */
    public function __construct(
            $keyspace,
            $columnFamily,
            $rowKey,
            ColumnsProxy $columns
            )
    {
        $this->keyspace = $keyspace;
        $this->columnFamily = $columnFamily;
        $this->rowKey = $rowKey;
        $this->columns = $columns;
    }

    public function current()
    {
        return $this->columns->current();
    }

    public function key()
    {
        return $this->columns->key();
    }

    public function next()
    {
        $this->columns->next();
    }

    public function rewind()
    {
        $this->columns->rewind();
    }

    public function valid()
    {
        return $this->columns->valid();
    }
}
