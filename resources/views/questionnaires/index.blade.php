@extends('layouts.master')

@section('content')
    <h3>Questionnaires
        <a href="{{ route('questionnaires.create') }}"><button class="btn btn-default">Create</button></a>
    </h3>
    <hr>

    @if ( session()->has('msg') )
        <div class="alert alert-success">{{ session()->get('msg') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number of Questions</th>
                <th>Duration</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($questionnaires as $questionnaire)
            <tr>
                <td>{{ $questionnaire->id }}</td>
                <td>{{ $questionnaire->name }}</td>
                <td>{{ $questionnaire->questions->count() }} | <a href="{{ route('question.add', $questionnaire->id) }}">Add</a></td>
                <td>{{ $questionnaire->duration }}</td>
                <td>
                    @if ($questionnaire->isPublished)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td><a href="">Edit</a> | Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection