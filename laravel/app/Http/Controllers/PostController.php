<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DateTime;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        $posts->each(function($post){
            if ($post->result=='a') {
                $post->message = "Participants must be over 18 years of age";
            } else if($post->result=='a') {
                $post->message = "Participant ".$post->first_name." is assigned to Cohort A";
            } else {
                $post->message = "Participant ".$post->first_name." is assigned to Cohort B";
            }
        });
        return view('index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required']
        ]);

        $date = date_create($request->dob);
        $dob = date_format($date,"Y-m-d");
        $result = $this->getResult($dob,$request->frequency);

        $post = new Post();
        $post->first_name = $request->first_name;
        $post->dob = $dob;
        $post->frequency = $request->frequency;
        $post->daily_frequency = $request->daily_frequency;
        $post->result = $result;
        $post->save();

        return redirect()->route('posts.index');
    }

    private function getResult($dob,$frequency) {

        $bday = new DateTime($dob);
        $today = new Datetime(date('Y-m-d'));
        $diff = $today->diff($bday);
        $age = $diff->y;

        if ($age<=18) {
            return 'a';
        } else if ($age>=18) {
            if ($frequency=="monthly" or $frequency=="yearly") {
                return 'b';
            } else {
                return 'c';
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $date = date_create($post->dob);
        $post->dob = date_format($date,"d/m/Y");
        return view('edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => ['required']
        ]);

        $date = date_create($request->dob);
        $dob = date_format($date,"Y-m-d");
        $result = $this->getResult($dob,$request->frequency);

        $post = Post::findOrFail($id);
        $post->first_name = $request->first_name;
        $post->dob = $dob;
        $post->frequency = $request->frequency;
        $post->daily_frequency = $request->daily_frequency;
        $post->result = $result;
        $post->save();

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
