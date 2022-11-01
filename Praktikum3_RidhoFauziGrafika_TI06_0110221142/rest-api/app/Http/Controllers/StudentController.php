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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nim' => 'required|string|unique:students',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }

        try {
            $students = Student::create($request->all());
            $response = [
                'message' => 'Student Created',
                'data' => $students
            ];
            return response()->json($response, 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Student Created Failded ' . $e->errorInfo
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $students = Student::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nim' => 'required|string|unique:students',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }

        try {
            $students->update($request->all());
            $response = [
                'message' => 'Student Updated',
                'data' => $students
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Student Updated Failded ' . $e->errorInfo
            ]);
        }
    }

    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        try {
            $students->delete();
            $response = [
                'message' => 'Student Deleted'
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Student deleted Failded ' . $e->errorInfo
            ]);
        }
    }
}
