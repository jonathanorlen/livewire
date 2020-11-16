<div class="card">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('message-delete'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{ session('message-delete') }}
        </div>
    @endif
    <div class="row pl-4 pr-4 pt-4">
        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
            <h4>About Data</h4>
        </div>
        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
            <button wire:click="$toggle('form')" class="btn btn-icon btn-lg btn-primary float-right">
                @if ($form == null)
                    <i class="far fa-edit"></i>
                    Create
                @else
                    <i class="far fa-list"></i>
                    List
                @endif
            </button>
        </div>
    </div>
    <div class="card-body">
        <div>
            @if($form == null)
                <div class="row mb-3">
                    <div class="col">
                        <select wire:model="paginate" name="" id="" class="form-control w-auto">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col">
                        <input wire:model="search" type="text" class="form-control" placeholder="search">
                    </div>
                </div>
                <hr>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index=>$item)
                            <tr>
                                <td scope="row">{{ ++$index }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <button wire:click="getContact({{ $item->id }})"
                                        class="btn btn-info text-white">Edit</button>
                                    <button wire:click="destroy({{ $item->id }})"
                                        class="btn btn-danger text-white">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            @else
                @if($statusUpdate)
                    <livewire:contact-update :data="$data"></livewire:contact-update>
                @else
                    <livewire:contact-create :data="$data"></livewire:contact-create>
                @endif
            @endif
        </div>
    </div>
</div>
