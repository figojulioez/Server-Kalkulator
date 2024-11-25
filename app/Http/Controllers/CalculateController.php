<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
    public function kalkulasiTunggal () {
        $perhitungan = request("perhitungan");
        $query = "SELECT $perhitungan AS result";

        $hasil = DB::scalar($query);

        return response()->json($hasil);
    }

    public function kalkulasiBanyak () {
        $perhitungan = request("perhitungan");
        $kirimHasil = [];
        foreach($perhitungan as $indexS => $key) {
            $hasilSementara = [];
            foreach($key as $index => $hitung) {
                if ($indexS !== 0) {

                    if ( $index !== count($key) - 1 ) {
                        $hasilSementara[] = $hitung;
                    } else {
                        $hasilSementara[] = DB::scalar("SELECT $hitung AS result");
                    }

                } else if ($indexS == 0) {
                    $hasilSementara[] = $hitung; 
                }
            }
            $kirimHasil[] = $hasilSementara;
        }

        return response()->json($kirimHasil);

    }
}
