<?php
/**
 * Represets a list of rows
 *
 * Responsible for:
 *  - Representing a number of rows from a CQL result
 *  - Yielding rows sequentially via Iterator interface
 *
 * Collaborates with:
 *  - Row (containment; we contain an array of invidual rows)
 *
 * Thoughts:
 *  - Does it make sense to have KS, CF attached to each result object?
 *  - Is it possible to have an iterator of rows from differnt KS/CF? (does
 *    this even make sense?)
 */
class RowsProxy implements Iterator
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
     * Rows; format of array: [] = Row
     * @var array
     */
    private $rows;

    /**
     * Constructor
     *
     * @param string $keyspace          The keyspace these rows are part of
     * @param string $columnFamily      The column family these rows are part of
     * @param array $rows               An array of the rows; format of array:
     *                                  [] = Row
     */
    public function __construct(
            $keyspace,
            $columnFamily,
            array $rows
            )
    {
        $this->keyspace = $keyspace;
        $this->columnFamily = $columnFamily;
        $this->rows = $rows;
    }

    public function current()
    {
        return current($this->rows);
    }

    public function key()
    {
        return key($this->rows);
    }

    public function next()
    {
        next($this->rows);
    }

    public function rewind()
    {
        reset($this->rows);
    }

    public function valid()
    {
        // @todo probably cruft; check
        return key($this->rows) !== FALSE;
    }
}
