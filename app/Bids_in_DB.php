<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 05.02.21
 * Time: 21:49
 */

namespace App;


class Bids_in_DB extends Bids
{
    public $name;
    public $phone;
    public $appeal;

    public function __construct($nm, $ph, $ap)
    {
        $this->name = $nm;
        $this->phone = $ph;
        $this->appeal = $ap;
    }

    function addBid(): Bid
    {
        return new Bids_in_DB_conn($this->name, $this->phone, $this->appeal);
    }
}

class Bids_in_DB_conn implements Bid {

    public $name;
    public $phone;
    public $appeal;

    public function __construct($nm, $ph, $ap)
    {
        $this->name = $nm;
        $this->phone = $ph;
        $this->appeal = $ap;
    }

    public function insert()
    {
        $Bids = new Bid_Model();

        $Bids->name = $this->name;
        $Bids->phone = $this->phone;
        $Bids->appeal = $this->appeal;

        $Bids->save();
    }
}