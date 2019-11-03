<?php

namespace App\Http\Controllers;

use App\Like;
use App\Photo;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Photo $photo)
    {
        // //create new like
        // $newLike = new Like;
        // //add user id to like
        // $newLike->user_id = $request->user_id;
        // //add photo id to like
        // $newLike->photo_id = $request->photo_id;
        // //add confirmed to like
        // $newLike->confirmed = "1";

        // // dd($newLike);
        // $newLike->save();

        // Like::create([
        //     'user_id' => Auth::user()->id,
        //     'photo_id' => $request->photo_id,
        //     'confirmed' => 1
        // ]);

        return redirect('photos/' . $request->photo_id);
        // } else {
        //     return Redirect::back()->withErrors('You already liked this.');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
        // dd($like->);
        request()->validate([
            'photo_id' => 'required'
        ]);

        // dd($newLike);
        $like->confirmed = 0;
        // dd($newLike);
        $like->save();

        return redirect('photos/' . $request->photo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        // replace update with delete like.

    }
}
