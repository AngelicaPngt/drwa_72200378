<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class PresensiHarianController extends Controller{

    public function getDataHarian(){
        $ambildata = DB::table('presensi_harian')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Harian" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataHarianToken(){
        /*$token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);
        print_r("---------");
        print_r($hash_token);
        exit;*/

        $ambildata = DB::table('presensi_harian')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Harian" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataHarianById($id){
        $ambildata = DB::table('presensi_harian')
            ->where('id_presensi_harian', $id)
            ->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Harian" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function insertDataHarian(request $request){
         $array = array(
            'tahun_akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'tanggal' => $request->input('tanggal'),
            'hari' => $request->input('hari'),
            'id_guru' => $request->input('id_guru'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
            'metode' => $request->input('metode'),
            'keterangan' => $request->input('keterangan')
        );
        
        DB::table('presensi_harian')->insert($array);    

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil ditambahkan"
                ]
                ],200
        );
    }

    public function updateDataHarian(request $request){
        DB::table('presensi_harian')->where('id_presensi_harian', $request->input('id_presensi_harian'))->update([
            'tahun_akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'tanggal' => $request->input('tanggal'),
            'hari' => $request->input('hari'),
            'id_guru' => $request->input('id_guru'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
            'metode' => $request->input('metode'),
            'keterangan' => $request->input('keterangan')
        ]);

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil diubah"
                ]
                ],200
        );
    }

    public function deleteDataHarian(request $request){
        DB::table('presensi_harian')->where('id_presensi_harian', $request->input('presensi_harian'))->delete();
        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil dihapus"
                ]
                ],200
        );
    }
}
?>