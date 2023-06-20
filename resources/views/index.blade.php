<!-- resources/views/club/index.blade.php -->
@extends('partials.main')

@section('content')
    <div class="container mt-5">
        <h1>Tampilan Klasemen</h1>
        <a href="{{ route('macth.create') }}" class="btn btn-warning mt-3">+ Score</a>


        <table class="table mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Klub</th>
                    <th>Ma</th>
                    <th>Me</th>
                    <th>S</th>
                    <th>K</th>
                    <th>GM</th>
                    <th>GK</th>
                    <th>Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clubs as $index => $club)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->ma }}</td>
                        <td>{{ $club->me }}</td>
                        <td>{{ $club->s }}</td>
                        <td>{{ $club->k }}</td>
                        <td>{{ $club->gm }}</td>
                        <td>{{ $club->gk }}</td>
                        <td>{{ $club->point }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
