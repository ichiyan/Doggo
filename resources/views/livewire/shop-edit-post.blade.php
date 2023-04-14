<div class="limiter">
    <div class="container-new-post100">
        <div class="wrap-new-post100">
            <div class="new-post100-form-title">
                <span class="new-post100-form-title-1">
                    Edit Post
                </span>
            </div>

            <form class="new-post100-form" onkeydown="return event.key != 'Enter';">
                <fieldset class="form-group" style="width: 100%">

                    <input type="hidden" name="post-type" value=1>

                    {{-- DRN cannot be determined from posts table --}}
                    {{-- <div class="form-group">
                        <label for="registered_number">DRN *</label>
                        <div>
                            <input wire:model.lazy="registered_number" class="form-control" type="text" id="registered_number" name="registered_number" placeholder="Dog's Registered Number" value="">
                            @error('registered_number')<span class="error">{{$message}}</span>@enderror
                            @if (session()->has('registered_number'))
                                <div class="alert alert-success">
                                    {{ session('registered_number') }}
                                </div>
                            @endif
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <div>
                            <input wire:model.lazy="post_title" class="form-control" type="text" id="post_title" name="post_title" value= "{{$post_title}}">
                            @error('post_title')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_description">Description</label>
                        <div>
                            <textarea wire:model.lazy="post_description" class="form-control" id="post_description" name="post_description"
                                placeholder="Write something.." style="height:220px;">{{$post_description}}</textarea>
                                @error('post_description')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <div>
                            <input wire:model.lazy="price" class="form-control" type="text" id="price" step="any" min="1" maxlength="12" name="price" placeholder="Price.." value="{{$price}}">
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
                        {{-- <div class="previews form-group" style=" display: flex; justify-content: start; width: 650px; flex-wrap: wrap; align-items: center; align-content: flex-start;"> --}}
                        <div class="row gy-2">
                            @foreach ($photos as $image)
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="">
                                    <a class="remove-image" wire:click.prevent="removeImgPreview({{$loop->index}})" style="display: inline;">&#215;</a>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-group"><b>Images Used:</b></div>
                        <div class="row gy-2">
                            @foreach ($images as $image)

                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div  id="pic{{$image->id}}" style="display: block">
                                        <img src="{{ asset('storage/posts/'.$image->image_location) }}" class="img-thumbnail" style="">
                                        <a  class="remove-image" data-toggle="modal" data-target="#deleteImage{{$image->id}}Modal" style="display: inline;">&#215;</a>
                                        {{-- <a class="remove-image" style="display: inline;" onclick="document.getElementById('pic{{$image->id}}').style.display = 'none'; {{ array_push($dbphotos, $image->id) }}">&#215;</a> --}}
                                    </div>
                                </div>

                                {{--should not reload--}}
                                <!-- Delete Image Modal-->
                                <div class="modal fade" id="deleteImage{{$image->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Image?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below to delete image.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-danger" wire:click="deleteImage({{$image->id}})" >Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>

                    {{-- @php var_dump($dbphotos) @endphp --}}

                </fieldset>

                <div class="container footer">
                    <div class="row justify-content-around">
                        <div class="col-4 text-center">
                            <input value="Update Post" class="btn btn-block cust-btn-primary" wire:click="update({{$post_id}})">
                        </div>
                        <div class="col-4 text-center">
                            {{--supposed to redirect to previous page but url()->previous() doesnt work for some reason--}}
                            <button class="btn btn-block cust-btn-light"><a href="{{ route('profile_all', $post_user_id) }}" style="color: black">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



