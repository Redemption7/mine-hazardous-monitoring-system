<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EventLogs extends Component
{
    public $sys_users;

    public function getUsers(){
        $this->sys_users = User::where('is_logged', 1)->get();
    }
    public function render()
    {
        $this->getUsers();
        return view('livewire.event-logs');
    }
}
