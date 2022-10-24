<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $data = ([
        "kucing", "ayam", "ikan"
    ]);

    public function index()
    {
        echo "Menampilkan data animals";
        foreach ($this->data as $animals) {
            echo "\n- $animals";
        }
    }

    public function store(Request $request)
    {
        echo "Menambah data hewan baru";
        echo "\nNama hewan : $request->nama\n";
        echo "Menampilkan data animals";
        array_push($this->data, $request->nama);
        foreach ($this->data as $animals) {
            echo "\n- $animals";
        }
    }

    public function update(Request $request, $id)
    {
        echo "Mengupdate data animals id $id";
        echo "\nNama hewan : $request->nama\n";
        echo "Menampilkan data animals";
        $this->data[$id] = $request->nama;
        foreach ($this->data as $animals) {
            echo "\n- $animals";
        }
    }

    public function destroy($id)
    {
        echo "Menghapus data hewan id $id\n";
        unset($this->data[$id]);
        echo "Menampilkan data animals";
        foreach ($this->data as $animals) {
            echo "\n- $animals";
        }
    }
}
