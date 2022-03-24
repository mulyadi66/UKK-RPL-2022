<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FasilitasHotelController extends BaseController
{
    public function index(){
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('/login');
            exit;
            }
            // cek apakah yang login bukan admin ?
            if(session()->get('level')!='admin'){
            return redirect()->to('/petugas/dashboard');
            exit;
            }
            $data['ListFasilitas'] = $this->fasilitas->findAll();
            return view('Fasilitas-Hotel/tampil', $data);
    }
    public function tambah(){
        helper(['form']);
        $aturanForm=[
            'txtFasilitas'=>'required',
            'txtDes'=>'required'
        ];
        
        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtFoto');
            $foto->move('gambar');
            $data=[
                'jenis'=> $this->request->getPost('txtFasilitas'),
                'deskripsi' => $this->request->getPost('txtDes'),
                'gambar'=> $foto->getClientName()
            ];
            $this->fasilitas->save($data);
            return redirect()->to(site_url('/fasilitashotel'))->with('berhasil', 'Data Berhasil di Tambah');
        }
        return view('Fasilitas-Hotel/tambah');
    }
    public function edit($id_fasilitas_hotel=null){
        if($id_fasilitas_hotel!=null){
            $syarat=[
                'idfasilitas' => $id_fasilitas_hotel
            ];

            $data['detailFasilitasHotel']=$this->fasilitas->where($syarat)->find()[0];
        }

        helper(['form']);
        $aturanForm=[
            'txtFasilitas'=>'required',
            'txtDes'=>'required'
        ];

        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtFotoFasilitas');
            $syarat=$this->request->getPost('txtFoto');
            if($foto->isValid()){
                unlink('gambar/'.$syarat);
                $foto->move('gambar');
                $data=[
                    'jenis'=> $this->request->getPost('txtFasilitas'),
                    'deskripsi' => $this->request->getPost('txtDes'),
                    'gambar'=> $foto->getClientName()
                ];
            } else {
                $data=[
                    'jenis'=> $this->request->getPost('txtFasilitas'),
                    'deskripsi' => $this->request->getPost('txtDes')
                ];
            }
            $this->fasilitas->update($this->request->getPost('txtId'),$data);
            return redirect()->to(site_url('/fasilitashotel'))->with('berhasil','Data berhasil diupdate');
        } 
        return view('Fasilitas-Hotel/edit',$data);
    }
    public function hapus($idfasilitas){
            $syarat=['idfasilitas'=>$idfasilitas];
            $infoFile=$this->fasilitas->where($syarat)->find();
            //hapus file foto
            unlink('gambar/'.$infoFile[0]['gambar']);
            //hapus data didatabase
            $this->fasilitas->where('idfasilitas',$idfasilitas)->delete();
            return redirect()->to('/fasilitashotel')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
