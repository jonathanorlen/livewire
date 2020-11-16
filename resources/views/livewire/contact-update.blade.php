<div>
    <form wire:submit.prevent="update">
        <input type="hidden" name="id" wire:model="ContactId">
        <div class="form-row">
            <div class="col-md-6">
                <input wire:model="name" type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <input wire:model="phone" type="number" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" placeholder="Number">
                @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Update</button>
    </form>
</div>