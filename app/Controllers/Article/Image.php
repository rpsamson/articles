<?php

namespace App\Controllers\Article;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ArticleModel;
use App\Entities\Article;
use CodeIgniter\Exceptions\PageNotFoundException ;
use RuntimeException;
use finfo;

class Image extends BaseController
{
    private ArticleModel $model;
    //-------------------------------------------------------------
     public function __construct() 
     {
         $this->model = new ArticleModel();
     }

    public function new($id)
    {
        $article = $this->getArticleOr404($id);
        return view('Article\Image\edit', [
            'article' => $article
        ]);
    }

    public function create($id)
    {
        $article = $this->getArticleOr404($id);
        $file = $this->request->getFile('image');
        // Check file is valid
        if(! $file->isValid())
        {
            $error_code = $file->getError();
            if( $error_code == UPLOAD_ERR_NO_FILE)
            {
                return redirect()->back()
                             ->with('errors', ['No file selected']);
            }
            throw new RuntimeException($file->getErrorString() .' '. $error_code);
        }
        //check mime-type
        if(! in_array($file->getMimeType(),['image/png', 'image/jpeg']))
        {
            return redirect()->back()
                            ->with('errors', ['Unsupported Image format']);            
        }
        //Limit upload files to 2mb

        if($file->getSizeByUnit('mb') > 2) 
        {
            return redirect()->back()
                             ->with('errors', ['Too big file']);
        }
        $path = WRITEPATH . "uploads\\" . $file->store('article_images');
    

        service('image')
               ->withFile($path)
               ->fit(120, 120, 'center')
               ->save($path);

        $article->image = $file->getName();

        $this->model->protect(false)
                    ->save($article);

        return redirect()->to("articles/$id")
                         ->with('message', 'Image Uploaded');

    }

    public function get($id)
    {
        $article = $this->getArticleOr404($id);
        if($article->image) {
            $path = WRITEPATH . "uploads\\article_images\\" . $article->image;
            $finfo = new finfo(FILEINFO_MIME);
            $type = $finfo->file($path);
            header("Content-Type: " . $type);
            header("Content-Length: " . filesize($path) );
            readfile($path);
            exit;

        }
    }
    public function delete($id)
    {
        $article = $this->getArticleOr404($id);
        if($article->image) {
            $path = WRITEPATH . "uploads\\article_images\\" . $article->image;

            if(is_file($path)) {
                unlink($path);
            } 
        }
        $article->image = null;
        $this->model->protect(false)->save($article)  ;
        return redirect()->to("articles/$id")
                         ->with("message", "Image Removed");
    }

    private function getArticleOr404($id) : Article {

        $article = $this->model->find($id);

        if($article === null) {
            throw new PageNotFoundException("Article with id $id not found.");
        }

        return $article;
    }
}
