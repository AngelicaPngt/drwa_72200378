<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class MapelController extends Controller{

    public function getDataMapel(){
        $ambildata = DB::table('mapel')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Mapel" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataMapelToken(){
        /*$token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);
        print_r("---------");
        print_r($hash_token);
        exit;*/

        $ambildata = DB::table('mapel')->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Mapel" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function getDataMapelById($id){
        $ambildata = DB::table('mapel')
            ->where('id_mapel', $id)
            ->get();
        if($ambildata){
            return response()->json(["User" => "Natasha Angelica",
                                    "Waktu Akses" => today(),
                                    "result" => 1,
                                    "Data Mapel" => $ambildata, 250]);
        }else{
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMessage"=>"User atau Password Salah"]],401);
        }
    }

    public function insertDataMapel(request $request){
         $array = array(
            'nama_mapel' => $request->input('nama_mapel'),
            'deskripsi' => $request->input('deskripsi'));
        
        DB::table('mapel')->insert($array);    

        return response()->json(
            ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=> "Data berhasil ditambahkan"
                ]
                ],200
        );
    }

    public function updateDataMapel(request $request){
        DB::table('mapel')->where('id_mapel', $request->input('id_mapel'))->update([
            'nama_mapel' => $request->input('nama_mapel'),
            'deskripsi' => $request->input('deskripsi')
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

    public function deleteDataMapel(request $request){
        DB::table('mapel')->where('id_mapel', $request->input('id_mapel'))->delete();
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