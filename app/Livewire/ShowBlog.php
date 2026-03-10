<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Article;
use Livewire\Attributes\Url;

class ShowBlog extends Component
{
    #[Url]
    public $cat = null;
    public function render()
    {
        $categories = Category::all();        
        if (!empty($this->cat)){
            $cat = Category::where('slug', $this->cat)->first();
            if (empty($cat)) {
                abort(404);
            }
            $articles = Article::where('category_id', $cat->id)->orderBy('created_at', 'DESC')->where('status', 1)->paginate();
        } else {
            $articles = Article::orderBy('created_at', 'DESC')->where('status', 1)->paginate();
        }

        $latestArticles = Article::orderBy('created_at', 'DESC')->where('status', 1)->get()->take(3);
        return view('livewire.show-blog', [
            'categories' => $categories,
            'articles' => $articles,
            'latestArticles' => $latestArticles
        ]);
    }
}
