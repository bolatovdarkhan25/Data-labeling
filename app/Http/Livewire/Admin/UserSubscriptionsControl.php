<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserSubscription;
use Livewire\Component;
use Livewire\WithPagination;

class UserSubscriptionsControl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = UserSubscription::query();

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteObject(UserSubscription $userSubscription)
    {
        $userSubscription->delete();

        $this->resetPage();
    }

    public function render()
    {
        $usersSubscriptions = $this->getItems();

        $pageName = 'Users subscriptions';

        return view('livewire.admin.user-subscriptions-control', compact('usersSubscriptions', 'pageName'));
    }
}
