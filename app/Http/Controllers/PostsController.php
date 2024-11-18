<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
//Novos módulos de regras
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Intervention\Image\ImageManager;

class PostsController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'caption' => 'required',
            'image' => [
                'required',
                File::image()->min(0)->max(20 * 1024)->dimensions(Rule::dimensions()
                ->maxWidth(10000)
                ->maxHeight(10000)),

            ],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        
        //Obtemos os bytes da imagem
        $image = ImageManager::gd()->read("storage/{$imagePath}");
        //Aplicamos um 'fit' na imagem, redimensionando com base no centro em 1200x1200
        $image->cover(1200, 1200, 'center');
        //Salvamos os bytes da imagem, no caso substituindo o arquivo original
        //Se você quiser, pode alterar o nome da imagem usando um regex de forma que você 
        //consiga inserir algo como nome_da_imagem__thumbnail.png de forma que você 
        //preserve a dimensão do arquivo original 
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'title' => $data['title'],
        ]);
        //Redirecionando de fato para o perfil
        return redirect('/profile/' . auth()->user()->id);
        //\App\Models\Post::create($data);
    }

    public function show(\App\Models\Post $post)
    {   
        return view('posts.show', compact('post'));
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);
        return view("posts.index", ['posts' => $posts]);
    }
}
