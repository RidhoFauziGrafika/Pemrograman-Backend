<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $response = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($response, 200);
    }


    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);
        $data = [
            'message' => 'Student created successfully',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        Student::find($id)->update($input);
        $student = Student::find($id);

        $data = [
            'message' => 'Student updated seccessfully',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        Student::destroy($id);
        $students = Student::all();

        $data = [
            'message' => 'Student deleted successfully',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
}
