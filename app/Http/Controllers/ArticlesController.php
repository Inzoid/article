<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Comment;
use Sentinel;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function construct()
    {
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }
    public function index(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $articles = Article::with('comments')->where
                ('title', 'like', '%' . $request->search . '%')->orderBy
                ('created_at', 'desc')->paginate(4);
            $view = (String) view('articles.list')->with('articles',
                $articles)->render();
            return response()->json(['view'=> $view, 'status' => 'success']);
        }
        $articles = Article::with('comments')->orderBy
            ('created_at', 'desc')->paginate(4);
        return view('articles.index')->with('articles', $articles);

        // $content = $request->input('content');
        //     if(!empty($content)){
        //         $articles = Article::Where('title', 'like', '%' . $content . '%')
        //         ->orWhere('content', 'like', '%' . $content . '%')->paginate(5);
        //     }else{
        //         $articles = Article::paginate(4);
        //     }

        //     // Session::flash('notice', 'Create article success');
        //     return view('articles/index')->with('articles', $articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('articles/create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pathImage = 'images/article/';
        $modelArticle = new Article();
        if($request->article_image) {
            $article_image = 'image_article' . str_random(5).time()
            . '.' . $request->file('article_image')->getClientOriginalExtension();
            
            // dd($article_image);
            $request->article_image->move(public_path('images/article/'),
            $article_image);

            $modelArticle->article_image = $article_image;
        }
        $title = $request->get('title');
        $content = $request->get('content');
        $author = $request->get('author');
        $modelArticle->title = $title;
        $modelArticle->content = $content;
        $modelArticle->author = $author;
        $modelArticle->save(); 
        // Article::create($request->all());
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article  = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        return view('articles.show')
            ->with('article', $article)
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('articles.edit')->with('articles', $articles);
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
        Article::find($id)->update($request->all());
        return redirect()->route("articles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->route("articles.index");
    }
}
