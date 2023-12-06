<?php

namespace App\Livewire;

use App\Services\ForestSessionsService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Statistics extends Component
{
    public $labels;
    public $sessions;
    public $selectedDay;

    public function mount()
    {
        $this->selectedDay = null;
        $this->updateSessionsCount();
    }

    public function updateSessionsCount()
    {
        $results = ForestSessionsService::getStatistics();
        $this->labels = array_column($results, 'date');
        $this->sessions = array_column($results, 'count');
    }

    public function render()
    {
        return view('livewire.statistics');
    }
}
