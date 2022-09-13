<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
     $mahasiswa = $mahasiswaModel->findAll();
    
     $data = [
         "title"=>"Mahasiswa",
         "mahasiswa" => $mahasiswa
     ];
     return view('templates/header', $data)
            . view('mahasiswa/list',$data)
            . view('templates/footer');
    }
    public function create(){
        $data = [
            "title"=>"create Mahasiswa",
        ];
        return view('templates/header', $data)
               . view('mahasiswa/create')
               . view('templates/footer');
       
    }
}
