<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;



class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if (!$students->isEmpty()) {
            $response = [
                'message' => 'Get all students',
                'data' => $students
            ];
            return response()->json($response, 200);
        } else {

            $response = [
                'message' => 'students not found'
            ];
            return response()->json($response, 404);
        }
    }


    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];


        foreach ($input as $students => $student) {
            if (!$students || !$student) {
                $data = [
                    'message' => 'Student not found'
                ];

                return response()->json($data, 404);
            } else {
                $data = [
                    'message' => 'Student created successfully',
                    'data' =>  Student::create($input)
                ];

                return response()->json($data, 201);
            }
        }
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail students',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found',
            ];
            return response()->json($data, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'message' => 'Student updated successfully',
                'data' => $student,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found'
            ];
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            $data = [
                'message' => 'Student deleted successfully',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found',
            ];
            return response()->json($data, 404);
        }
    }
}
