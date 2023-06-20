@extends('partials.main')
@section('content')
    <div class="container mt-5">
        <h1>Tambah Skor Pertandingan (Multiple)</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        {{-- form --}}
        <form action="{{ route('match.storeMultiple') }}" method="post">
            @csrf

            <div id="matches">
                <div class="row match">
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="club_a_id" class="form-label">Klub A:</label>
                            <select name="club_a_id[]" class="form-control" required>
                                <option value="">Pilih Klub A</option>
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="score_a" class="form-label">Skor Klub A:</label>
                            <input type="number" name="score_a[]" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="club_b_id" class="form-label">Klub B:</label>
                            <select name="club_b_id[]" class="form-control" required>
                                <option value="">Pilih Klub B</option>
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="score_b" class="form-label">Skor Klub B:</label>
                            <input type="number" name="score_b[]" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" id="addMatch" class="mt-3 btn btn-primary">Tambah Pertandingan</button>
            <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
        </form>

        @push('scripts')
            <script>
                // Tambahkan event listener untuk tombol "Tambah Pertandingan"
                document.getElementById('addMatch').addEventListener('click', function() {
                    var matchDiv = document.createElement('div');
                    matchDiv.className = 'row match';

                    var clubASelect = document.createElement('select');
                    clubASelect.name = 'club_a_id[]';
                    clubASelect.className = 'form-control';
                    clubASelect.required = true;
                    var clubAOption = document.createElement('option');
                    clubAOption.value = '';
                    clubAOption.text = 'Pilih Klub A';
                    clubASelect.appendChild(clubAOption);
                    @foreach ($clubs as $club)
                        var clubAOption_{{ $club->id }} = document.createElement('option');
                        clubAOption_{{ $club->id }}.value = '{{ $club->id }}';
                        clubAOption_{{ $club->id }}.text = '{{ $club->name }}';
                        clubASelect.appendChild(clubAOption_{{ $club->id }});
                    @endforeach

                    var scoreAInput = document.createElement('input');
                    scoreAInput.type = 'number';
                    scoreAInput.name = 'score_a[]';
                    scoreAInput.className = 'form-control';
                    scoreAInput.required = true;

                    var clubBSelect = document.createElement('select');
                    clubBSelect.name = 'club_b_id[]';
                    clubBSelect.className = 'form-control';
                    clubBSelect.required = true;
                    var clubBOption = document.createElement('option');
                    clubBOption.value = '';
                    clubBOption.text = 'Pilih Klub B';
                    clubBSelect.appendChild(clubBOption);
                    @foreach ($clubs as $club)
                        var clubBOption_{{ $club->id }} = document.createElement('option');
                        clubBOption_{{ $club->id }}.value = '{{ $club->id }}';
                        clubBOption_{{ $club->id }}.text = '{{ $club->name }}';
                        clubBSelect.appendChild(clubBOption_{{ $club->id }});
                    @endforeach

                    var scoreBInput = document.createElement('input');
                    scoreBInput.type = 'number';
                    scoreBInput.name = 'score_b[]';
                    scoreBInput.className = 'form-control';
                    scoreBInput.required = true;

                    matchDiv.appendChild(createColumnDiv(clubASelect));
                    matchDiv.appendChild(createColumnDiv(scoreAInput));
                    matchDiv.appendChild(createColumnDiv(clubBSelect));
                    matchDiv.appendChild(createColumnDiv(scoreBInput));

                    document.getElementById('matches').appendChild(matchDiv);
                });

                function createColumnDiv(element) {
                    var columnDiv = document.createElement('div');
                    columnDiv.className = 'col-md-3 mt-3';
                    columnDiv.appendChild(element);
                    return columnDiv;
                }
            </script>
        @endpush
    </div>
@endsection
