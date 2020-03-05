<div class="modal fade" id="view{{$product->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Name</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->product_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Short Description</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->short_desc}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Long Description</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->long_desc}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Size</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->product_size}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Quantity</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->product_qty}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Main Image</h5>
                            </div>
                            <div class="col-md-8">
                                <img src="{{asset($product->main_image)}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Gallery</h5>
                            </div>
                            <div class="col-md-8">
                                @foreach(json_decode($product->imagefile) as $img)
                                <img src="{{asset($img)}}" width="100">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

