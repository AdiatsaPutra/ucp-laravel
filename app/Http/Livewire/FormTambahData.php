<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa;
use Livewire\Component;

class FormTambahData extends Component
{
    public $nama;
    public $nim;
    public $alamat;
    public function render()
    {
        return view('livewire.form-tambah-data');
    }

    protected $rules = [
        'nama' => 'required',
        'nim' => 'required',
        'alamat' => 'required',
    ];

    protected $messages = [
        'nama.required' => 'Nama tidak boleh kosong',
        'nim.required' => 'nim tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
    ];

    public function store()
    {
        Mahasiswa::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Data Berhasil Ditambahkan');

        return redirect()->to('/dashboard');
    }
}
