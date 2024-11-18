@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class='w-100'>
        </div>
        <div class='col-4'>
            <div class="d-flex align-items-center">
                <div style="padding-right: 15px">
                    <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px;" alt="">
                </div>
                <div class="d-flex ">
                    <p style="font-weight:bold;" > <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark" style="text-decoration: none">
                                {{ $post->user->username }}
                            </span>
                        </a>
                    </p>
                    <a style="padding-left: 10px" href="#">Follow</a>
                </div>
                

            </div>
            <hr>
            <p> 
                <span style="font-weight: bold"> 
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark" style="text-decoration: none">{{ $post->user->username }}</span>
                    </a>
                </span> {{ $post->caption }} 
            </p>
        </div>
    </div>
    
</div>

@endsection