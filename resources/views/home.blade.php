@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 p-5">
            <img src="/images/mayuri.png" class="rounded-circle" style="width:200px; height:200px;" alt="">
        </div>
        <div class="col-lg-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div style="padding-right: 10px"><strong>143</strong> Posts</div>
                <div style="padding-right: 10px"><strong>300K</strong> Followers</div>
                <div style="padding-right: 10px"><strong>212</strong> Following</div>
            </div>
            <div class='pt-4' style="font-weight: bold;" >makoblog.org</div>
            <div> lorem ipsum blablabla </div>
            <div><a href="#">www.makoblog.org</a></div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <img src="https://i.pinimg.com/736x/6b/f5/f6/6bf5f60577803e2b4c517cc9599ad06e.jpg" alt="" style="width: 250px"/>
        </div>
        <div class="col-lg-4">
            <img src="https://i.pinimg.com/736x/1d/af/6f/1daf6f12c875d3d07b84e60d0ff31c38.jpg" alt="" style="width: 250px"/>
        </div>
        <div class="col-lg-4">
            <img src="https://i.pinimg.com/736x/9e/be/b3/9ebeb34d762151f1d61fafea7a7d457a.jpg" alt="" style="width: 250px"/>
        </div>
    </div>
</div>
@endsection
