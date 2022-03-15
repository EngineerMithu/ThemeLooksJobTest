@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @php
                    $online_user = 1;
                    @endphp
                    @foreach ($users as $user)
                    @php
                    if($user->userIsOnline()){
                    $online_user = $online_user + 1;
                    }
                    @endphp
                    @endforeach
                    <h6 style="float:left" class="text-secondary"><strong>Total Users {{ count($users)}} and Active User
                    <span class="badge badge-pill badge-success">{{ $online_user }}</span>
                    </strong></h6>

                </div>
                @if(session('update'))
                <div class="alert alert-primary alert-dismissible fade show m-2" role="alert">
                    <strong>{{ session('update') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birth Day</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Create At</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count($users) > 0)
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->birth_date }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('user/edit/'.$user->id) }}" class="fa fa-edit btn btn-info"></a>
                                        <a href="{{ url('user/delete/'.$user->id) }}"
                                            onclick="return confirm('Are you sure to delete?')"
                                            class="fa fa-trash btn btn-danger"></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="4" style="text-align: center;"><small>No Student Found</small></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
