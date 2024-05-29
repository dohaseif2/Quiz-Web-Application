<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams=Exam::where('availablity','available')->get();
        return response()->json($exams,200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'teacher_id' => 'required|exists:users,id',
            'availablity' => 'required|in:available,unavailable',
        ]);

        $exam = Exam::create($request->all());
        return response()->json($exam, 200);
    }
    public function update(Request $request, string $id)
    {
        $exam=Exam::find($id);
        $request->validate([
            'subject' => 'string',
            'teacher_id' => 'exists:users,id',
            'available' => 'in:available,unavailable',
        ]);

        $exam->update($request->all());

        return response()->json($exam);
    }
}
