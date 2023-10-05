<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Tag;

use Illuminate\Http\Request;

class blogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Data=Blog::all();
        return view('blogs/index',compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "create page";
        $tags=Tag::all();

        return view('blogs/create_blog',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationdata=$request->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:2000',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'body'=>'required'

        ]);
        $title=$request->title;
        $body_content=$request->body;
        $tags=$request->tags;

        
       
            // $image=$request->image;
            $filename=time().$request->file('image')->getClientOriginalName();
            $path= $request->file('image')->storeAs('images',$filename,'public');
            $image='/storage/'.$path;

        
        $blogs=Blog::create([
            "title"=>$title,
            "image"=>$image,
            "body"=>$body_content,
            

        ]);
        $blogs->tags()->attach($request->tags);
        return redirect()->back()->with('sucess','the post created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogs=Blog::where("id",$id)->first();
        $tags=$blogs->tags;
        return view('blogs/show',compact('blogs','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogs=Blog::where("id",$id)->first();
        $tags=Tag::pluck("name","id");
        return view('blogs/edit_blog',compact('blogs','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title=$request->title;
        $body_content=$request->body;
        Blog::where("id",$id)->update(["title"=>$title]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
