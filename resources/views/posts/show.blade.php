<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="container">
    <article>
        <header>
            <h2>{{ $post->title }}</h2>

            <form method="POST" action="/posts/{{ $post->id }}/favorite">
                {{ csrf_field() }}

                <button class="btn-link {{ $post->isFavoritedBy(Auth::user()) ? 'btn-favorited' : 'btn-not-favorited' }}">
                    <i class="glyphicon glyphicon-heart"></i>
                </button>
            </form>

        </header>

        <hr>

        <div class="body">
            {{ $post->body }}
        </div>
    </article>

    <h3>Comments</h3>

    <ul>
        @foreach ($post->comments as $comment)
            <li class="comment">
                <button class="btn-link {{ $comment->isFavoritedBy(Auth::user()) ? 'btn-favorited' : 'btn-not-favorited' }}">
                    <i class="glyphicon glyphicon-heart"></i>
                </button>

                {{ $comment->body }}
            </li>
        @endforeach
    </ul>
</body>
</html>