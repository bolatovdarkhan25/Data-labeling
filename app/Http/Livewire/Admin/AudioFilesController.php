<?php

namespace App\Http\Livewire\Admin;

use App\Models\AudioFile;
use Livewire\Component;
use Livewire\WithPagination;

class AudioFilesController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = AudioFile::query();

        if ($this->search)
            $query->where('name', 'LIKE', "%{$this->search}%");

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteUser(AudioFile $audioFile)
    {
        $audioFile->delete();

        $this->resetPage();
    }

    public function render()
    {
        $audioFiles = $this->getItems();

        $pageName = 'Audio Files';

        return view('livewire.admin.audio-files-controller', compact('audioFiles', 'pageName'));
    }
}
