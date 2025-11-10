<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $page = request()->query('page', 1); // p1 => 0, p2 => 16, p3 => 32, p4 => 48, p5 => 64
        $offset = ($page - 1) * 16;
        $posts = Post::take(16)->skip($offset)->get();
        return view('welcome', compact('posts'));
    }

    public function page1() {
        return view('page1');
    }

    public function page2() {
        return view('page2');
    }
}
