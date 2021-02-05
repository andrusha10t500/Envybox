<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 05.02.21
 * Time: 14:15
 */

namespace App;

use Illuminate\Support\Facades\Storage;

class Bids_in_File extends Bids
{
    private $name, $phone, $appeal;

    public function __construct($nm, $ph, $ap)
    {
        $this->name=$nm;
        $this->phone=$ph;
        $this->appeal=$ap;
    }

    function addBid(): Bid
    {
        return new Bid_in_File_conn($this->name, $this->phone, $this->appeal);
    }
}

class Bid_in_File_conn implements Bid
{
    private $name, $phone, $appeal;

    public function __construct($nm, $ph, $ap)
    {
        $this->name=$nm;
        $this->phone=$ph;
        $this->appeal=$ap;
    }

    public function insert()
    {
        $content =  ' Имя: ' . $this->name .
                    ' Телефон: ' . $this->phone .
                    ' Обращение: ' . $this->appeal;

        $filepath = '/Bids/file';

        if(is_file($filepath)) {

            Storage::disk('local')->append($filepath,$content);
        } else {

            Storage::disk('local')->put($filepath,$content);
        }
    }

}