<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MyExam extends Component
{
    public $mygroups;
    public function render()
    {
        return view('livewire.my-exam');
    }
}
