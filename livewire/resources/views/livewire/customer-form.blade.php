<div>
    <div>
        <label for="inputCustomerName">Customer name</label>
        <input wire:model="fullName" type="text" class="form-control" placeholder="Enter customer name">
    </div>
    <br/>
    <div>
        <label for="inputCustomerEmail">Email address</label>
        <input wire:model="emailAddress" type="text" class="form-control" placeholder="Enter customer email address">
    </div>
    <br/>
    <div>
        <label for="inputCustomerEmail">Phone number</label>
        <input wire:model="phoneNumber" type="text" class="form-control" placeholder="Enter customer phone number">
    </div>
    <br/>
    <button wire:click="store" class="btn btn-md btn-primary">Save</button>
</div>
