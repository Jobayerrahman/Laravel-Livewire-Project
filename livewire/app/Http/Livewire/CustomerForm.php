<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerForm extends Component
{
    public $fullName,$emailAddress,$phoneNumber,$customerId;

    protected $listeners =[
        'getCustomerId'
    ];

    public function getCustomerId($customerId){
        $this->customerId = $customerId;
        $customer = Customer::find($this->customerId);
        $this->fullName     = $customer->fullName;
        $this->emailAddress = $customer->emailAddress;
        $this->phoneNumber  = $customer->phoneNumber;
    }

    public function store()
    {
        $data = [
            'name'      =>   $this->fullName,
            'email'     =>   $this->emailAddress,
            'cell'      =>   $this->phoneNumber,
            'user_id'   =>   auth()->user()->id,
        ];

        if($this->customerId){
            Customer::find($this->customerId)->update($data);
        }
        else{
            Customer::create($data);
        }
        
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshPage');
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->fullName         = null;
        $this->emailAddress     = null;
        $this->phoneNumber      = null;
    }

    public function render()
    {
        return view('livewire.customer-form');
    }
}
