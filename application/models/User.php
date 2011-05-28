<?php
class User extends Zend_Db_Table_Abstract
{
    /**
    * The default table name
    */
    protected $_name = 'user';

    /**
    * Dependent tables
    */
    protected $_dependentTables = array('Product', 'Order');

    /**
    * findByPartialName
    *
    * @param string $name
    */
    public function findByPartialName($name)
    {
        $select = $this->select()
                       ->from($this->_name)
                       ->where('name like ?', "%{$name}%")
                       ->order('name ASC');

        return $this->fetchAll($select);
    }

    /**
    * findByEmail
    *
    * @param string $email
    */
    public function findByEmail($email)
    {
        $select = $this->select()
                       ->from($this->_name)
                       ->where('email = ?', $email);

        return $this->fetchRow($select);
    }
}