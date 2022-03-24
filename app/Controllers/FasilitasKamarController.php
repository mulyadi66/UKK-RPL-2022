<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FasilitasKamarController extends BaseController
{
    public function index(){
            $data['ListKamar'] = $this->fasilitaskamar->findAll();
            return view('Fasilitas-Kamar/tampil-fasilitas', $data);
    }
    public function tambah(){
        helper(['form']);
        $aturanForm=[
            'txtFasilitas'=>'required',
            'txtKamar'=>'required'
        ];
        
        if($this->validate($aturanForm)){
            $data=[
                'tipe_kamar'=> $this->request->getPost('txtKamar'),
                'fasilitas' => $this->request->getPost('txtFasilitas')];
            $this->fasilitaskamar->save($data);
            return redirect()->to(site_url('/fasilitas/tampil'))->with('berhasil', 'Data Berhasil di Tambah');
        }
            return view ('Fasilitas-Kamar/tambah');
    }
    public function edit($idkamar=null){
        if($idkamar!=null){
            $syarat=[
                'id_fasilitas' => $idkamar
            ];
            $data['detailFasilitas']=$this->fasilitaskamar->where($syarat)->find()[0];
        }

        helper(['form']);
        $aturanForm=[
            'txtFasilitas'=>'required',
            'txtKamar'=>'required'
        ];

        if($this->validate($aturanForm)){
                $data=[
                    'tipe_kamar'=> $this->request->getPost('txtKamar'),
                    'fasilitas' => $this->request->getPost('txtFasilitas')];
            $this->fasilitaskamar->update($this->request->getPost('txtIdKamar'),$data);
            return redirect()->to(site_url('/fasilitas/tampil'))->with('berhasil','Data berhasil diupdate');
        }
            return view('/Fasilitas-Kamar/edit',$data);

    }
    public function hapus($idfasilitas){
            $this->fasilitaskamar->where('id_fasilitas',$idfasilitas)->delete();
            return redirect()->to(site_url('/fasilitas/tampil'))->with('berhasil', 'Data Berhasil di Hapus');

    }
}
