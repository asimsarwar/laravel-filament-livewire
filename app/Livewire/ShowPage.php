<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;

class ShowPage extends Component
{
    public $pageId = null;

    public function mount($id) {
        $this->pageId = $id;
    }

    public function render()
    {
        $page = Page::where('status', 1)->findOrFail($this->pageId);
        //dd($page);
        return view('livewire.show-page', [
            'page' => $page
        ]);
    }
}
