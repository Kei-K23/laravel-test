<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function  index(Request $req): View
    {
        return view("posts.index", [
            "posts" => Post::latest()->filter($req->query())->simplePaginate(5)
        ]);
    }

    public function  show(Post $post): View
    {
        return view("posts.show", [
            'post' => $post
        ]);
    }

    public function  create(): View
    {
        return view("posts.create");
    }

    public function  store(Request $req)
    {
        $formFields = $req->validate([
            "title" => "required",
            "description" => ["required", 'string'],
            'company' => ['required', 'string', Rule::unique('posts', 'company')],
            'email' => ['required', 'email'],
            'website' => ['required',],
            'tags' => ['required'],
            'location' => 'required'
        ]);

        if ($req->hasFile("logo")) {
            $formFields["logo"] = $req->file("logo")->store("logos", 'public');
        }

        Post::create($formFields);

        return redirect("/posts")->with("message", "Post created!");
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $req, Post $post)
    {
        $formFields = $req->validate([
            "title" => "required",
            "description" => ["required", 'string'],
            'company' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => ['required',],
            'tags' => ['required'],
            'location' => 'required'
        ]);

        if ($req->hasFile("logo")) {
            $formFields["logo"] = $req->file("logo")->store("logos", 'public');
        }

        $post->update($formFields);

        return back()->with("message", "Post edited!");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('message', 'Post deleted!');
    }
}
