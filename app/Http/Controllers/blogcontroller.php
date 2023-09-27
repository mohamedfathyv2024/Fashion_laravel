<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class blogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "index page";
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "create page";
        return view('create_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:2000',
            // 'select-post'=>'required',
            'body'=>'required'

        ]);
        $title=$request->title;
        $body_content=$request->body;

        
        if($request->hasFile('image')){
            // $image=$request->image;
            $filename=time().$request->file('image')->getClientOriginalName();
            $path= $request->file('image')->storeAs('images',$filename,'public');
            $image='/storage/'.$path;

        }
        Blog::create([
            "title"=>$title,
            "image"=>$image,
            "body"=>$body_content,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "show page $id";
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
}
