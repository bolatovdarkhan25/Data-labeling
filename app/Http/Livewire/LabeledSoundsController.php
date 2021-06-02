<?php

namespace App\Http\Livewire;

use App\Models\LabeledSound;
use Livewire\Component;
use Livewire\WithPagination;

class LabeledSoundsController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = LabeledSound::query();

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteObject(LabeledSound $sound)
    {
        $sound->delete();

        $this->resetPage();
    }

    public function render()
    {
        $sounds = $this->getItems();

        $pageName = 'Labeled sounds';

        return view('livewire.labeled-sounds-controller', compact('sounds', 'pageName'));
    }
}
