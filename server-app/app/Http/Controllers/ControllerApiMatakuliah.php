<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ControllerApiMatakuliah extends Controller
{
    //
    public function index()
    {
        $data = DB::table('tblmatakuliah')->get();

        return response()->json([
        "success" => true,
        "message" => "Data Matakuliah",
        "data" => $data
        ]);
    }

    public function detail($id)
    {
      $data = DB::table('tblmatakuliah')->where('id',$id)->get();

      if ($data) {
          return response()->json([
          "success" => true,
          "message" => "Data Per Matakuliah",
          "data" => $data
          ]);
        }else{
          return response()->json([
          "success" => false,
          "message" => "Data Per Matakuliah",
          "data" => $data
          ]);

      }
    }

    public function simpan(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'txtkodematakuliah'     => 'required|unique:tblmatakuliah,kodematakuliah',
            'txtmatakuliah'   => 'required',
        ]);

        if($validasi->fails()) {
            return response()->json([
                "success" => false,
                'data'    => $validasi->errors()
            ],401);

        } else {

        $data = DB::table('tblmatakuliah')->insert([
            'kodematakuliah' => $request->txtkodematakuliah,
            'matakuliah' => $request->txtmatakuliah,
	        'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($data) {
            return response()->json([
                "success" => true,
                'message' => 'Post Method Success',
                'data' => $data
            ], 200);            
            }else{
            return response()->json([
                "success" => false,
                'message' => 'Post Method Failed',
                'data' =>"Post Method Failed "
            ], 400);    
        }
    }
    }

    public function update(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'txtkodematakuliah'     => 'required',
            'txtmatakuliah'   => 'required',
        ]);

        if($validasi->fails()) {
            return response()->json([
                "success" => false,
                'data'    => $validasi->errors()
            ],401);

        } else {
            $data =  DB::table('tblmatakuliah')->where('id', $request->txtid)->update([
                'kodematakuliah' => $request->txtkodematakuliah,
                'matakuliah' => $request->txtmatakuliah,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($data) {
                return response()->json([
                    "success" => true,
                    'message' => 'PUT Method Success',
                    'data' => $data
                ], 200);            
                }else{
                return response()->json([
                    "success" => false,
                    'message' => 'PUT Method Failed',
                    'data' =>"PUT Method Failed ".$request->txtid
                ], 400);    
            }

        }
    }

    public function hapus($id)
    {
        $data = DB::table('tblmatakuliah')->where('id', $id)->delete();

        if ($data) {
            return response()->json([
                "success" => true,
                "message" => "Data {$id} Telah Hapus"
                ]);
        }else{
            return response()->json([
                "success" => false,
                "message" => "Data {$id} Tidak bisa di Hapus"
              ]);
        }
    }

}
