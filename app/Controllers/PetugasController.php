<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function login(){
        $syarat = [ 'username'=>$this->request->getPost('txtUsername'),
                'password'=>md5($this->request->getPost('txtPassword')) ]; 
        $Userpetugas = $this->petugas->where($syarat)->find();
          if(count($Userpetugas)==1){
              $session_data=[ 
                  'username' => $Userpetugas[0]['username'],
                  'nama_petugas' => $Userpetugas[0]['nama_petugas'],
                  'level'    => $Userpetugas[0]['level'],
                  'sudahkahLogin' => TRUE];
                  session()->set($session_data);
                  return redirect()->to('/petugas/dashboard');
                  }else{
                        return redirect()->to('/login')->with('info','<div style="color:red;font-size:10px">Gagal Login</div>');
                    }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('');
    }

}
