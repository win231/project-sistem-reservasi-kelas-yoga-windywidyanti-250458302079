<?php

namespace App\Livewire\Instructor;

use App\Models\ClassSchedule;
use Livewire\Component;

class ScheduleActions extends Component
{
    public ClassSchedule $schedule;
    public bool $showModal = false;

    public function mount(ClassSchedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function showDetail()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.instructor.schedule-actions');
    }
}
