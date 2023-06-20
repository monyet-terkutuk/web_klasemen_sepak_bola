<!-- resources/views/klub/create.blade.php -->
@extends('partials.main')

@section('content')
    <div class="container mt-5">
        <h1>Input Data Klub</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">

                    {{ $error }}

                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('club.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Klub</label>
                        <input type="text" class="form-control mb-3" id="nama" name="name"
                            value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kota" class="form-label">Kota Klub</label>
                        <input type="text" class="form-control" id="kota" name="city" value="{{ old('kota') }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
