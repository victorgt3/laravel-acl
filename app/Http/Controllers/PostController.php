<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Gate;

class PostController extends Controller
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
    public function index(Post $post)
    {
        //$registro = $post->where('user_id', auth()->user()->id)->get();
        $registro = $post->all();
        

        return view('post.list',compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $registro = User::all();
        if(Gate::denies('create_post', $registro))
        {
            return response()->view('errors.custom', [], 500);     
        }

        return view('post.create',compact('registro'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->save();
        \Session::flash('flash_message',[
            'msg'=>"Post cadastrado!",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PostController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(Gate::denies('delete_post', $registro))
        {
            return response()->view('errors.custom', [], 500);     
        }
        $post->delete();

        \Session::flash('flash_message',[
            'msg'=>"Post deletado!",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PostController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Post::find($id);
        //$this->authorize('update-post', $registro);
        if(Gate::denies('edit_post', $registro))
        {
            return response()->view('errors.custom', [], 500);     
        }
        return view('post.edit',compact('registro'));
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
        $post = Post::find($id);
        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->update();
        \Session::flash('flash_message',[
            'msg'=>"Post Atualizado",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
