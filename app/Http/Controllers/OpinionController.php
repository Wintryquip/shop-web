<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Opinion;
class OpinionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display opinions about chosen resource
     */
    public static function show(string $productId)
    {
        return Opinion::with('user')
            ->where('product_id', $productId)
            ->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $opinion = new Opinion();
        $opinion->user_id = \Auth::user()->id;
        $opinion->product_id = $request->product_id;
        $opinion->Comment = $request->comment;
        if($opinion->save()) {
            return redirect('/product/' . $request->product_id);
        }

        return view('/product/' . $request->product_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $opinion = Opinion::find($id);

        //Sprawdzanie czy uzytkownik jest autorem komentarza
        if(\Auth::user()->id !== $opinion->user_id)
        {
            return back();
        }
        if($opinion->delete())
        {
            return redirect('/product/' . $opinion->product_id);
        }
        else return back();
    }
}

