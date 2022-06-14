<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class GuruController extends Controller{

    public function getDataGuru(){
        $ambildata = DB::table('guru')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataGuruToken(){
        /*$token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);
        print_r("---------");
        print_r($hash_token);
        exit;*/

        $ambildata = DB::table('guru')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataGuruById($id){
        $ambildata = DB::table('guru')
            ->where('id_guru', $id)
            ->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Guru" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function insertDataGuru(request $request){
        /*DB::table('dosen')->insert([
            'nidn' => $request->input('nidn'),
            'nama' => $request->input('nama'),
            'status' => $request->input('status'),
            'jafung' => $request->input('jafung'),
            'pakar' => $request->input('pakar')
        ]);*/

        $array = array(
            'rfid' => $request->input('rfid'),
            'nip' => $request->input('nip'),
            'nama_guru' => $request->input('nama_guru'),
            'alamat' => $request->input('alamat'));
        
        DB::table('guru')->insert($array);    

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil ditambahkan"
                ]
                ],200
        );
    }

    public function updateDataGuru(request $request){
        DB::table('guru')->where('id', $request->input('id'))->update([
            'rfid' => $request->input('rfid'),
            'nip' => $request->input('nip'),
            'nama_guru' => $request->input('nama_guru'),
            'alamat' => $request->input('alamat')
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

    public function deleteDataGuru(request $request){
        DB::table('guru')->where('id', $request->input('id'))->delete();
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