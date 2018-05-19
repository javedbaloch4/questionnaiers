@extends('layouts.master')

@section('content')
    <h3>Create</h3>
    <hr>

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

            <form action="{{ route('questionnaires.store') }}" method="post">

                @csrf

                <div class="form-group">
                    <label for="questionnaier_name">Questionnaier Name: </label>
                    <input type="text" name="questionnaier_name" id="questionnaier_name" class="form-control"
                           placeholder="Questionnaier Name">
                </div>

                <div class="form-group form-inline">
                    <label for="duration">Duration: </label><br>
                    <input type="text" placeholder="Enter duration" id="duration" name="duration" class="form-control">
                    <select name="minutes" class="form-control">
                        <option value="minutes">Minutes</option>
                        <option value="hours">Hours</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="resume">Can Resume?</label>
                    &nbsp; &nbsp; &nbsp; &nbsp;

                    <label for="yes">Yes</label>
                    <input type="radio" name="resume" value="1" id="yes">
                    <label for="no"> No</label>
                    <input type="radio" name="resume" value="0" id="no">
                </div>

                <div class="form-group">
                    <button class="btn btn-default">Save</button>
                </div>
            </form>

        </div>
    </div>

@endsection