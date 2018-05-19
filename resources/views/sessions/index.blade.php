@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-6">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">

                    <form action="{{ route('user.login') }}" method="post">

                        @csrf

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email: </label>
                            <input type="text" name="email" id="email" placeholder="Email"
                                   class="form-control">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                   class="form-control">
                            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection