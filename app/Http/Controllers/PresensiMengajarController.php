<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class PresensiMengajarController extends Controller{

    public function getDataMengajar(){
        $ambildata = DB::table('presensi_mengajar')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Mengajar" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataMengajarToken(){
        /*$token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);
        print_r("---------");
        print_r($hash_token);
        exit;*/

        $ambildata = DB::table('presensi_mengajar')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Mengajar" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataMengajarById($id){
        $ambildata = DB::table('presensi_mengajar')
            ->where('id_presensi_mengajar', $id)
            ->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Presensi Mengajar" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function insertDataMengajar(request $request){
         $array = array(
            'id_jadwal_guru' => $request->input('id_jadwal_guru'),
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'metode' => $request->input('metode'),
            'keterangan' => $request->input('keterangan')
        );
        
        DB::table('presensi_mengajar')->insert($array);    

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil ditambahkan"
                ]
                ],200
        );
    }

    public function updateDataMengajar(request $request){
        DB::table('presensi_mengajar')->where('id_presensi_mengajar', $request->input('id_presensi_mengajar'))->update([
            'id_jadwal_guru' => $request->input('id_jadwal_guru'),
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
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

    public function deleteDataMengajar(request $request){
        DB::table('presensi_mengajar')->where('id_presensi_mengajar', $request->input('presensi_mengajar'))->delete();
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