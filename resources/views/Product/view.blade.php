<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 style="float:left" class="text-secondary"><strong>Total Products {{ count($products)}}
                        </strong></h6>
                    <button class="btn btn-sm btn-primary" style="float:right;" data-toggle="modal"
                        data-target="#addStudentModal"><i class="fa-solid fa-plus"></i> Add New Products</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped ">
                        <thead class="bg-info text-white">
                            <tr>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name}}</td>
                                <td>{{ $product->gender}}</td>
                                <td>{{ $product->color}}</td>
                                <td>{{ $product->size}}</td>
                                <td>{{ $product->price}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <a href="{{ url('product/edit/' .$product->id) }}"
                                        class="fa fa-edit btn btn-success"></a>
                                    <a href="{{ url('product/delete/' .$product->id)}}"
                                        onclick="return confirm('Are you sure to delete?')"
                                        class="fa fa-trash btn btn-danger"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('product/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="product_name" class="col-3">Product *</label>
                        <div class="col-9">
                            <input type="text" id="product_name" class="form-control" wire:model="product_name"
                                placeholder="Product Name" name="product_name">
                            @error('product_name')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-3">Gender</label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <label class="mr-3"><input type="radio" name="gender" value="Male" /> Male</label>
                                <label><input type="radio" name="gender" value="Female" /> Female</label>
                            </div>
                            @error('name')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-3">Color *</label>
                        <div class="col-9">
                            <div class="form-check form-check-inline ">
                                <label class="mr-3"><input type="radio" name="color" value="Black" required />
                                    Black</label>
                                <label><input type="radio" name="color" value="White" required /> White</label>
                            </div>
                            @error('email')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-3">Size *</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="form-control" wire:model="size" placeholder="Size"
                                name="size">
                            @error('white')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-3">Price *</label>
                        <div class="col-9">
                            <input type="number" id="price" class="form-control" wire:model="size" placeholder="Price"
                                name="price">
                            @error('price')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-3"></label>
                        <div class="col-9">
                            <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@if(Session::has('message'))
<script>
    $(document).ready(function () {
        toastr.success('{{Session::get('message') }}');
    })
</script>
@endif

@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $('#addStudentModal').modal('hide');
    });

</script>
@endpush
</div>
