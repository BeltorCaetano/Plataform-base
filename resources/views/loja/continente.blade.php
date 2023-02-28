<form action="api/store" method='POST' enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <label for="image">
            <img class="rounded-circle mt-5" width="150px" src="images/uploadIcon.png">
            <input type="file" name="txt" id="image" style="display: none;">
        </label>
        @error('file_path')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit"></div>
                        
        </span></div>
    </div>

</form>


