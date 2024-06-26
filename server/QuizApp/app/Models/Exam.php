<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'teacher_id',
        'availablity',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_exams_tabel', 'exam_id', 'student_id')->withPivot('result')->withTimestamps();
    }
}
