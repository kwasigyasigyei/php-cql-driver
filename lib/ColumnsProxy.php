<?php
/**
 * Represets a list of columns
 *
 * Responsible for:
 *  - Representing a number of columns from a CQL result
 *  - Yielding columns sequentially via Iterator interface
 *
 * Collaborates with:
 *  - Column (containment; we contain an array of invidual columns)
 *
 * Thoughts:
 *  - Does it make sense to have KS, CF attached to each result object?
 *  - Is it possible to have an iterator of columns from differnt KS/CF? (does
 *    this even make sense?)
 *  - It would be nice to be able to ask the columns proxy for a single column
 *    by name, for situations where this is is useful (eg: the colum names
 *    aren't TIME UUID!) Something like $columns->getColumn('foo'), or perhaps
 *    $columns->foo if we want to be more magic (I think I'd prefer the first,
 *    but the second is probably more how PHP devs imagine things should be?)
 */
class ColumnsProxy implements Iterator
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
     * Columns; format of array: [] = Column
     * @var array
     */
    private $columns;

    /**
     * Constructor
     *
     * @param string $keyspace          The keyspace these rows are part of
     * @param string $columnFamily      The column family these rows are part of
     * @param array $columns            An array of the columns; format of array:
     *                                  [] = Column
     */
    public function __construct(
            $keyspace,
            $columnFamily,
            array $columns
            )
    {
        $this->keyspace = $keyspace;
        $this->columnFamily = $columnFamily;
        $this->columns = $columns;
    }

    public function current()
    {
        return current($this->columns);
    }

    public function key()
    {
        return key($this->columns);
    }

    public function next()
    {
        next($this->columns);
    }

    public function rewind()
    {
        reset($this->columns);
    }

    public function valid()
    {
        // @todo probably cruft; check
        return key($this->columns) !== FALSE;
    }
}
