<?php

namespace App\Livewire\Member;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('member.layouts')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.member.dashboard');
    }
}