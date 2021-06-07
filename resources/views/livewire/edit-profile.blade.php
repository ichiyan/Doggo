<div class="limiter">
    <div class="container-new-post100">
        <div class="wrap-new-post100">
            <div class="new-post100-form-title">
                <span class="new-post100-form-title-1">
                    Edit Profile
                </span>
            </div>

            <form class="new-post100-form" wire:submit.prevent="update({{$user_id}})">
                <fieldset class="form-group" style="width: 100%">

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img id="profile-pic"  src="{{ asset($user->profile_pic) }}" alt=""/>
                                <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input wire:model="new_photo" type="file" id="new_photo" name="new_photo" placeholder="Images..." multiple accept="new_photo/*">
                                    <br>@error('new_photo') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if($new_photo)
                                    @php
                                        echo "<script>document.getElementById('profile-pic').src = '{{$new_photo[0]->temporaryURL()}}'</script>";
                                    @endphp
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div>
                            <input wire:model.lazy="name" class="form-control" type="text" id="name" name="name" value= "{{$name}}">
                            @error('name')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <div>
                            <input wire:model.lazy="birthdate" class="form-control" type="date" id="birthdate" name="birthdate" value= "{{$birthdate}}">
                            @error('birthdate')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <div>
                            <input wire:model.lazy="address" class="form-control" type="text" id="address" name="address" value= "{{$address}}">
                            @error('address')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div>
                            <input wire:model.lazy="email" class="form-control" type="email" id="email" name="email" value= "{{$email}}">
                            @error('email')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact_no">Contact Number</label>
                        <div>
                            <input wire:model.lazy="contact_no" class="form-control" type="tel" id="contact_no" name="contact_no" value= "{{$contact_no}}">
                            @error('contact_no')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <div>
                            <input wire:model.lazy="username" class="form-control" type="text" id="username" name="username" value= "{{$username}}">
                            @error('username')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <div>
                            <textarea wire:model.lazy="bio" class="form-control" id="bio" name="bio"
                                placeholder="Tell us about yourself.." style="height:220px;">{{$bio}}</textarea>
                                @error('bio')<span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>


                </fieldset>

                <div class="container footer">
                    <div class="row justify-content-around">
                        <div class="col-4 text-center">
                            {{-- <input value="Update Profile" class="btn btn-block cust-btn-primary" wire:click="update({{$post_id}})"> --}}
                            <button type="submit" class="btn btn-block cust-btn-primary" value="Update Profile">Update Profile</button>
                        </div>
                        <div class="col-4 text-center">
                            <button class="btn btn-block cust-btn-light"><a href="{{ route('profile_all', $user_id) }}" style="color: black">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


