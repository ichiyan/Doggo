<div>

    <div class="row justify-content-center" >
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header ">
                    Sell a dog
                </div>

                <div class="card-content p-5">
                    <form wire:submit.prevent="submitForm">
                        <fieldset>

                            <input type="hidden" name="post-type" value=1>

                            <div class="form-group">
                                {{-- <label for="registered_number" class="col-sm-2 col-form-label">DRN *</label> --}}
                                <label for="registered_number">DRN *</label>
                                <div>
                                    <input wire:model.lazy="registered_number" class="form-control" type="text" id="registered_number" name="registered_number" placeholder="Dog's Registered Number">
                                    @error('registered_number')<span class="error">{{$message}}</span>@enderror
                                    @if (session()->has('registered_number'))
                                        <div class="alert alert-success">
                                            {{ session('registered_number') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {{-- <label for="post_title" class="col-sm-2 col-form-label">Title</label> --}}
                                <label for="post_title">Title</label>
                                <div>
                                    <input wire:model.lazy="post_title" class="form-control" type="text" id="post_title" name="post_title" placeholder="Post Title...">
                                    @error('post_title')<span class="error">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                {{-- <label for="post_description" class="col-sm-2 col-form-label">Description</label> --}}
                                <label for="post_description">Description</label>
                                <div>
                                    <textarea wire:model.lazy="post_description" class="form-control" id="post_description" name="post_description"
                                        placeholder="Write something.." style="height:220px; width: 500px;"></textarea>
                                        @error('post_description')<span class="error">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                {{-- <label for="price" class="col-sm-2 col-form-label">Price</label> --}}
                                <label for="price">Price</label>
                                <div>
                                    <input wire:model.lazy="price" class="form-control" type="text" id="price" step="any" min="1" maxlength="12" name="price" placeholder="Price..">
                                    @error('price')<span class="error">{{$message}}</span>@enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="images" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                    <input type="file" id="images" name="file" placeholder="Images...">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                {{-- <label for="images" class="col-sm-2 col-form-label">Images</label> --}}
                                <label for="images">Images</label>
                                <div>
                                    <input wire:model="photos" type="file" id="images" name="photos" placeholder="Images..." multiple>
                                    <br>@error('photos') <span class="error">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="photo">Uploading...</div>
                                </div>
                                @if ($photos)
                                {{-- <div class="col-sm-3 col-form-label"><b>Photo Preview</b></div> --}}
                                <div class="form-group"><b>Photo Preview:</b></div>
                                <div class="previews form-group" style=" display: flex; justify-content: start; width: 650px; flex-wrap: wrap; align-items: center; align-content: flex-start;">
                                    @foreach ($photos as $image)
                                        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="height: 150px; width: 150px;">
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </fieldset>

                        <div class="footer row justify-content-end">
                            <input type="submit" value="Submit Post" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>

    </div>
</div>
