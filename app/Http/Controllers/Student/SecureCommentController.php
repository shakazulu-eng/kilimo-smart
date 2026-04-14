<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SecureCommentController extends Controller
{
    public function show()
    {
        return view('student.secure-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // SANITIZATION (XSS PREVENTION)
        $cleanComment = strip_tags($request->comment);

        return back()->with('comment', e($cleanComment));
    }
}
