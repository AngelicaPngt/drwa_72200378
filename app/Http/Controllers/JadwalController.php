<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class JadwalController extends Controller{

    public function getDataJadwal(){
        $ambildata = DB::table('jadwal_guru')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Jadwal Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataJadwalToken(){
        /*$token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);
        print_r("---------");
        print_r($hash_token);
        exit;*/

        $ambildata = DB::table('jadwal_guru')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Jadwal Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataJadwalById($id){
        $ambildata = DB::table('jadwal_guru')
            ->where('id_jadwal_guru', $id)
            ->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Jadwal Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function insertDataJadwal(request $request){
         $array = array(
            'tahun akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'id_guru' => $request->input('id_guru'),
            'hari' => $request->input('hari'),
            'id_kelas' => $request->input('id_kelas'),
            'id_mapel' => $request->input('id_mapel'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai')
        );
        
        DB::table('jadwal_guru')->insert($array);    

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil ditambahkan"
                ]
                ],200
        );
    }

    public function updateDataJadwal(request $request){
        DB::table('jadwal_guru')->where('id_jadwal_guru', $request->input('id_jadwal_guru'))->update([
            'tahun akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'id_guru' => $request->input('id_guru'),
            'hari' => $request->input('hari'),
            'id_kelas' => $request->input('id_kelas'),
            'id_mapel' => $request->input('id_mapel'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai')
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

    public function deleteDataJadwal(request $request){
        DB::table('jadwal_guru')->where('id_jadwal_guru', $request->input('id_jadwal_guru'))->delete();
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