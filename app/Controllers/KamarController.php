<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KamarController extends BaseController
{
    public function index(){
            $this->kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
            $data['ListKamar'] = $this->kamar->findAll();
            return view('Kamar/card-tampil', $data);
    }

    public function tambahKamar(){
        helper(['form']);
        $aturanForm=[
            'txtNoKamar'=>'required',
            'txtInputTipeKamar'=>'required',
            'txtTarif'=>'required'
        ];
        
        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtInputFoto');
            $foto->move('gambar');
            $data=[
                'no_kamar'=>$this->request->getPost('txtNoKamar'),
                'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                'tarif'=>$this->request->getPost('txtTarif'),
                'foto'=> $foto->getClientName()
            ];
            $this->kamar->save($data);
            return redirect()->to(site_url('/kamar/tampil'))->with('berhasil', 'Data Berhasil di Tambah');
        }
            $data['ListTipe'] = $this->fasilitaskamar->findAll();
            return view ('Kamar/tambah-kamar', $data);
    }

    public function editKamar($idkamar=null){
        if($idkamar!=null){
            $syarat=[
                'id_kamar' => $idkamar
            ];

            $this->kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
            $data['detailKamar'] = $this->kamar->where('id_kamar',$idkamar)->findAll()[0];
            $data['ListTipe'] = $this->fasilitaskamar->findAll();
        }

        helper(['form']);
        $aturanForm=[
            'txtNoKamar'=>'required',
            'txtTarif'=>'required'
        ];

        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtFotoKamar');
            $syarat=$this->request->getPost('txtFoto');
            if($foto->isValid()){
                unlink('gambar/'.$syarat);
                $foto->move('gambar');
                $data=[
                    'no_kamar'=> $this->request->getPost('txtNoKamar'),
                    'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                    'tarif' => $this->request->getPost('txtTarif'),
                    'foto'=> $foto->getClientName()
                ];
            } else {
                $data=[
                    'no_kamar'=> $this->request->getPost('txtNoKamar'),
                    'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                    'tarif' => $this->request->getPost('txtTarif')
                ];
            }
            $this->kamar->update($this->request->getPost('txtIdKamar'),$data);
            return redirect()->to(site_url('/kamar/tampil'))->with('berhasil','Data berhasil diupdate');
        }
            
            return view('Kamar/edit-kamar',$data);

    }

    public function hapusKamar($idkamar){
            $syarat=['id_kamar'=>$idkamar];
            $infoFile=$this->kamar->where($syarat)->find();
            //hapus file foto
            unlink('gambar/'.$infoFile[0]['foto']);
            //hapus data didatabase
            $this->kamar->where('id_kamar',$idkamar)->delete();
            return redirect()->to('/kamar/tampil')->with('berhasil', 'Data Berhasil di Hapus');

    }
}
