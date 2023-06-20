@extends('partials.main')
@section('content')
    <div class="container mt-5">
        <h1>Test Koding</h1>
        <p class="mt-2">Perkenalkan, saya <b>Gabriel Yonathan</b> Terimakasih telah mengirim email test untuk saya,<br>
            berikut adalah aplikasi dengan fitur sesuai
            dengan tugas
            test
            yg diberikan.</p>

        <h5>Input Data Klub</h5>
        <ul>
            <li>Tidak boleh ada data yang sama.</li>
            <li>Validasi Form.</li>
        </ul>
        <h5>Input Score Pertandingan</h5>
        <ul>
            <li>Tidak boleh ada data pertandingan yang sama. </li>
            <li>Jika menang + 3 point.</li>
            <li>Jika seri masing-masing + 1 point. </li>
            <li>JIka kalah + 0 point. </li>
            <li>Input multiple tidak terbatas, user dapat menambah data pertandingan ketika klik add,
                proses save dilakukan terakhir ketika input multiple tersebut sudah diisi semua.
            </li>
            <li>Validasi Form.</li>
        </ul>
        <h5>Berikut source code via GitHub</h5>
        <a
            href="https://github.com/undeath-cyber/web_klasemen_sepak_bola">https://github.com/undeath-cyber/web_klasemen_sepak_bola</a>
    </div>
@endsection
