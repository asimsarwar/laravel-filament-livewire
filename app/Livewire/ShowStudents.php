<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $selectedClass = null;
    public $selectedSection = null;

    public function updatedSelectedClass($value)
    {
        $this->selectedSection = null;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $classes = Classes::all();
        $sections = collect();

        if ($this->selectedClass) {
            $sections = Section::where('class_id', $this->selectedClass)->get();
        }

        $students = Student::search($this->search)
            ->when($this->selectedClass, function ($query) {
                $query->where('class_id', $this->selectedClass);
            })
            ->when($this->selectedSection, function ($query) {
                $query->where('section_id', $this->selectedSection);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.show-students', [
            'students' => $students,
            'classes' => $classes,
            'sections' => $sections,
        ]);
    }
}

