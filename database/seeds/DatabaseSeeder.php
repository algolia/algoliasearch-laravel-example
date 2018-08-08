<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Do not sync new entries with Algolia
         * we will call `php artisan scout:import MODEL`
         * explicitely after.
         */
        \App\Author::disableSearchSyncing();
        \App\Post::disableSearchSyncing();
        \App\Comment::disableSearchSyncing();

        /*
         * Truncate DB to remove existing data
         */
        App\Post::truncate();
        App\Comment::truncate();
        App\Author::truncate();

        /*
         * Use the Algolia API client (see app/Providers/AppServiceProvider.php)
         * to delete the existing Index with the same name
         */
        $client = app(\AlgoliaSearch\Client::class);

        foreach ([\App\Author::class, \App\Post::class, \App\Comment::class] as $model) {
            $indexName = (new $model)->searchableAs();
            try {
                $client->deleteIndex($indexName);
            } catch (Exception $e) {
                // It's fine
            }
        }

        // And finally seed the DB
        $this->call(AuthorSeeder::class);
        $this->call(PostSeeder::class);
    }
}
