<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo()
    {
        $seederCode = file_get_contents(database_path('seeds/databaseSeeder.php'));
        $postCode = file_get_contents(app_path('Post.php'));
        $commentCode = file_get_contents(app_path('Comment.php'));
        $authorCode = file_get_contents(app_path('Author.php'));

        return view('welcome')->with(
            compact('seederCode', 'postCode', 'commentCode', 'authorCode')
        );
    }
}
