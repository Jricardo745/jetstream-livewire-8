<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CourseList extends Component
{
    public function render(): View
    {
        return view('livewire.course-list', [
            'courses' => Course::query()->latest()->with('user')->get(),
        ]);
    }
}
