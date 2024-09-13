<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Article;
use CodeIgniter\HTTP\ResponseInterface;
use \CodeIgniter\Exceptions\PageNotFoundException ;
use Exception;

class Articles extends BaseController
{
    private $model;
   //-------------------------------------------------------------
    public function __construct() 
    {
        $this->model = new \App\Models\ArticleModel();
    }
    //-------------------------------------------------------------
    public function index()
    {
        $articles = $this->model
                         ->select('articles.* , users.firstname')
                         ->join('users', 'users.id = articles.user_id')
                         ->orderBy('created_at')
                         ->paginate(3);
        return view('Articles/index', [
            'articles' => $articles,
            'pager'    => $this->model->pager
        ]);
    }
    //--------------------------------------------------------------
    public function new()
    {
        return view('Articles/new');
    }
    //-------------------------------------------------------------

    public function create()
    {
        $article = new \App\Entities\Article($this->request->getPost());
        $id = $this->model->insert($article);
        if($id === false) {
                return redirect()->back()
                                 ->with('errors', $this->model->errors())
                                 ->withInput();
        }

        return redirect()->to('/articles')
                         ->with('message', "Article Added Successfully");
    }
    //-------------------------------------------------------------

    public function show($id)
    {
        $article = $this->getArticleOr404($id);
        return view('Articles/show', ['article' => $article]);

    }
    //-------------------------------------------------------------

    public function edit($id)
    {
        $article = $this->getArticleOr404($id);
        return view('Articles/edit', ['article' => $article]);

    }
    //-------------------------------------------------------------

    public function update($id)
    {
        $article = $this->getArticleOr404($id);
        $article->fill($this->request->getPost());

        $article->__unset('_method');

        if(!$article->hasChanged()) {
            return redirect()->back()
                             ->with('message', 'Nothing to Update');
        }

        if($this->model->save($article)) {
            return redirect()->to('articles/' . $id)
                             ->with('message', 'Article Saved');
        }

        return redirect()->back()
                         ->with('errors', $this->model->errors())
                         ->withInput();

    }
    //-------------------------------------------------------------
    public function confirmDelete($id) {
        $article = $this->getArticleOr404($id);
        return view('Articles/delete' , ['article' => $article]);
    }
    //-------------------------------------------------------------

    public function delete($id) 
    {
        $article = $this->getArticleOr404($id);
        $this->model->delete($id);

        return redirect()->to('/articles')
                         ->with('message', 'Article Deleted');
    }
     //-------------------------------------------------------------
   
    private function getArticleOr404($id) : Article {

        $article = $this->model->find($id);

        if($article === null) {
            throw new PageNotFoundException("Article with id $id not found.");
        }

        return $article;
    }

}
