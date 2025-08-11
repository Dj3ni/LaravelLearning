<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(2),
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        if($post->slug !== $slug){
			return to_route('blog.show',['slug' => $post->slug, 'post' => $post]);
		}
		return view('blog.show',[
            'post'=> $post,
        ]);  
    }

    public function create(): View
    {
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
        ]);
    }

    public function store(FormPostRequest $request): HttpFoundationRedirectResponse
    {
        $post = Post::create([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'slug' => Str::slug($request->input('title')),
        ]);

        return redirect()
        ->route('blog.show', 
            [
                'slug' => $post->slug,
                'post' => $post,
            ],
        )
        ->with('success', "Article created successfully!");
    }

    public function edit(Post $post)
    {
        return view('blog.edit',[
            "post"=> $post
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());

        return redirect()
        ->route('blog.show',[
            'slug' => $post->slug,
            'post' => $post,
        ])
        ->with('success','The article has been correctly modified');
    }
}
