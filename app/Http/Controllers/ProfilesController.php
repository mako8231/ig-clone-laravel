<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;


class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id): false ;
        //dd($follows);
        $postCount = Cache::remember(
            'count.posts' . $user->id, 
            now()->addSecond(30), 
            function() use($user){
                return $user->posts->count();
        }); 
        
        $followersCount = Cache::remember(
            'count.followers' . $user->id, 
            now()->addSecond(30), 
            function() use($user){
                return $user->profile->followers->count();
        }); 
        
        $followingCount = Cache::remember(
            'count.following' . $user->id, 
            now()->addSecond(30), 
            function() use($user){
                return $user->following->count();
        });  
        
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user) 
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            "title" => 'required',
            "description" => 'required',
            "url" => 'url',
            "image" => ''
        ]);

    
        //Caso o usuário queira alterar a sua foto de perfil:
        if (request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');
            $image = ImageManager::gd()->read("storage/{$imagePath}");
            $image->cover(1000, 1000, 'center');
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        //Um workaround para não precisar ficar reeditando a variável $data
        //Corrigindo o crash quando se sobe uma imagem vazia
        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));

        return redirect("/profile/". $user->id);

    }
}
