<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();

        // dd($photos);
        return view('photos.index', compact("photos"));
        // return view('photos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('photos.create');
        } else {
            return view('photos.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if user is logged in.
        if (Auth::check()) {

            //validate request if data is correct
            $validatedData = $request->validate([
                'title' => ['required', 'max:255'],
                'description' => ['required'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);

            //check if the request has a file 'image'
            if ($files = $request->file('image')) {
                // Generate a file name with extension
                $userId = Auth::user()->id;
                $fileName = $userId . '_post' . time() . '.' . $files->getClientOriginalExtension();
                // Save the file
                $path = $files->storeAs('/public/photos', $fileName);

                // $path = $request->file('image')->store('storage');

                Photo::create([
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $fileName
                ]);
            }

            return redirect("photos");
        } else {
            //add else code
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {

        // if (Auth::user()->id == $photo->user_id) {
        // return true;
        // }
        // $comments = $photo->comments;
        return view('photos.show', compact('photo'));
        // return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        // If user is administrator, then can edit any post
        // if ($user->isModerator()) {
        //     return true;
        // }

        // Check if user is the post author
        // if (Auth::user()->id == $photo->user_id) {
        // // dd(Auth::user()->id);
        //     return true;
        // }

        // return false;
        // add check of role and person
        // $photo = Photo::find($photo);
        // dd($photo);
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {

        request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $photo->update(request(['title', 'description']));

        return redirect('/photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect('/photos');
    }
}
