<?php

namespace App\Http\Livewire;

use App\Models\LabeledAuthor;
use Livewire\Component;
use Livewire\WithPagination;

class LabeledAuthorsController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = LabeledAuthor::query();

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteUser(LabeledAuthor $author)
    {
        $author->delete();

        $this->resetPage();
    }

    public function render()
    {
        $authors = $this->getItems();

        $pageName = 'Labeled authors';

        return view('livewire.labeled-authors-controller', compact('authors', 'pageName'));
    }
}
