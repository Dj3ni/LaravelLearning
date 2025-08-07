<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(1),
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | View
    {
        $post = Post::findOrFail($id);
        if($post->slug !== $slug){
			return to_route('blog.show',['slug' => $post->slug, 'id' => $id]);
		}
		return view('blog.show',[
            'post'=> $post,
        ]);  
    }
}
