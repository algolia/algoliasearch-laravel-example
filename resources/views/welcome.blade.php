<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Scout Demo</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <link rel="stylesheet"
	        href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.12.0/build/styles/github.min.css">

  </head>
  <body>

	  <div class="container mt-4">
			<div class="row">
				<div class="col">

					<ul class="nav nav-tabs my-4">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#seeder">Seeder</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#posts">Indexing posts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#comments">Indexing comments</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#authors">Indexing authors</a>
						</li>
					</ul>


					<div class="tab-content">
						<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
							@include('_partials.home')
						</div>
						<div class="tab-pane" id="seeder" role="tabpanel" aria-labelledby="seeder-tab">
							@include('_partials.seeder')
						</div>
						<div class="tab-pane" id="posts" role="tabpanel" aria-labelledby="messages-tab">
							@include('_partials.posts')
						</div>
						<div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="messages-tab">
							@include('_partials.comments')
						</div>
						<div class="tab-pane" id="authors" role="tabpanel" aria-labelledby="messages-tab">
							@include('_partials.authors')
						</div>
					</div>

				</div>
			</div>
	  </div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.12.0/build/highlight.min.js"></script>

	  <script>hljs.initHighlightingOnLoad();</script>
  </body>
</html>
