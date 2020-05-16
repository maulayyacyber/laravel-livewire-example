<div>
    <div class="card mb-3">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <input wire:model="name" type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input wire:model="phone" type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                            @error('phone')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success btn-block">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>