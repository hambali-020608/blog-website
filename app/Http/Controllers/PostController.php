<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function showAll () {
        $user=auth()->user();
        
       
        return view('pages.blog',['title'=>'blog','user'=>$user->name,'posts'=>Posts::filter(request(['search','category','author']))->latest()->paginate(15)]);
    }
public function showCategory(Category $category){
    return view('pages.posts',[
       'title'=> 'Category article: '. $category->name,
       'posts'=> $category->post
    ]);
}

public function showUser(User $author){
    return view('pages.posts',[
       'title'=> 'Article by: '. $author["name"],
       'posts'=> $author->post
    ]);
}


public function posting(){
    return view('posting.post');
}
public function postStore(Request $request){
    $name=$request->input('title');
    
    $content=$request->input('content');
    $category=$request->input('category_id');
    $imagePath = null; // Inisialisasi dengan null

    if ($request->hasFile('image')) {
        // Simpan gambar dan ambil path-nya
        $imagePath = $request->file('image')->store('image', 'public');
    }


    auth()->user()->post()->create([
        'title'=>$name,
        'image'=>$imagePath,
        'content'=>$content,
        'category_id'=>$category,
    ]);
    return redirect()->route('blog')->with('success', 'Post created successfully.');


    
}

public function showSinglePosts(Posts $post){
    return view('pages.singlepost',['title'=>'Single Post','post'=>$post,'comment'=>$post->comments]);
}

public function deletePost(Posts $post){
    if (Gate::denies('delete-post', $post)) {
        return redirect()->back()->with('error', 'You are not authorized to edit this post.');
    }
    $post->delete();

    return redirect('blog');

}

public function postComment(Request $request,$postId){
    $comment=$request->input('comment');

    auth()->user()->comments()->create([
        "post_id"=>$postId,
        "comment"=>$comment,
    ]);

    return redirect("post/$postId");

}
public function likePost($id) {
    $post = Posts::findOrFail($id);
    
    if (!$post->likes()->where('author_id', auth()->id())->exists()) {
        $post->likes()->attach(auth()->id());
    }

    return redirect()->back();
}

public function unlikePost($id) {
    $post = Posts::findOrFail($id);
    
    if ($post->likes()->where('author_id', auth()->id())->exists()) {
        $post->likes()->detach(auth()->id());
    }

    return redirect()->back();
}

public function editPost(Posts $post){
    return view('posting.edit',compact('post'));

}



public function postUpdate(Request $request, Posts $post){
    $name=$request->input('title');
    
    $content=$request->input('content');
    $category=$request->input('category_id');
    $imagePath = $request->input('image'); // Jika ingin update gambar juga; // Inisialisasi dengan null

    

    $post->update([
        'title'=>$name,
        'content'=>$content,
        'category_id'=>$category,
        'image'=>$imagePath
    ]);


    return redirect()->route('blog')->with('success', 'Post created successfully.');


    
}
}
