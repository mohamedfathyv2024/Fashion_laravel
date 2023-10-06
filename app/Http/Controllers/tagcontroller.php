<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags/create_tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       $tag_name=$request->tag;
       Tag::create([
        'name'=>$tag_name
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        echo "show page $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $tags=Tag::where('id',$id)->first();
        return view('tags/edit_tag',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $new_tag=$request->tag;
        Tag::where('id',$id)->update(["name"=>$new_tag]);
        echo "updated data in $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
