<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illiminate\Support\Facades\Storage;
use App\Blog;

class BlogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Blog::where('id',1)->get();
        // $blogs =  Blog::orderBy('id','desc')->get();
        $blogs =  Blog::orderBy('id','desc')->paginate(2);
        return view('blogs.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        //file uploading
        if($request->hasFile('cover_image')){
            $fileNameWithExt= $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else{
            $fileNameToStore='noImage.jpg';
        }

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->user_id = auth()->user()->id;
        $blog->cover_image = $fileNameToStore;
        $blog->save();
        return redirect('/dashboard')->with('success','Blog Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.blogDetail')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        if(auth()->user()->id !== $blog->user_id){
            return redirect('/blogs')->with('error','You are not allowed to mofidy this blog');
        }
        return view('blogs.editBlog')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'-'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);
        }
        else{
            $fileNameToStore='noImage.jpg';
        }

        $post = Blog::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/dashboard')->with('success','Blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if(auth()->user()->id !== $blog->user_id){
            return redirect('/blogs')->with('error','You are not allowed to mofidy this blog');
        }

        if($post->cover_image != 'noImage.jpg'){
            Storage::delete('public/cover_images/'.$blog->cover_image);
        }

        $blog->delete();
        return redirect('/dashboard')->with('success','Blog deleted successfully');
    }
}
