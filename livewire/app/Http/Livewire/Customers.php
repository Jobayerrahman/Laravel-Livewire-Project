<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class Customers extends Component
{
    public $customers, $selectedCustomer, $action;
    protected $listeners = [
        'refreshPage' => '$refresh'
    ];

    public function selectCustomer($customerId, $action)
    {
        $this->selectedCustomer =$customerId;
        
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        }
        else{
            $this->emit('getCustomerId', $this->selectedCustomer);
            $this->dispatchBrowserEvent('openModal');
        }

    }

    public function render()
    {
        $this->customers = Customer::all();
        return view('livewire.customers');
    }

    public function destroy()
    {
        if($this->selectedCustomer){
            $record = Customer::where('id',$this->selectedCustomer);
            $record->delete();
            $this->dispatchBrowserEvent('closeDeleteModal');
        }
    }
}
