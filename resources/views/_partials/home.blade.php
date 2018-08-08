<p>
	In this demo app, we index <code>Posts</code>, <code>Comments</code> and <code>Authors</code>.
</p>

<p>
	Some Artisan commands are available to test the behavior of the app,
	under the <code>demo</code> namespace.
</p>

<h3>Getting Started</h3>

Run the following commands:

<ol>
	<li><code>php artisan db:seed</code></li>
	<li><code>php artisan scout:import App\\Post</code></li>
	<li><code>php artisan scout:import App\\Author</code></li>
	<li><code>php artisan scout:import App\\Comment</code></li>
</ol>
