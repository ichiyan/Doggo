<div>
    @if (session()->has('dog'))
    <div class="media">
        <div class="media-body">
          <h5 class="mt-0">Dog</h5>
          <ul>
              <li><b>{{session('dog')->kennel_name}}</b>, {{session('dog')->first_name}}</li>
              <li></li>
          </ul>
        </div>
    </div>
    @endif
    <form wire:submit.prevent="submitForm" >
        <fieldset class="form-group">
            <legend class="col-form-legend col-sm-5 pt-0">Post:</legend>

            <div class="form-group row">
                <label for="DRN" class="col-sm-2 col-form-label">DRN *</label>
                <div class="col-sm-10">
                    <input wire:dirty.class="success-field" wire:model.lazy="registered_number" class="form-control" type="text" id="DRN" name="registered_number" placeholder="Dog's Registered Number">
                    @error('registered_number') <span class="error ">{{ $message }}</span> @enderror
                    @if (session()->has('DRNExists'))
                        <div class="alert alert-success">
                            {{ session('DRNExists') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="DRN" class="col-sm-2 col-form-label">DRN *</label>
                <div class="col-sm-10">
                    <input wire:dirty.class="success-field" wire:model.lazy="registered_number" class="form-control" type="text" id="DRN" name="registered_number" placeholder="Dog's Registered Number">
                    @error('registered_number') <span class="error ">{{ $message }}</span> @enderror
                    @if (session()->has('DRNExists'))
                        <div class="alert alert-success">
                            {{ session('DRNExists') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="post_title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input wire:model="post_title" class="form-control" type="text" id="post_title" name="post_title" placeholder="Post Title...">
                    @error('post_title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="post_description"
                     placeholder="Write something.." style="height:220px; width: 500px;"></textarea>
                     @error('post_description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div> --}}

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input wire:dirty.class="success-field" wire:model="price" class="form-control" type="text" id="price" step="any" min="1" maxlength="12" name="price" placeholder="Price..">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="images" class="col-sm-2 col-form-label">Images</label>
                <div class="col-sm-10">
                    <input type="file" id="images" name="file" placeholder="Images...">
                </div>
            </div> --}}
        </fieldset>

        <div class="form-group">
            <div style="margin-left: 90%;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>

