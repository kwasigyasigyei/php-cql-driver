<?php
/**
 * Represets a single column
 *
 * Responsible for:
 *  - Representing a single column from a CQL result
 *  - Yielding the column name or value when required
 *
 * Thoughts:
 *  - Do we need timestamp here?
 *  - Why do we attach CF/KS to other result objects but not this one?
 *  - We should keep data private
 *  - To implement $column->name and/or $column->value type API we could use
 *    magic methods to pick up these calls. Or we could stick with getName()
 *    and getValue() as I've done here.
 */
class Column
{
    /**
     * Column name
     * @var string
     */
    private $name;

    /**
     * Column value
     * @var string
     */
    private $value;

    /**
     * Constructor
     *
     * @param string $name      The column name
     * @param string $value     The column value
     */
    public function __construct(
            $name,
            $value
            )
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get column name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get column value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Convert to string
     *
     * We return _just_ the column value here, because it allows us to grab a
     * single column from the column collection by name and then easily access
     * the value of this column.
     *
     * <code>
     * echo $columns->getColumn('foo');
     * </code>
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
