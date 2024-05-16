@extends('layouts.app')
@section('content')
    <h1>Employee ID: {{ $employee_id }}</h1>
    @if (count($lessons) == 0)
        <p>No lessons found</p>
    @endif

    @if (count($lessons) > 0 )
        @foreach ($lessons as $lesson)
        <p>{{ $lesson['id'] }} - {{ DateToDay::toDay($lesson['start_at']['date']) }} @ {{ DateToDay::toTime($lesson['start_at']['date']) }}</p>
        @endforeach
    @endif
@endsection