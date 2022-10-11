<?php

class Animal
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function index()
    {
        foreach ($this->data as $animals) {
            echo "$animals <br>";
        }
    }

    public function store($data)
    {
        array_push($this->data, $data);
    }

    public function update($index, $data)
    {
        $this->data[$index] = $data;
    }

    public function destroy($index)
    {
        unset($this->data[$index]);
    }
}

$animal = new Animal(["Ayam", "Ikan"]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan data hewan baru <br>";
$animal->store("burung");
$animal->index();
echo "<br>";

echo "Update - Mengupdate Hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus Hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
