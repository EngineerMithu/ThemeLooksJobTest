<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

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
                        User Student
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('user/update/'.$users->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" value="{{ $users->name }}"
                                    class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder=Name name="name">
                                <div id="emailHelp" class="form-text"></div>
                                @error('name')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" value="{{ $users->email }}"
                                    class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1"
                                    placeholder=Class name="email">
                                @error('email')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Birth Date</label>
                                <input type="date" value="{{ $users->birth_date }}"
                                    class="form-control @error('roll') is-invalid @enderror" id="exampleInputPassword1"
                                    placeholder=Roll name="birth_date">
                                @error('birth_date')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Country</label>
                              <select class="form-control" name="country">
                                <option value="" >--------- Select One --------</option>
                                <!-- @foreach($users as $user) -->
                                    <option value={{ $users->country}} > {{ $users->country }} </option>
                                <!-- @endforeach -->
                              </select>

                              @error('country')
                              <p class="text-danger">{{ $message}}</p>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">City</label>
                              <select class="form-control" name="city">
                                <option value="" >--------- Select One --------</option>
                                <!-- @foreach($users as $user) -->
                                    <option value={{ $users->city}} > {{ $users->city }} </option>
                                <!-- @endforeach -->
                              </select>

                              @error('city')
                              <p class="text-danger">{{ $message}}</p>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-info text-white btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
