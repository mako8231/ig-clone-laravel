@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 p-5">
            <img src="/images/mayuri.png" class="rounded-circle" style="width:200px; height:200px;" alt="">
        </div>
        <div class="col-lg-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div style="padding-right: 10px"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div style="padding-right: 10px"><strong>300K</strong> Followers</div>
                <div style="padding-right: 10px"><strong>212</strong> Following</div>
            </div>
            <div class='pt-4' style="font-weight: bold;" >{{ $user->profile->title }}</div>
            <div> {{ $user->profile->description }} </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
            
        </div>
    </div>

    <div class="row">
        @foreach ($user->posts as $post)
            <div class="col-lg-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" style="width: 250px"/>
                </a>
            </div>    
        @endforeach
        
        
    </div>
</div>
@endsection
