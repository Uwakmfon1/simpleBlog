<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();
        return view('home',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|string|min:5|max:255',
            'newPost'=>'required|string',
            'file'=> 'required|file|mimes:jpg,png,svg,gif|max:3072'
        ]);



        if ($validator->fails()) {
            return redirect('/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $authUser = Auth::user();

        // For saving the image to the folder
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        dd($path);
        // $requestData["photo"] = '/storage/' . $path;


        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $fileName = $file->getClientOriginalName();
        //     // Process the file
        //     dd($fileName);
        // } else {
        //     return "No file was uploaded.";
        // }
        // die();


        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = trim($request->input('title'));
        $post->post = trim($request->input('newPost'));
        $post->slug = $this->getSentenceSlug($post->post);
        // $post->image = $requestData;
        $post->save();
        return redirect('auth')->with('message','Post saved successfully');
    }



    protected function getSentenceSlug($sentence)
    {
    // Break the sentence into words
    $words = explode(' ', $sentence);

    // Get only the first 10 words
    $firstTenWords = array_slice($words, 0, 10);

    // Join the words back into a string
    return implode(' ', $firstTenWords);
    }


    /**
     * Display the specified resource.
     */

    public function show(Request $request, string $id)
    {
        $post = Post::where('id', $id)->first();
        $post['post'];
        $title = $post['title'];

        return view('post',
        [
            'post'=>$post['post'],
            'title'=>$title]

        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
