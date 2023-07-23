<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\File;


class PostsController extends Controller {

    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $posts = Post::all();
        return view('admin.posts.create');
    }

    public function store(PostFormRequest $request)
    {
        $validatedData = $request->validated();
        $posts = new Post();
        $posts->title = $validatedData['title'];
        $posts->slug = Str::slug($validatedData['slug']);
        $posts->content = $validatedData['content']; 

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/posts/', $filename);
            $posts->featured_image = $filename;
        }         
        $posts->seo_title = $validatedData['seo_title'];
        $posts->seo_description = $validatedData['seo_description'];        
        $posts->save();
        return redirect('admin/posts')-> with('message', 'Posts Added');
    }
  


    public function edit(int $post_id ){     
        $posts= Post::findOrFail($post_id);
        return view('admin.posts.edit', compact('posts')) ;
    }


    public function update( PostFormRequest $request, $posts ){
        $validatedData = $request->validated();
        $posts =  Post::findOrFail($posts);
       
        $posts->title = $validatedData['title'];
        $posts->slug = Str::slug($validatedData['slug']);
        $posts->content = $validatedData['content'];  

        if ($request->hasFile('featured_image')) {
            $path = 'uploads/posts/' . $posts->featured_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('featured_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/posts/', $filename);
            $posts->featured_image = $filename;
        }
          
        $posts->seo_title = $validatedData['seo_title'];
        $posts->seo_description = $validatedData['seo_description'];      
        $posts->update();

        return redirect('admin/posts')-> with('message', 'Post Update');
    }

    public function destroy(int $posts_id) {
        $posts = Post::find($posts_id);

        $posts->delete();
        return redirect('admin/posts')->with('message', 'Post Deleted Successfully');
    }


}
