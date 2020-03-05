<div class="modal fade" id="edit{{$brand->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" value="{{$brand->brand_name}}" name="brand_name" class="form-control" placeholder="Enter Category Name">
                        <input type="hidden" value="{{$brand->id}}" name="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Brand Description</label>
                        <textarea class="form-control" name="brand_desc"  placeholder="Category Description">{{$brand->brand_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Brand Image</label>
                        <input type="file" name="brand_image" class="form-control-file">
                        <img src="{{asset($brand->brand_image)}}">
                    </div>
                    <div class="form-group">
                        <label>Publication Status</label>
                        <input type="radio" name="status" value="1" {{$brand->status == 1?'Checked':''}}>
                        <label>Published</label>
                        <input type="radio" name="status" value="0" {{$brand->status == 0?'Checked':''}}>
                        <label>Unpublished</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
