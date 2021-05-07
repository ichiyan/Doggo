@extends('form2')

@section('sell')

<div id="myModal" tabindex="-1" style="margin-top: 100px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">PCCI Registered</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form class="needs-validation" id="dog-validate" method="GET" action="{{ url('/dog') }}">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-row">
                  <div class="col-md-7 mb-3">
                    <label for="DRN">Dog Registered Number</label>
                    <input type="text" class="form-control" id="DRN" name="DRN" placeholder="Dog Registered NumberNumber" value="" required>

                    @isset(session('dog')->code_response)
                        {!! session('dog')->code_response !!}
                    @endisset

                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="dog-validate-submit" class="btn btn-primary">Verify</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="form-container" style="margin: 0 auto; margin-top: 100px;">
    <div class="form-group">
        <div class="col-sm-10">
            <a data-toggle="modal" data-target="#myModal" style="color:rgba(1, 102, 133, 0.979)"><b>Already a registered dog?</b></a>
        </div>
    </div>

    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data" id="image-upload"  class="dropzone dz-clickable">
        @csrf
        <fieldset class="form-group">
            <legend class="col-form-legend col-sm-5 pt-0">Post:</legend>
            <div class="form-group row">
                <label for="post-type" class="col-sm-2 col-form-label">Post Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="post-type" name="post-type" data-aos="fade-up">
                        <option value="Sell">Sell</option>
                        <option value="Stud">Stud</option>
                        <option value="Rehome">Rehome</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="post-title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="post-title" name="post-title" placeholder="Post Title...">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description"
                     placeholder="Write something.." style="height:220px; width: 500px;"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="price" step="any" min="1" maxlength="12" name="price" placeholder="Price..">
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h3 class="text-center">Upload Image by Clicking on the box.</h3>
                        </div>
                        <div class="dz-default dz-message"><span>Drop Files Here to upload</span></div>
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <input type="hidden" id="kennel" name="kennel"
                    @isset(session('fill')->kennel_name)
                        value="{{session('fill')->kennel_name}}" disabled
                    @endisset
        placeholder="Kennel Name...">

        <input class="form-control" type="hidden" id="dog-breed" name="breed"
                    @isset(session('fill')->breed)
                        value="{{session('fill')->breed}}" disabled
                    @endisset
        placeholder="Dog Breed..">

        <input class="form-control" type="hidden" maxlength="3" id="birthdate" name="age"
                    @isset(session('fill')->age)
                        value="{{session('fill')->age}}" disabled
                    @endisset
        placeholder="birthdate...">

        <div class="form-group">
        @isset(session('fill')->kennel_name)
            <h2>Dog Information</h2>
            <span><b>Registered Number:</b> {{session('fill')->registered_number}}</span><br>
            <span><b>Kennel Name:</b> {{session('fill')->kennel_name}}</span><br>
            <span><b>First Name:</b> {{session('fill')->first_name}}</span><br>
            <span><b>Birthdate: </b>{{session('fill')->age}}</span><br>
            <span><b>Gender:</b> {{session('fill')->gender}}</span><br>
            <span><b>Dog Breed:</b> {{session('fill')->breed}}</span><br>
        @endisset
        </div>

        <div class="form-group">
            <div style="margin-left: 90%;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('dropzone')
<script>
    Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            url: 'upload_files.php',
            init: function () {

                var myDropzone = this;

                // Update selector to match your button
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('drop', function(file, xhr, formData){
                    myDropzone.processQueue();
                });

                this.on('sending', function(file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $('#myDropzone').serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            }
    }
</script>
@endsection




