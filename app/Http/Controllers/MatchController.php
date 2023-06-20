<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Matche;
use App\Models\Standings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();

        return view('index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();
        return view('match.create', compact('clubs'));
    }



    public function store(Request $request)
    {

        // Validasi form input
        $validatedData = $request->validate([
            'club_a_id' => ['required', 'integer', 'exists:clubs,id', 'different:club_b_id'],
            'club_b_id' => ['required', 'integer', 'exists:clubs,id'],
            'score_a' => ['required', 'integer'],
            'score_b' => ['required', 'integer'],
        ]);

        // Mengolah setiap pasangan data pertandingan

        $match = new Matche;
        $match->club_a_id = $validatedData['club_a_id'];
        $match->club_b_id = $validatedData['club_b_id'];
        $match->score_a = $validatedData['score_a'];
        $match->score_b = $validatedData['score_b'];
        $match->save();


        // Mengambil data klub dari tabel clubs
        $clubA = Club::find($validatedData['club_a_id']);
        $clubB = Club::find($validatedData['club_b_id']);

        // Mengupdate data di tabel standings
        $clubA->ma += 1; // Menambahkan 1 pada 'ma' (main) klub A
        $clubB->ma += 1; // Menambahkan 1 pada 'ma' (main) klub B


        if ($match->score_a > $match->score_b) {
            // Jika klub A menang
            $clubA->me += 1; // Menambahkan 1 pada 'me' (menang) klub A
            $clubA->point += 3; // Menambahkan 3 pada 'point' klub A
            $clubB->k += 1; // Menambahkan 1 pada 'k' (kalah) klub B
            $clubA->gm += $match->score_a; // Menambahkan skor klub A pada 'gm' (goal menang) klub A
            $clubA->gk += $match->score_b; // Menambahkan skor klub B pada 'gk' (goal kalah) klub A
            $clubB->gm += $match->score_b; // Menambahkan skor klub B pada 'gm' (goal menang) klub B
            $clubB->gk += $match->score_a; // Menambahkan skor klub A pada 'gk' (goal kalah) klub B
        } elseif ($match->score_a < $match->score_b) {
            // Jika klub A kalah
            $clubB->me += 1; // Menambahkan 1 pada 'me' (menang) klub B
            $clubB->point += 3; // Menambahkan 3 pada 'point' klub B
            $clubA->k += 1; // Menambahkan 1 pada 'k' (kalah) klub A
            $clubB->gm += $match->score_b; // Menambahkan skor klub B pada 'gm' (goal menang) klub B
            $clubB->gk += $match->score_a; // Menambahkan skor klub A pada 'gk' (goal kalah) klub B
            $clubA->gm += $match->score_a; // Menambahkan skor klub A pada 'gm' (goal menang) klub A
            $clubA->gk += $match->score_b; // Menambahkan skor klub B pada 'gk' (goal kalah) klub A
        } else {
            // Jika pertandingan berakhir seri
            $clubA->s += 1; // Menambahkan 1 pada 's' (seri) klub A
            $clubA->point += 1; // Menambahkan 1 pada 'point' klub A
            $clubB->s += 1; // Menambahkan 1 pada 's' (seri) klub B
            $clubB->point += 1; // Menambahkan 1 pada 'point' klub B
            $clubA->gm += $match->score_a; // Menambahkan skor klub A pada 'gm' (goal menang) klub A
            $clubA->gk += $match->score_b; // Menambahkan skor klub B pada 'gk' (goal kalah) klub A
            $clubB->gm += $match->score_b; // Menambahkan skor klub B pada 'gm' (goal menang) klub B
            $clubB->gk += $match->score_a; // Menambahkan skor klub A pada 'gk' (goal kalah) klub B
        }


        // Menyimpan perubahan data klub di tabel standings
        $clubA->save();
        $clubB->save();


        // Redirect atau berikan respons sesuai kebutuhan Anda

        return redirect()->route('macth.index')->with('success', 'Data pertandingan berhasil disimpan');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function multipleSee()
    {
        $clubs = Club::all();
        return view('match.multiple', compact('clubs'));
    }


    public function storeMultiple(Request $request)
    {
        $validatedData = $request->validate([
            'club_a_id.*' => ['required', 'integer', 'exists:clubs,id', 'different:club_b_id.*'],
            'club_b_id.*' => ['required', 'integer', 'exists:clubs,id'],
            'score_a.*' => ['required', 'integer'],
            'score_b.*' => ['required', 'integer'],
        ]);

        foreach ($validatedData['club_a_id'] as $key => $club_a_id) {
            $match = new Matche;
            $match->club_a_id = $club_a_id;
            $match->club_b_id = $validatedData['club_b_id'][$key];
            $match->score_a = $validatedData['score_a'][$key];
            $match->score_b = $validatedData['score_b'][$key];
            $match->save();

            $clubA = Club::find($club_a_id);
            $clubB = Club::find($validatedData['club_b_id'][$key]);

            $clubA->ma += 1;
            $clubB->ma += 1;

            if ($match->score_a > $match->score_b) {
                $clubA->me += 1;
                $clubA->point += 3;
                $clubB->k += 1;
                $clubA->gm += $match->score_a;
                $clubA->gk += $match->score_b;
                $clubB->gm += $match->score_b;
                $clubB->gk += $match->score_a;
            } elseif ($match->score_a < $match->score_b) {
                $clubB->me += 1;
                $clubB->point += 3;
                $clubA->k += 1;
                $clubB->gm += $match->score_b;
                $clubB->gk += $match->score_a;
                $clubA->gm += $match->score_a;
                $clubA->gk += $match->score_b;
            } else {
                $clubA->s += 1;
                $clubA->point += 1;
                $clubB->s += 1;
                $clubB->point += 1;
                $clubA->gm += $match->score_a;
                $clubA->gk += $match->score_b;
                $clubB->gm += $match->score_b;
                $clubB->gk += $match->score_a;
            }

            $clubA->save();
            $clubB->save();
        }

        return redirect()->route('macth.index')->with('success', 'Data pertandingan berhasil disimpan');
    }
}
