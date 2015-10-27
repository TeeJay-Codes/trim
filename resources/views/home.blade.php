<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>URL Trimmer With Laravel 5.1</title>
    <link rel="stylesheet" href="/app.css">
</head>

<body>
<div class="container">
    <h1 class="title">Trim URL.</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($trimmedUrl))
        <p class="alert alert-success">This is your trimmed url  is
            <strong><a href="{{ url($trimmedUrl->code) }}">{{ url($trimmedUrl->code) }}</a></strong>
        </p>
    @endif

    <form action="{{route('url.make')}}" method="post">
        {{ csrf_field() }}
        <input required type="url" name="url" placeholder="Enter a url" autocomplete="off" value="{{ old('url')}}">
        <input type="submit" value="Trim!">
    </form>
</div>
</body>
</html>