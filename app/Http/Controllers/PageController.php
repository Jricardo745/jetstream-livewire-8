<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function course(Course $course): View
    {
        $course->load('posts', 'category.courses.user');

        return view('course', [
            'course' => $course,
        ]);
    }
}
