<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function list()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->get();

        // query to show in datatable
        $dataTable = Datatables::of($posts)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="/admin/posts/' .$row->slug.'" class="badge bg-info"><i class="fa-solid fa-eye"></i></a>
                    <a href="/admin/posts/'.$row->slug.'/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
                    <form action="/admin/posts/'.$row->slug.'" method="POST" class="d-inline">
                        '. csrf_field() .'
                        <input type="hidden" name="_method" value="delete">
                        <button class="badge bg-danger border-0" onclick="return confirm(\'Anda akan menghapus post ini?\')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return $dataTable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:mysql2.posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }        

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::create($validatedData);

        return redirect('/admin/posts')->with('success', 'Postingan terbaru telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',            
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        } 

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/admin/posts')->with('success', 'Postingan telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/admin/posts')->with('success', 'Postingan telah berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
