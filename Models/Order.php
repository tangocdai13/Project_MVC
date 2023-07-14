<?php

class Order extends Model
{
    const TABLE = 'orders';

    public function __construct()
    {
        parent::__construct();
        $this->setTable(static::TABLE);
    }
}