@extends('layouts.app')

@section('content')
    <div class="employrs">
    @foreach ($employees as $employee)
    <p class="pb-4 flex justify-between">{{ $employee['title'] }} {{ $employee['forename'] }} {{$employee['surname'] }}<a href="/employee/{{ $employee['id'] }}">Lessons</a></p>
    @endforeach
    </div>
@endsection