<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }


    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        Post::create([
            'title' =>$request->title,
            'description' =>$request->description,
            'content' => $request->get('content'),
            'image' =>$request->image->store('images','public')
        ]);

        $request->session()->flash('success','Post ajouter avec succées');
        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post);
    }


    public function update(UpdatePostRequest $request,Post $post)
    {
        $data = $request->only('title','description','content');

        if( $request->hasFile('image')){
            $image =  $request->image->store('images','public');
            Storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        }

        $post->update($data);
        session()->flash('success','Post update with success');
        return redirect(route('posts.index'));
    }


    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $ac="trashed";
        $view="posts.index";
        if($post->trashed()){
            $ac="deleted";
            $view="posts.trashed";

            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
        }else{
            $post->delete();

        }
         session()->flash('success','Post '.$ac.' with success');
        return redirect(route($view));
    }
    public function trashedPosts(){
        $posts= Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$posts);
    }

    public function restore($id){

       Post::onlyTrashed()->where('id',$id)->restore();

        session()->flash('success','Post restored with success');
        return redirect(route('posts.index'));
    }
}

