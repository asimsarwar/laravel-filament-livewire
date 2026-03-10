<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BlogDetail extends Component
{
    public $blogId = null;
    
    public function mount($id) {
        $this->blogId = $id;
    }

    public function render()
    {
        $article = Article::select('articles.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', 'articles.category_id')
            ->findOrFail($this->blogId);
        return view('livewire.blog-detail', [
           'article' => $article     
        ]);
    }
}
