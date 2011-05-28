<?php
class Product extends Zend_Db_Table_Abstract
{
    /**
    * The default table name
    */
    protected $_name = 'product';

    /**
    * Dependent tables
    */
    protected $_dependentTables = array('OrderItem');

    /**
    * Reference map
    */
    protected $_referenceMap = array
    (
        array(
            'refTableClass' => 'User',
            'refColumns' => 'user_id',
            'columns' => 'user_id',
        )
    );

    /**
    * findByPriceRange
    *
    * @param float $minimumPrice
    * @param float $maximumPrice
    */
    public function findByPriceRange($minimumPrice, $maximumPrice)
    {
        $select = $this->select()
                       ->from($this->_name)
                       ->where('value > ?', $minimumPrice)
                       ->where('value < ?', $maximumPrice)
                       ->order('value ASC');

        return $this->fetchAll($select);
    }

    /**
    * getLatest
    *
    * @param int $limit
    */
    public function getLatest($limit)
    {
        $select = $this->select()
                       ->from($this->_name)
                       ->order('product_id DESC')
                       ->limit($limit);

        return $this->fetchAll($select);
    }
}