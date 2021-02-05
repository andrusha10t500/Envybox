<?php

namespace App\Http\Controllers;

use App\Bids_in_DB;
use App\Bids_in_File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    public function index(Request $request) {

        //Валидация
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'phone' => 'numeric|digits_between:6,11',
            'appeal' => 'required'
        ]);
        if(!$validate->fails()) {

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

            return response()->json(['data' => 'Заявка добавлена!'],200);
        } else {
            return response()->json(['error' => 'Ошибка валидации'],200);
        }


    }

    private function saving_in_bd(Bids_in_DB $bidb) {
        $bidb->post();
    }

    private function saving_in_file(Bids_in_File $bif) {
        $bif->post();
    }
}
