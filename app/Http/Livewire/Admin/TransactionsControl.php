<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsControl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getItems()
    {
        $query = Transaction::query();

        return $query->paginate();
    }

    public function updateList()
    {
        $this->render();
    }

    public function deleteObject(Transaction $transaction)
    {
        $transaction->delete();

        $this->resetPage();
    }

    public function render()
    {
        $transactions = $this->getItems();

        $pageName = 'Transactions';

        return view('livewire.admin.transactions-control', compact('transactions', 'pageName'));
    }
}
