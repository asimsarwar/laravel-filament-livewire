<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;

class ShowTeamPage extends Component
{
    public function render()
    {
        $teams = Member::orderBy('name', 'ASC')->get();
        return view('livewire.show-team-page', [
            'teams' => $teams
        ]);
    }
}
