<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller{
    public function index(){
        $data = Buku::all();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data; 
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function show($id){
        $data = Buku::where('id',$id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function store(Request $request){
        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $penerbit = $request->input('penerbit');
        $kategori = $request->input('kategori');

        $data = new Buku();
        $data->judul = $judul;
        $data->penulis = $penulis;
        $data->tahun = $tahun;
        $data->penerbit = $penerbit;
        $data->kategori = $kategori;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }
    
    public function update(request $request, $id){
        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $penerbit = $request->input('penerbit');
        $kategori = $request->input('kategori');
    
        $data = Buku::where('id',$id)->first();
        $data->judul = $judul;
        $data->penulis = $penulis;
        $data->tahun = $tahun;
        $data->penerbit = $penerbit;
        $data->kategori = $kategori;
    
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function destroy($id){
        $data = Buku::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

}
