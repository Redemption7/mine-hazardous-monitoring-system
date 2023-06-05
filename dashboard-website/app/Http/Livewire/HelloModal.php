<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class HelloModal extends Component
{
    public $user;
    public $count;

    public function updateUser(){

        $user = User::where('is_logged', 1)
            ->where('is_notified', 0)
            ->first();

        if($user){
            $user->update([
                'is_notified' => 1
            ]);
            $this->user = $user;
            $this->dispatchBrowserEvent('user-logged');
        } else {

        }
    }

    public function render()
    {
        $this->updateUser();
        return view('livewire.hello-modal');
    }
}
