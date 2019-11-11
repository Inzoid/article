<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment, App\Article;
use Session, Redirect, Validator;


class CommentController extends Controller
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

    public function store(Request $request)
    {
        
        $validate = Validator::make($request->all(), Comment::valid());
        if($validate->fails()) {
            return redirect::to('articles/' . $request->article_id)
                ->withErrors($validate)
                ->withInput();
        } else {
            $request->ajax();
                Comment::create($request->all());
                Session::flash('notice', 'Succes add comment');
                return Redirect::to('articles/'. $request->article_id);

            $comment = Article::with('content', 'user')->where('article_id');
            $view = (String) view('articles.show')->with('user', 'content',
            $comment)->render();
            return response()->json(['view'=> $view, 'status' => 'success' . $request->article_id]);
        }
    }
    
    // public function store(Request $request)
    // {    
    //     if ($request->ajax()) {
    //         Comment::create($request->all());
    //         $comment = Article::with('content', 'user')->where('article_id' . $request->article_id)
    //         ->orderBy('created_at', 'desc');
    //         $view = (String) view('articles.show')->with('user', 'content',
    //         $comment)->render();
    //         return response()->json(['view'=> $view, 'status' => 'success']);
    //         // $validate = Validator::make($request->all(), Comment::valid());
    //         // if($validate->fails()) {
    //         //     return redirect::to('articles/' . $request->article_id)
    //         //         ->withErrors($validate)
    //         //         ->withInput();
    //         // } else {
    //             // Comment::create($request->all());
    //             // Session::flash('notice', 'Succes add comment');
    //             // return Redirect::to('articles/');

    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
