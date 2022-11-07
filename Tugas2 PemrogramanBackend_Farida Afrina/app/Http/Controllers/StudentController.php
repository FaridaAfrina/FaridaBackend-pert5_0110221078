<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # method index - get all resources
    public function index()
    {
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        # menggunakan response json laravel
        # otomatis set header content type json
        # otomatis mengubah data array ke JSON
        # mengatur status code
        return response()->json($data, 200);
    }

    # menambahkan resource student
    # membuat method store
    public function store(Request $request)
    {
        # menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        # menggunakan Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }
}

// Edit student data
public function update($id, Request $request)
{
    // Receive request data from body
    $nama = $request->nama;
    $nim = $request->nim;
    $email = $request->email;
    $jurusan = $request->jurusan;

    // Update student data
    $student = Student::find($id);
    $student->update([
        'nama' => $nama,
        'nim' => $nim,
        'email' => $email,
        'jurusan' => $jurusan,
    ]);

    $data = [
        "message" => "Student with id $id has succesfully updated",
        "data" => $student
    ];

    return response()->json($data, 200);
}

// Delete student data
public function delete($id)
{
    $student = Student::find($id);
    $student->delete();

    $data = [
        "message" => "Student with id $id has succesfully deleted",
        "data" => $student
    ];

    return response()->json($data, 200);
}
}