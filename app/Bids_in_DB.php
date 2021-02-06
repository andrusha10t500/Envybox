<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 05.02.21
 * Time: 21:49
 */

namespace App;

//Bids_in_DB унаследован от Bids
class Bids_in_DB extends Bids
{
    //Имеет свойства:
    private $name;
    private $phone;
    private $appeal;

    //Конструктор
    public function __construct($nm, $ph, $ap)
    {
        $this->name = $nm;
        $this->phone = $ph;
        $this->appeal = $ap;
    }

    //Унаследованный метод который возвращает интерфейс Bid
    function addBid(): Bid
    {
        return new Bids_in_DB_conn($this->name, $this->phone, $this->appeal);
    }
}

//Класс Bids_in_DB_conn подключается к интерфейсу Bid для того что бы переопределить метод insert:
class Bids_in_DB_conn implements Bid {

    //Свойства
    private $name;
    private $phone;
    private $appeal;
    //Конструктор
    public function __construct($nm, $ph, $ap)
    {
        $this->name = $nm;
        $this->phone = $ph;
        $this->appeal = $ap;
    }
    //Унаследованный метод
    public function insert()
    {
        //унаследовались от модели Bid_Model
        $Bids = new Bid_Model();
        //заполнили поля модели
        $Bids->name = $this->name;
        $Bids->phone = $this->phone;
        $Bids->appeal = $this->appeal;

        //Сохранили в бд
        $Bids->save();
    }
}
