@extends('partials.main')
@section('content')
    <div class="container mt-5 mb-2">
        <h1>Tambah Skor Pertandingan</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">

                    {{ $error }}

                </div>
            @endforeach
        @endif

        <hr class="mt2">
        <a href="{{ route('match.multipleSee') }}" class="btn btn-info text-white">+ multiple add score</a>
        {{-- form --}}
        <form class="mt-3" action="{{ route('macth.store') }}" method="post">
            @csrf

            <div class="row">

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for="club_a_id" class="form-label">Klub A:</label>
                        <select name="club_a_id" id="club_a_id" class="form-control">
                            <option value="">Pilih Klub A</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for="score_a" class="form-label">Skor Klub A:</label>
                        <input type="number" name="score_a" id="score_a" class="form-control" required>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for="club_b_id" class="form-label">Klub B:</label>
                        <select name="club_b_id" id="club_b_id" class="form-control">
                            <option value="">Pilih Klub B</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mt-3">

                    <div class="form-group">
                        <label for="score_b" class="form-label">Skor Klub B:</label>
                        <input type="number" name="score_b" id="score_b" class="form-control" required>
                    </div>
                </div>
            </div>


            <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
        </form>
        {{-- end --}}
    </div>
@endsection
