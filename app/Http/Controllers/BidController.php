<?php

namespace App\Http\Controllers;

use App\Bids_in_DB;
use App\Bids_in_File;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index(Request $request) {

        //Валидация
        $this->validate($request,[
            'name' => 'required|min:4',
            'phone' => 'required',
            'appeal' => 'required'
        ]);

        //Saving in DB
        $this->saving_in_bd(new Bids_in_DB(
            $request['name'],
            $request['phone'],
            $request['appeal']
        ));

        //Saving in file
        $this->saving_in_file(new Bids_in_File(
            $request['name'],
            $request['phone'],
            $request['appeal']
        ));

        return response()->json(['data' => 'Заявка добавлена!']);
    }

    private function saving_in_bd(Bids_in_DB $bidb) {
        $bidb->post();
    }

    private function saving_in_file(Bids_in_File $bif) {
        $bif->post();
    }
}
