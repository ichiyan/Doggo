@extends('layouts.main')

@section('asset')
<style>
.form-container {
    border: 2px solid black;
    background-color: rgba(219, 217, 217, 0.904);

    height: 920px;
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
@section('body')
<div class="form-container">
    <div class="form-row">
        <div class="col-1">
          <label for="post">Type of Post</label>
        </div>
        <div class="col-2">
          <select id="post" name="post">
            <option value="Sell">Sell</option>
            <option value="Stud">Stud</option>
            <option value="Rehome">Rehome</option>
          </select>
        </div>
    </div>
    <form action="#">

      <div class="form-row">
        <div class="col-1">
          <label for="listing-title">Listing Title</label>
        </div>
        <div class="col-2">
          <input type="text" id="listing-title" name="title" placeholder="Post Title...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="dog-breed">Dog Breed</label>
        </div>
        <div class="col-2">
          <input type="text" id="dog-breed" name="breed" placeholder="Dog Breed..">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="price">Price</label>
        </div>
        <div class="col-2">
          <input type="number" id="price" step="0.01" min="0" maxlength="12" name="price" placeholder="Price..">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="age">Age</label>
        </div>
        <div class="col-2">
          <input type="number" maxlength="3" id="age" name="age" placeholder="Age in months...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="description">Description</label>
        </div>
        <div class="col-2">
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:220px; width: 500px;"></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="region">Region</label>
        </div>
        <div class="col-2">
          <input type="text" id="region" name="region" placeholder="Region...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="address">Address</label>
        </div>
        <div class="col-2">
          <input type="text" id="address" name="address" placeholder="Address...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="images">Images</label>
        </div>
        <div class="col-2">
          <input type="file" id="images" name="images" placeholder="Images...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="reg-num">Dog PCCI Registration Number</label>
        </div>
        <div class="col-2">
            <input type="text" id="reg-num" name="reg-num" placeholder="Reg. Number...">
        </div>
      </div>

      <div class="form-row">
        <div class="col-1">
          <label for="kennel">Registered Kennel Name</label>
        </div>
        <div class="col-2">
            <input type="text" id="kennel" name="kennel" placeholder="Kennel Name...">
        </div>
      </div>

      <div class="form-row" style="margin-left: 70%;">
        <input type="submit" value="Submit" style="width: 100px;">
      </div>
    </form>
</div>
@endsection
