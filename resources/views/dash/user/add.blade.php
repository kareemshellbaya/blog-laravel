
@extends('dash.layouts.app')
@section('title' , 'user')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Default Layout</h5>
            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.</p>
            <div class="row">
                <div class="col-sm">
                    <form  action="{{ route('dashboard.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input name="name" value="{{ old('name') }}" class="form-control" id="username" placeholder="Username" type="text">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" value="{{ old('email') }}"  class="form-control" id="email" placeholder="you@example.com" type="email">
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="email">Password</label>
                            <input name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Password" type="password">
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($dataRole as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>

                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </section>
            </div>
        </div>
@endsection
