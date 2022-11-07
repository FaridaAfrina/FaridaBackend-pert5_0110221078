<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    # data animals
    public $animals = ["kucing ", " ayam ", " ikan "];

    # Method index - Menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        echo " Menampilkan data animals: ";
        echo " <br> ";
        foreach ($this->animals as $animal) {
            echo "$animal";
        }
    }

    #method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store(Request $request)
    {
        echo "Menambahkan data animals";
        echo " <br>";
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $request->animal);
        $this->index();
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update(Request $request, $id)
    {
        echo "Mengupdate data hewan" . $this->animals[$id] . "menjadi $request->animal";
        echo " <br>";
        array_splice($this->animals, $id, 1, $request->animal);
        $this->index();
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($id)
    {

        echo "Menghapus data hewan" . $this->animals[$id];
        # gunakan method unset atau array_splice untuk menghapus data array
        array_splice($this->animals, $id, 2);
        echo " <br>";
        $this->index();
    }
}
