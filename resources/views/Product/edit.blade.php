<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Laravel 8 Crud</title>
</head>

<body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header text-white bg-info">
                        Edit Product
                    </div>
                    <div class="card-body">
                        <form action="{{ url('product/update/'.$products->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" value="{{ $products->product_name }}"
                                    class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder=Name name="product_name">
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-3">Gender</label>
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <label class="mr-3">
                                            <input type="radio" value="Male"
                                                {{$products->gender == 'Male' ? 'checked' : ''}} name="gender" /> Male
                                        </label>
                                        <label>
                                            <input type="radio" value="Female"
                                                {{$products->gender == 'Female' ? 'checked' : ''}} name="gender" />
                                            Female
                                        </label>
                                    </div>
                                    @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-3">Color</label>
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <label class="mr-3">
                                            <input type="radio" value="Black"
                                                {{$products->color == 'Black' ? 'checked' : ''}} name="color" /> Black
                                        </label>
                                        <label>
                                            <input type="radio" value="White"
                                                {{$products->color == 'White' ? 'checked' : ''}} name="color" /> White
                                        </label>
                                    </div>
                                    @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="exampleInputEmail1" class="form-label">Product Size</label>
                                <input type="text" value="{{ $products->size }}"
                                    class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder=Name name="size">
                                <div id="emailHelp" class="form-text"></div>
                                @error('name')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                <input type="number" value="{{ $products->price }}"
                                    class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder=Name name="price">
                                <div id="emailHelp" class="form-text"></div>
                                @error('name')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info text-white">Update</button>
                        </form>
                    </div>
                </div>
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
</body>

</html>
