<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view ('hotel');
    }
    public function about()
    {
        return view ('about');
    }
    public function kamar(){
        $this->kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
        $data['ListKamar'] = $this->kamar->findAll();
        return view ('kamar', $data);
    }

    public function fasilitas(){
        $data['ListFasilitas'] = $this->fasilitas->findAll();
        return view ('fasilitas', $data);
    }

    public function reservasi(){
        helper(['form']);
        $aturanForm=[
            'txtInputTipeKamar'=>'required',
            'nama'=>'required',
            'nohp'=>'required',
            'email'=>'required',
            'tamu'=>'required',
            'checkin'=>'required',
            'checkout'=>'required',
            'jml_kmr'=>'required'
        ];
        
        if($this->validate($aturanForm)){
            $data=[
                'id_kamar'=>$this->request->getPost('txtInputTipeKamar'),
                'nama_pemesan'=>$this->request->getPost('nama'),
                'email_pemesan'=>$this->request->getPost('email'),
                'nama_tamu'=>$this->request->getPost('tamu'),
                'no_telp'=>$this->request->getPost('nohp'),
                'tgl_cek_in'=>$this->request->getPost('checkin'),
                'tgl_cek_out'=>$this->request->getPost('checkout'),
                'jumlah_kamar_dipensan'=>$this->request->getPost('jml_kmr'),

            ];
            $this->reservasi->save($data);
            return redirect()->to(site_url(''))->with('berhasil', 'Berasil pesan Kamar');
        }
        $this->kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
        $data['ListKamar'] = $this->kamar->findAll();
        return view ('reservasi', $data);
    }
    
}
