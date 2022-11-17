<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // memuat fitur index pasien untuk menampilkan semua data pasien
    public function index()
    {
        // menggunakan model pasien untuk melihat data semua pasien
        $patients = Patient::all();

        // membuat kondisi jika data ada atau tidak ada
        if (!$patients->isEmpty()) {

            // memanggil data jika pasien ada
            $response = [
                'message' => 'Get All Resource',
                'data' => $patients
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($response, 200);
        } else {

            // membuat response jika pasien tidak ada
            $response = [
                'message' => 'Data is empty'
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($response, 200);
        }
    }
    // memuat fitur store pasien untuk menambah data pasien
    public function store(Request $request)
    {
        // membuat validasi
        $validatedData = $request->validate([
            // kolom => rules|rules
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required|date',
            'out_date_at' => 'required|date',
        ]);

        // memanggil model pasien untuk insert data
        $patient = Patient::create($validatedData);

        // memanggil data pasien beserta message jika berhasil ditambahkan
        $data = [
            'message' => 'Resource is added successfully',
            'data' => $patient
        ];

        // mengebalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    // membua fitur show untuk menampilkan data pasien berdasarkan id
    public function show($id)
    {
        // menggunakan model pasien untuk mencari id
        $patient = Patient::find($id);

        // membuat kondisi apabila data pasien ada atau tidak ada
        if ($patient) {

            // menampilkan data pasien beserta message jika pasien ada
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patient
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {

            // mengembalikan message jika data pasien tidak ada
            $data = [
                'message' => 'resource not found'
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    // membuat fitur update untuk mengupdate data pasien
    public function update(Request $request, $id)
    {
        // menggunakan model pasien untuk mencari id
        $patient = Patient::find($id);

        // membuat validasi
        $validatedData = $request->validate([
            // kolom => 'rules|rules'
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required|date',
            'out_date_at' => 'required|date'
        ]);

        // membuat kondisi jika data pasien ada atau tidak ada
        if ($patient) {

            // mengupdate data pasien
            $patient->update($validatedData);

            // memanggil data pasien beserta message jika berhasil
            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {

            // menampilkan message jika data tidak ada
            $data = [
                'message' => 'Resource not found'
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    // membuat fitur delete pasien berdasarkan id
    public function destroy($id)
    {

        // menggunakan model pasien untuk mencari id
        $patient = Patient::find($id);

        // membuat kondisi jika data pasien ada atau tidak ada 
        if ($patient) {

            // menghapus data pasien
            $patient->delete();

            // menampillkan pesan jika berhasil dihapus
            $data = [
                'message' => 'Resource is delete successfully'
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            // menampilkan pesan jika tidak menemukan data
            $data = [
                'message' => 'Resource not found'
            ];

            // mengebalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    // membuat fitur search pasien berdasarkan nama
    public function search($name)
    {

        // menggunakan model pasien untuk mencari nama
        $patient = Patient::where('name', 'LIKE', '%' . $name . '%')->get();

        // membuat kondisi jika data pasien ada atau tidak ada
        if (count($patient)) {

            // menampilkan data dan pesan jika data berhasil ditemukan
            $data = [
                'message' => 'Get searched resource',
                'data' => $patient
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {

            // menampilkan pesan jika data tidak ditemukan
            $data = [
                'message' => 'Resource not found',
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    // membuat fitur positif untuk menampilkan pasien yang positif
    public function positive($status)
    {

        // mengunakan model pasien untuk mencari status
        $patient = Patient::where('status', 'positive')->get();

        // membuat response jika data berhasil ditemukan
        $data = [
            'message' => 'Get positive resource',
            'total' => count($patient),
            'data' => $patient
        ];

        // mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    }

    // membuat fitur recovered untuk menampilkan pasien yang sembuh
    public function recovered($status)
    {

        // mengunakan model pasien untuk mencari status
        $patient = Patient::where('status', 'recovered')->get();

        // membuat response jika data berhasil ditemukan
        $data = [
            'message' => 'Get recovered resource',
            'total' => count($patient),
            'data' => $patient
        ];

        // mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    }

    // membuat fitur dead untuk menampilkan pasien yang meninggal
    public function dead($status)
    {

        // mengunakan model pasien untuk mencari status
        $patient = Patient::where('status', 'dead')->get();

        // membuat response jika data berhasil ditemukan
        $data = [
            'message' => 'Get dead resource',
            'total' => count($patient),
            'data' => $patient
        ];

        // mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    }
}
