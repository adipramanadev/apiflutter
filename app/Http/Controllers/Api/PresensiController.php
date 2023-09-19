<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
        //getPresensi
        public function getPresensi(){
            //membaca data presensi yang dimiliki user
        $presensi = Presensi::where('user_id',Auth::user()->id)->get(); //array,
        //select * from presensi where user_id = uid
        //membaca pengulangan data presensi lalu menampilkan hari ini
        foreach ($presensi as $key) {
            if($key->tanggal == date('Y-m-d')){
                $key->is_hari_ini = true;
            }else{
                $key->is_hari_ini = false;
            }

            $datetime = Carbon::parse($key->tanggal)->locale('id');
            $masuk = Carbon::parse($key->masuk)->locale('id');
            $pulang = Carbon::parse($key->pulang)->locale('id');

            $key->tanggal = $datetime->translatedFormat('l, d F Y');
            $key->masuk = $masuk->translatedFormat('H:i');
            $key->pulang = $pulang->translatedFormat('H:i');
        }

        //mengembalikan data presensi bentuk json
        return response()->json([
            'success'=>true,
            'data'=>$presensi,
            'message'=>'Sukses mendapatkan data presensi'
        ]);
    }

}
