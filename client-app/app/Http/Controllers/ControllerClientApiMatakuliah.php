<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerClientApiMatakuliah extends Controller
{
    //
    public function getMatakuliah()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8080/server-app/public/api/matakuliah/get', [
            'headers' => [
                'Authorization' => 'Bearer ' . 'UNBIN'
            ]
        ]);
        $response = $request->getBody();
        $result = json_decode($response, true);
        return view('admin.index')->with('data', $result['data']);
    }
    public function AddMatakuliah()
    {
        return view('admin.add');
    }
    public function StoreMatakuliah(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8080/server-app/public/api/matakuliah/post', [
            'form_params' => [
                'txtkodematakuliah' => $request->txtkodematakuliah,
                'txtmatakuliah' => $request->txtmatakuliah,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . 'UNBIN'
            ]
                ]); 
        return redirect('/matakuliah')->with('message', 'Data Berhasil Disimpan');
    }
    public function getPerMatakuliah($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8080/server-app/public/api/matakuliah/getId/'.$id);
        $response = $request->getBody();
        $result = json_decode($response, true);
        return view('admin.edit')->with('data', $result['data']);
    }
    public function UpdateMatakuliah(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->put('http://localhost:8080/server-app/public/api/matakuliah/update', [
            'form_params' => [
                'txtid' => $request->id,
                'txtkodematakuliah' => $request->txtkodematakuliah,
                'txtmatakuliah' => $request->txtmatakuliah,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . 'UNBIN'
            ]
        ]);
        return redirect('/matakuliah')->with('message', 'Data Berhasil Disimpan');;
    }

    public function DeleteMatakuliah($id)
    {
        $client = new \GuzzleHttp\Client();
        //mengirim data ke url api menggunakan metode delete yang menyisipkan parameter di akhir url
        $response = $client->delete('http://localhost:8080/server-app/public/api/matakuliah/delete/'.$id, [
            'headers' => [
                'Authorization' => 'Bearer ' . 'UNBIN'
            ]
        ]);
        // alihkan halaman ke halaman matakuliah
        return redirect('/matakuliah')->with('message', 'Data Berhasil Dihapus');;
    }

}
