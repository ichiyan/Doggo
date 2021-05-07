@extends('layouts.main')

@section('hero')
<style>
.form-container {
    border: 2px solid black;
    background-color: rgba(219, 217, 217, 0.904);
    width: 1020px;
}


.form-row {
    display: flex;
    margin-bottom: 15px;
}

.col-1 {
    min-width: 270px;
    text-align: right;
    padding-top: 8px;
    letter-spacing: 1.5px;
}

.col-2 {
    margin-left: 20px;
}


</style>
@endsection

{{-- @section('hero')
<script>

    // $(document).on("submit", "#dog-validate", function(e) {
    //     e.preventDefault();
    //     var selectedVal= document.getElementById('DRN').value;
    //     $.ajax({
    //             type:"POST",
    //             url: "/getDog",
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             data:{ value:selectedVal},
    //             contentType: "application/json; charset=utf-8",
    //             dataType: "Json",
    //             success: function(result){
    //                 if(confirm(result.nrs)){
    //                      $("#dog-validate").submit();
    //               }
    //             }
    //         });
    // });
</script>
@endsection --}}

@section('main')

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

    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset class="form-group">
            <legend class="col-form-legend col-sm-5 pt-0">Post:</legend>
            <div class="form-group row">
                <label for="post-type" class="col-sm-2 col-form-label">Post Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="post-type" name="post-type">
                        <option value=1>Sell</option>
                        <option value=2>Stud</option>
                        <option value=3>Rehome</option>
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

            <div class="form-group row">
                <input type="file" name="file1" id="file1">
                <img src="" alt="" id="slot1" srcset="" class="image-fluid" style="height: 100px; width: 400px; display: none;">
            </div>
            <div class="form-group row">
                <input type="file" name="file2" id="file2">
                <img src="" alt="" id="slot2" srcset="" class="image-fluid" style="height: 100px; width: 400px; display: none;">
            </div>

            <div class="form-group row">
                <input type="file" name="file3" id="file3">
                <img src="" alt="" id="slot3" srcset="" class="image-fluid" style="height: 100px; width: 400px; display: none;">
            </div>

            <div class="form-group row">
                <input type="file" name="file4" id="file4">
                <img src="" alt="" id="slot4" srcset="" class="image-fluid" style="height: 100px; width: 400px; display: none;">
            </div>

            <div class="form-group row">
                <input type="file" name="file5" id="file5">
                <img src="" alt="" id="slot2" srcset="" class="image-fluid" style="height: 100px; width: 400px; display: none;">
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
    function addMorePhoto() {
        $container = document.createElement('div');
        container.innerHTML = "";
    }

    function readURL(input, slot) {
        console.log(input.files.length)

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(slot).attr('src', e.target.result);
                $(slot).attr('style', 'height: 100px; width: 400px; display: block;');
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    let arr = ['#file1', '#file2', '#file3', '#file4', '#file5'];
    let arr2 = ['#slot1', '#slot2', '#slot3', '#slot4', '#slot5'];

    $("#file1").change(function() {
        readURL(this, arr2[0]);
    });

    $("#file2").change(function() {
        readURL(this, arr2[1]);
    });

    $("#file3").change(function() {
        readURL(this, arr2[2]);
    });

    $("#file4").change(function() {
        readURL(this, arr2[3]);
    });

    $("#file5").change(function() {
        readURL(this, arr2[4]);
    });

</script>
@endsection
