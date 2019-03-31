<?php

namespace App\Http\Controllers;
use SEOMeta;
use OpenGraph;
use Twitter;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * Display the articles resource.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->article->page(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'));
        SEOMeta::setTitle('Articles on Internet safety & privacy');
        SEOMeta::setDescription('Articles full of tips on internet safety & Internet privacy');
        SEOMeta::setCanonical('https://checkon.tech');

        OpenGraph::setDescription('Articles full of tips on internet safety & Internet privacy');
        OpenGraph::setTitle('Articles');
        OpenGraph::addProperty('type', 'articles');

        Twitter::Setcard('summary');
        Twitter::setTitle('Articles on Internet safety & privacy');
        Twitter::setSite('@CheckonTech');
        return view('article.index', compact('articles'));
    }

    /**
     * Display the article resource by article slug.
     *
     * @param  string $slug
     * @return mixed
     */
    public function show($slug)
    {
        $article = $this->article->getBySlug($slug);
        

        return view('article.show', compact('article'));
    }
}
