<div>
    <form wire:submit.prevent="store">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Name</label>
                <input wire:model="name" type="text" name="name" id=""
                    class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="">Number Phone</label>
                <input wire:model="phone" type="number" name="phone" id=""
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Number">
                @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="">Picture</label>
                <input wire:model="avatar" type="file" name="avatar" id=""
                    class="form-control @error('avatar') is-invalid @enderror" placeholder="Number">
                @error('avatar')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if($avatar)
                    <label for="">Preview</label>
                    <img src="{{ $avatar->temporaryUrl() }}" width="100%">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>
