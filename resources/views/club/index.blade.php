<!-- resources/views/club/index.blade.php -->
@extends('partials.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Data Club</h1>

                <a href="{{ route('club.create') }}" class="btn btn-primary mt-3">+ Tambah Klub</a>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Klub</th>
                            <th>Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clubs as $index => $club)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->city }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
