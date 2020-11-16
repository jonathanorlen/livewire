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
                <input wire:model="picture" type="file" name="picture" id=""
                    class="form-control @error('picture') is-invalid @enderror" placeholder="Number">
                @error('picture')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if($picture)
                    <label for="">Preview</label>
                    <img src="{{ $picture->temporaryUrl() }}" width="100%">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>
