@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Quiz</h2>
    <form action="{{ route('scores.store') }}" method="POST">
        @csrf
        @foreach($quizzes as $quiz)
            <p>{{ $quiz->question }}</p>
            <input type="radio" name="quiz_{{ $quiz->id }}" value="A"> {{ $quiz->option_a }}<br>
            <input type="radio" name="quiz_{{ $quiz->id }}" value="B"> {{ $quiz->option_b }}<br>
            <input type="radio" name="quiz_{{ $quiz->id }}" value="C"> {{ $quiz->option_c }}<br>
            <input type="radio" name="quiz_{{ $quiz->id }}" value="D"> {{ $quiz->option_d }}<br>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
