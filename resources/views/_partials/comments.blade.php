
<h3>Indexing comments</h3>

<p>
	Comments are indexed into their own index and formatted via the
	<code>toSearchableArray()</code> methods.
</p>

<p>
	Because <code>Posts</code> holds the number of comments, we want to update
	the post every time a comment is added. We use the powerful <code><a href="https://laravel.com/docs/eloquent-relationships#touching-parent-timestamps">Touch feature</a></code>
	from Laravel to let our application knows that the post should be considered
	as modified.
</p>

<p>
	<strong>Note that this only works because a Comment <code>belongsTo</code> a Post.</strong>
</p>

<pre><code class="php">{{ $commentCode }}</code></pre>
