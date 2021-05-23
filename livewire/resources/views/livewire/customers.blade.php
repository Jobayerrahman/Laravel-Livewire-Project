<div>
    <h2>Customer display</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
    Add customers
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add customers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('customer-form')
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalFormDelete" tabindex="-1" role="dialog" aria-labelledby="modalFormDeleteCustomer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalFormDeleteCustomer">Delete customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4>Are you sure?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" wire:click="destroy">Yes</button>
        </div>
        </div>
    </div>
    </div>


    <div>
    <br/>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Customer name</th>
                    <th scope="col">Email address</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $data)
                <tr>
                    <td>{{$data->fullName}}</td>
                    <td>{{$data->emailAddress}}</td>
                    <td>{{$data->phoneNumber}}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="selectCustomer({{ $data->id }}, 'update')">Update</button>
                        <button class="btn btn-sm btn-danger" wire:click="selectCustomer({{ $data->id }}, 'delete')">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>