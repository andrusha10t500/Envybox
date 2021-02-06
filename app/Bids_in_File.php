<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 05.02.21
 * Time: 14:15
 */

namespace App;

use Illuminate\Support\Facades\Storage;

//класс Bids_in_File унаследован от Bids
class Bids_in_File extends Bids
{
    //Имеет свойства
    private $name, $phone, $appeal;
    //Конструктор
    public function __construct($nm, $ph, $ap)
    {
        $this->name=$nm;
        $this->phone=$ph;
        $this->appeal=$ap;
    }
    //Унаследованный метод от Bids который возвращает интерфейс Bid
    function addBid(): Bid
    {
        return new Bid_in_File_conn($this->name, $this->phone, $this->appeal);
    }
}

//Класс Bid_in_File_conn подключается к интерфейсу Bid для того что бы переопределить метод insert:
class Bid_in_File_conn implements Bid
{
    //свойства
    private $name, $phone, $appeal;
    //Конструктор
    public function __construct($nm, $ph, $ap)
    {
        $this->name=$nm;
        $this->phone=$ph;
        $this->appeal=$ap;
    }
    //Унаследованный метод
    public function insert()
    {
        //Задаём контент для файла
        $content =  ' Имя: ' . $this->name .
                    ' Телефон: ' . $this->phone .
                    ' Обращение: ' . $this->appeal;

        //Путь к файлу и сам файл
        $filepath = '/Bids/file';

        //Если уже файл существует, то добавляем запись, в проитвном случае создаём
        if(Storage::disk('local')->exists($filepath)) {

            Storage::disk('local')->append($filepath,$content);
        } else {

            Storage::disk('local')->put($filepath,$content);
        }
    }

}
