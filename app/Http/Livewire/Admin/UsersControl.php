<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersControl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'userCreated' => 'updateList',
        'userUpdated' => 'updateList'
    ];

    public function getItems()
    {
        $query = User::query();

        if ($this->search)
            $query->where('name', 'LIKE', "%{$this->search}%");

        $users = $query->paginate();

        return $users;
    }

    public function openCreateModal()
    {
        $this->emit('openUserCreateModal');
    }

    public function openUpdateModal($id)
    {
        $this->emit('openUserUpdateModal', $id);
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        $this->resetPage();
    }

    public function render()
    {
        $users = $this->getItems();

        $pageName = 'Users';

        return view('livewire.admin.users-control', compact('users', 'pageName'));
    }
}
