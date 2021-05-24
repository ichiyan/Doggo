<div class="limiter">
    <div class="container-new-post100">
        <div class="wrap-new-post100">
            <div class="new-post100-form-title">
                <span class="new-post100-form-title-1">
                    Create a New Post
                </span>
            </div>

            <form class="new-post100-form" wire:submit.prevent="submitForm">
                <fieldset class="form-group" style="width: 100%">

                    <input type="hidden" name="post-type" value=1>

                    <div class="form-group">
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
                        <label for="post_title">Title</label>
                        <div>
                            <input wire:model.lazy="post_title" class="form-control" type="text" id="post_title" name="post_title" placeholder="Post Title...">
                            @error('post_title')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_description">Description</label>
                        <div>
                            <textarea wire:model.lazy="post_description" class="form-control" id="post_description" name="post_description"
                                placeholder="Write something.." style="height:220px;"></textarea>
                                @error('post_description')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <div>
                            <input wire:model.lazy="price" class="form-control" type="text" id="price" step="any" min="1" maxlength="12" name="price" placeholder="Price..">
                            @error('price')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="images">Images</label>
                        <div>

                            <input wire:model="photos" type="file" id="images" name="photos[]" placeholder="Images..." multiple accept="image/*">
                            <br>@error('photos') <span class="error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="photo">Uploading...</div>
                        </div>
                        @if ($photos)
                        <div class="form-group"><b>Photo Preview:</b></div>
                        <div class="previews form-group" style=" display: flex; justify-content: start; width: 650px; flex-wrap: wrap; align-items: center; align-content: flex-start;">
                            @foreach ($photos as $image)
                               <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="height: 150px; margin-right: 2%">
                            @endforeach
                        </div>
                        @endif
                    </div>
                </fieldset>

                <div class="container footer">
                    <div class="row justify-content-center">
                        <div class="col-5 text-center">
                            <input type="submit" value="Submit Post" class="btn cust-btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

