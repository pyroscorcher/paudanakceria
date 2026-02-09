<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1',
        ]);

        $student = Student::create($validatedData);
        return response()->json($student, Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $student = Student::findOrFail($id);
            return response()->json($student, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }
    }
}