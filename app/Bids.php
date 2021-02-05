<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 04.02.21
 * Time: 21:44
 */

namespace App;


abstract class Bids
{
    abstract function addBid() : Bid;

    public function post() : void {
        $bid = $this->addBid();
        $bid->insert();
    }
}

interface Bid {
    public function insert();
}