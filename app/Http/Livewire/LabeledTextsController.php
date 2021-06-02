<?php

namespace App\Http\Livewire;

use App\Models\LabeledText;
use Livewire\Component;
use Livewire\WithPagination;

class LabeledTextsController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = LabeledText::query();

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteObject(LabeledText $text)
    {
        $text->delete();

        $this->resetPage();
    }

    public function render()
    {
        $texts = $this->getItems();

        $pageName = 'Labeled texts';

        return view('livewire.labeled-texts-controller', compact('texts', 'pageName'));
    }
}
