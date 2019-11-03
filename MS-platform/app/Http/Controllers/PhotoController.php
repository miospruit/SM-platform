<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Arr;
use App\Photo;
use Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

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

        $photos = Photo::withCount('likes',)->get();
        $countPhotos = $photos->count();
        return view('photos.index', compact("photos", 'countPhotos'));


        // $photos = Photo::all();
        // $photos = Photo::withCount('likes')->with('user')->get();
        // dd($photos);


        // dd($photos);
        // return view('photos.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');


        // dd($search);
        $photos = Photo::where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->get();
        $countPhotos = $photos->count();
        if ($countPhotos < 3) {
            $countPhotos = 1;
        } else {
            $countPhotos = 3;
        }
        // dd($countPhotos);
        // dd($photos);
        return view('photos.index', compact('photos', 'countPhotos'));
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
                'title' => ['required', 'max:255', 'regex:[A-Za-z1-9 ]'],
                'description' => ['required', 'regex:[A-Za-z1-9 ]'],
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
    public function show(Photo $photo, Like $like)
    {
        $photo = Photo::with(['comments', 'comments.user', 'likes.user', 'likes'])->first();

        $likes = Photo::withCount('likes')->first();
        return view('photos.show', compact('photo', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
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
            'title' => ['required', 'max:255', 'regex:[A-Za-z1-9 ]'],
            'description' => ['required', 'regex:[A-Za-z1-9 ]'],
        ]);

        $photo->update(request(['title', 'description']));

        return redirect('photos/' . $photo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Request $request)
    {
        $photo->delete();

        return redirect('/photos');
    }

    public function likePhoto(Photo $photo)
    {
        $photo->like();
        return back();
    }

    public function deleteLike(Photo $photo, Request $request)
    {
        $userId = Auth::user()->id;
        $deleteLike = $photo->likes->where('user_id', $userId)->first();
        $deleteLike->delete();
        return back();
    }
}
