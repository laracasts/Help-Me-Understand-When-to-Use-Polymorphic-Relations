<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body class="container">
    <article>
        <h2>{{ $post->title }}</h2>

        <div class="body">
            {{ $post->body }}
        </div>
    </article>

    <hr>

    <h3>Comments</h3>

    <ul>
        @foreach ($post->comments as $comment)
            <li class="comment">
                {{ $comment->body }}
            </li>
        @endforeach
    </ul>
</body>
</html>