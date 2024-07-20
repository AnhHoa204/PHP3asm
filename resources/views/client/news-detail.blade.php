@extends('client.layouts.master')
@section('big-title')
    <h2 class="">{{ $post->title }}</h2>
    <hr>
@endsection
@section('main-content')
    <div class="mt-3">
        @if ($post->image)
        @if (Storage::exists('public/' . $post->image))
            <img src="{{ asset('storage/' . $post->image) }}" width="150px" height="100px" alt="">
        @else
            <img src="{{ $post->image }}" width="100%" height="150px"alt="">
        @endif
    @endif
    <i>Ngày đăng: {{ $date }} - Lượt xem: {{ $post->views }}</i>
        <p> <strong><i>{{ $post->short_content }}</i></strong> </p>

        <p>{{ $post->content }}</p>

    </div>
    <hr class="mt-5">
    <div class="text-center mt-5">
        <h3>Bài viết tương tự</h3>
    </div>
    <hr>
    @foreach ($similarArticles as $item)
        <div class="col-sm-4">
            <a href="{{ route('posts.show', $item->id) }}">
                @if ($item->image)
                    @if (Storage::exists('public/' . $item->image))
                        <img src="{{ asset('storage/' . $item->image) }}" width="150px" height="100px" alt="">
                    @else
                        <img src="{{ $item->image }}" width="100%" height="150px"alt="">
                    @endif
                @endif
            </a>
            <a href="{{ route('posts.show', $item->id) }}" class="text-decoration-none text-black">
                <h4>{{ Str::limit($item->title, 25) }}</h4>
            </a>
            <p class=" text-black-50">{{ Str::limit($item->short_content, 100) }}</p>
        </div>
    @endforeach
@endsection
@section('sidebar')
    <div class="sidebar bg-light p-2">
        <h4 class="text-center">Tin Nổi Bật Nhất </h4>
        @foreach ($data as $item)
            <a href="{{ route('posts.show', $item->id) }}"
                class="text-decoration-none text-black">{{ Str::limit($item->title, 50) }}</a> <br>
            <i class="text-decoration-none text-black-50">- Lượt xem:
                {{ $item->views }}</i><br>

            <hr>
        @endforeach
        <h4 class="text-center">Tin Mới Nhất</h4>
        @foreach ($latestNews as $item)
            <a href="{{ route('posts.show', $item->id) }}"
                class="text-decoration-none text-black">{{ Str::limit($item->title, 50) }}</a> <br>
            <i class="text-decoration-none text-black-50">- Ngày đăng: {{ $item->created_at }}</i><br>
            <hr>
        @endforeach
    </div>
@endsection
