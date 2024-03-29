<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $user->name }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3 mt-3 shadow">
                <img src="{{ $user->image->url }}" class="float-start rounded-circle mr-2 mt-2" alt="User Image Profile" />
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3>
                <p>
                    <strong>Instagram</strong>: {{ $user->profile->instagram }} <br>
                    <strong>GitHub</strong>: {{ $user->profile->github }} <br>
                    <strong>Web</strong>: <a href="{{ route('home') }}" class="text-decoration-none">{{ $user->profile->web }}</a>
                </p>
                <p>
                    <strong>País</strong>: {{ $user->location->country }} <br>
                    <strong>Nivel</strong>:
                        @if ($user->level)
                            <a href="{{ route('level', $user->level->id) }}" class="text-decoration-none">
                                {{ $user->level->name }}
                            </a>
                        @else
                            <em>No Level</em>
                        @endif
                </p>
                <hr>
                <p>
                    <strong>Grupos</strong>:
                    @forelse($user->groups as $group)
                        <span class="badge bg-dark">
                            {{ $group->name }}
                        </span>
                    @empty
                        <em>No Group</em>
                    @endforelse
                </p>
                <hr>
                <h3>Posts</h3>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="card-img" alt="Image Post" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $post->image->name }}
                                            </h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $post->category->name }} |
                                                {{ $post->comments_count }}
                                                {{-- Si solo tiene un valor, en singular --}}
                                                {{ Str::plural('comentario', $post->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach($post->tags as $tag)
                                                    <span class="badge bg-secondary">
                                                        #{{ $tag->name }}
                                                    </span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>
                <h3>Videos</h3>
                <div class="row g-0">
                    @foreach($videos as $video)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ $video->image->url }}" class="card-img" alt="Image Video" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $video->image->name }}
                                            </h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $video->category->name }} |
                                                {{ $video->comments_count }}
                                                {{-- Si solo tiene un valor, en singular --}}
                                                {{ Str::plural('comentario', $video->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach($video->tags as $tag)
                                                    <span class="badge bg-secondary">
                                                        #{{ $tag->name }}
                                                    </span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
