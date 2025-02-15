@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Hasil Quiz</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td>{{ $score->user->name }}</td>
                        <td>{{ $score->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
