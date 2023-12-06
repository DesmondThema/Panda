<?php

namespace App\Livewire;

use App\Services\ForestSessionsService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SessionsList extends Component
{
    public $sessions;
    public $total;
    public $keywords;
    public $selectedKeyword;
    public $selectedDate;

    public function mount()
    {
        $this->selectedKeyword = null;
        $this->selectedDate = null;
    }
    public function clearFilters()
    {
        $this->selectedKeyword = null;
        $this->selectedDate = null;

        $this->updateSessions();
    }

    public function updateSessions()
    {
        $this->sessions = ForestSessionsService::getFilteredSessions($this->selectedKeyword, $this->selectedDate);
        $this->keywords = ForestSessionsService::getKeywords();
    }

    public function render()
    {
        $availableDays = [
            today()->toDateString(),
            today()->addDay(1)->toDateString(),
            today()->addDay(2)->toDateString(),
            today()->addDay(3)->toDateString(),
            today()->addDay(4)->toDateString(),
            today()->addDay(5)->toDateString(),
            today()->addDay(6)->toDateString(),
        ];

        $this->updateSessions();
        return view('livewire.sessions-list',[
            'availableDays' => $availableDays
        ]);
    }
}
