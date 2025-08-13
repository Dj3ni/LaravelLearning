<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View as ViewView;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('blog.index', [
            'posts' => Post::with('tags','category')->paginate(5),
            'categories'=> $categories,
        ]); 
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        if($post->slug !== $slug){
			return to_route('blog.show',['slug' => $post->slug, 'post' => $post]);
		}
        $category = $post->category;
		return view('blog.show',[
            'post'=> $post,
            'category'=> $category,
        ]);  
    }

    public function create(): View
    {
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
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

    public function edit(Post $post): View
    {
        return view('blog.edit',[
            "post"=> $post,
            'categories' => Category::select('id','name')->get(),
            'tags' => Tag::select('id','name')->get(),
        ]);
    }

    public function update(Post $post, FormPostRequest $request): RedirectResponse
    {
        $post->update($request->safe()->except(['tags']));
        $post->tags()->sync($request->validated('tags') ?? []);
        
        return redirect()
        ->route('blog.show',[
            'slug' => $post->slug,
            'post' => $post,
        ])
        ->with('success','The article has been correctly modified');
    }

    public function remove(Post $post): View
    {
        return view('blog.delete', [
            'post'=>$post
        ]);
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
        ->route('blog.index')
        ->with('success', "your article has been successfully removed");
    }

    public function category(Category $category){

        return view('blog.category',[
            'category'=>$category,
        ]);
    }
}

