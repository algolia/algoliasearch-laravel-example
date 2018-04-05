<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('demo:show:post {id}', function ($id) {
    $post = App\Post::with(['comments', 'author'])->find($id);
    dump($post);
})->describe('Show a post in the console to inspect it');

Artisan::command('demo:edit:author-name {id} {newName}', function ($id, $newName) {
    $author = \App\Author::findOrFail($id);
    $author->name = $newName;
    $author->save();
    $this->info("Author $id name was changed, and all of his posts were updated");
});


Artisan::command('demo:edit:new-comment {postId}', function ($postId, Faker\Generator $faker) {
    $comment = new \App\Comment([
        'post_id' => $postId,
        'commenter_name' => '[Console] '.$faker->name,
        'comment' => $faker->sentence,
    ]);
    $comment->save();
    $this->info("A comment was added to the post $postId and the comment_count of this post was updated");
});
