@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body"> -->
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <div class="container py-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="float:left" class="text-secondary"><strong>All Users Information</strong></h6>
                                            <!-- <button class="btn btn-sm btn-primary" style="float:right;" data-toggle="modal" data-target="#addStudentModal">Add New Student</button> -->
                                        </div>

                                        <div class="card-body">
                                            @if(session()->has('message'))
                                                <div class="alert alert-success text-center">{{ session('message') }}</div>
                                            @endif

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Birth Day</th>
                                                        <th>Country</th>
                                                        <th>City</th>
                                                        <!-- <th>Create At</th> -->
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if ($users->count() > 0)
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->birth_date }}</td>
                                                            <td>{{ $user->country }}</td>
                                                            <td>{{ $user->city }}</td>
                                                        
                                                            <td style="text-align: center;">
                                                                <button class="btn btn-sm btn-success" wire:click="viewStudentDetails({{ $user->id }})">View</button>
                                                                <button class="btn btn-sm btn-warning" wire:click="editStudents({{ $user->id }})">Edit</button>
                                                                <button class="btn btn-sm btn-danger btn-edit" wire:click="deleteConfirmation({{ $user->id }})">Delete</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
