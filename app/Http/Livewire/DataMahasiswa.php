<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa;
use Livewire\Component;

class DataMahasiswa extends Component
{
    public $modal;
    public $mahasiswa_id;
    public $nama;
    public $nim;
    public $alamat;

    public function render()
    {
        $mahasiswa = Mahasiswa::all();
        return view('livewire.data-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Open Modal
     */
    public function openModal()
    {
        $this->modal = true;
    }

    /**
     * Close Modal
     */
    public function closeModal()
    {
        $this->modal = false;
    }

    /**
     * Passing data ke modal untuk edit
     */
    public function edit($id)
    {
        $this->openModal();
        $mahasiswa = Mahasiswa::findOrFail($id);
        $this->mahasiswa_id = $id;
        $this->nama = $mahasiswa->nama;
        $this->nim = $mahasiswa->nim;
        $this->alamat = $mahasiswa->alamat;
    }

    /**
     * Store data jika id belum ada
     * Update data jika id sudah ada
     */
    public function update()
    {
        Mahasiswa::updateOrCreate(['id' => $this->mahasiswa_id], [
            'nama' => $this->nama,
            'nim' => $this->nim,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Data Beerhasil Diubah');

        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
    }
}
