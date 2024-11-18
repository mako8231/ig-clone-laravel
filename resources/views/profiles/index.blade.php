@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="width:200px; height:200px;" alt="">
        </div>
        <div class="col-lg-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center" style="padding-bottom: 10px">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button following='{{ $follows }}' user_id='{{$user->id}}'/>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div style="padding-right: 10px"><strong>{{ $postCount }}</strong> Posts</div>
                <div style="padding-right: 10px"><strong>{{ $followersCount }}</strong> Followers</div>
                <div style="padding-right: 10px"><strong>{{ $followingCount }}</strong> Following</div>
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
