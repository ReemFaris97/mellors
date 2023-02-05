<div class="row">

    <div class="form-group">
        <label for="name"> Upload Rides Report </label>
        <input type="file" name="file"  class="form-control" required >
        @error('file')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>

