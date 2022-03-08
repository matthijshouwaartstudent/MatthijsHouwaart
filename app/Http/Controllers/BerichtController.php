<?php

namespace App\Http\Controllers;

use App\Models\Bericht;
use Illuminate\Http\Request;

class BerichtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Berichten';
        $data['q'] = $request->get('q');
        $data['berichten'] = Bericht::where('bericht_content', 'like', '%' . $data['q'] . '%')->get();
        return view('bericht.index', $data );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Bericht Toevoegen';
        return view('bericht.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'bericht_content' => 'required',
        ]);

        $bericht = new Bericht($request->all());
        $bericht->save();
        return redirect('bericht')->with('success', 'Bericht succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bericht  $bericht
     * @return \Illuminate\Http\Response
     */
    public function show(Bericht $bericht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bericht  $bericht
     * @return \Illuminate\Http\Response
     */
    public function edit(Bericht $bericht)
    {
        $data['title'] = 'Bewerk Bericht';
        $data['bericht'] = $bericht;
        return view('bericht.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bericht  $bericht
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bericht $bericht)
    {
      $request->validate([
        'bericht_content' => 'required',
      ]);

      $bericht->bericht_content = $request->bericht_content;
      $bericht->save();
      return redirect('bericht')->with('success', 'Bericht succesvol Bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bericht  $bericht
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bericht $bericht)
    {
      $bericht->delete();
      return redirect('bericht')->with('success', 'Bericht succesvol Verwijderd!');
    }
}
