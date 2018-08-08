
<h3>Indexing authors</h3>

<p>
	Authors are also indexed into their own index.
</p>

<p>
	We customized the <code>objectID</code> in Algolia with the <code>getScoutKey</code> methods.
	We use the email address, which has to be unique in your database.
</p>

<p>
	The author name is also stored in <code>Posts</code> but because the relationship
	is a <code>hasMany</code> we cannot use the <a href="https://laravel.com/docs/eloquent-relationships#touching-parent-timestamps">touch</a> feature like we did
	for <code>Comments</code>.
	<br><br>
	We are going to tell Laravel to trigger the <code>saved</code> event on <code>Post</code>, when an <code>Author</code> is updated via the <code>boot</code> method of the model.
</p>


<pre><code class="php">{{ $authorCode }}</code></pre>
