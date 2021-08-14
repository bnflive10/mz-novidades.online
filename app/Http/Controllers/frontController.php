<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Rqst;
use DB;
use Session;
use tatwerat\SocialCounter\SocialCounter;

class frontController extends Controller
{
    public function __construct(){
        $categories = DB::table('categories')->where('status','on')->get();
        $settings = DB::table('settings')->first();
        if ($settings) {
            $settings->social = explode(',', $settings->social);
            foreach ($settings->social as $social) {
                $icon = explode('.',$social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }else{
            $icons = [];
        }
        //Menu Categorias
        //ciencia
        $menuciencia = DB::table('posts')->where('category_id','LIKE','14')->orderby('pid','DESC')->get();
        foreach ($menuciencia as $categoria) {

            $category = explode(',',$categoria->category_id);

            foreach($categories as $cat){
                if(in_array($cat->cid,$category)){
                    $postcategories[] = $cat->title;


                }
                //
            }

            $categoria->category_id = implode(',', $postcategories);
            $postcategories = [];

        }

        //saude
        $menutecnologia = DB::table('posts')->where('category_id','LIKE','1')->orderby('pid','DESC')->get();
        self::menuCategorias($menutecnologia);

        //saude
        $menusaude = DB::table('posts')->where('category_id','LIKE','7')->orderby('pid','DESC')->get();
        self::menuCategorias($menusaude);

        //educacao
        $menueducacao = DB::table('posts')->where('category_id','LIKE','%22')->orwhere('category_id','LIKE','%22%')->orwhere('category_id','LIKE','22%')->orderby('pid','DESC')->get();
        self::menuCategorias($menueducacao);

        //desporto
        $menudesporto = DB::table('posts')->where('category_id','LIKE','6')->orderby('pid','DESC')->get();
        self::menuCategorias($menudesporto);
        //Fim do menu categorias


    $SocialCounter = new SocialCounter([
    'facebook_id' => '{treysongz}',
    'youtube_id' => '{Bnflive10}',
    'dribbble_id' => '{user_id}',
    'github_id' => '{user_id}',
    'soundcloud_id' => '{user_id}',
    'behance_id' => '{user_id}',
    'instagram_id' => '{user_id}',
    'google_api_key' => 'xxxxxxxx',
    'dribbble_access_token' => 'xxxxxxxxxxxxxx',
    'soundcloud_api_key' => 'xxxxxxxxxxxxxx',
    'behance_api_key' => 'xxxxxxxxxxxxxx',
]);
 
$SocialCounter->cache = true; // Cache Social Counts ( improvement the loading of your server )
        view()->share([
            'categories' => $categories,
            'settings' => $settings,
            'icons' => $icons,
            'menuciencia'=>$menuciencia,
            'menutecnologia'=>$menutecnologia,
            'menusaude'=>$menusaude,
            'menueducacao'=>$menueducacao,
            'menudesporto'=>$menudesporto,
            'SocialCounter'=>$SocialCounter
        ]);
    }
//minhas funcoes

    //menu de categorias para cabecalho
    function menuCategorias($menucategoria){
        $categories = DB::table('categories')->where('status','on')->get();

        
        foreach ($menucategoria as $categoria) {

            $category = explode(',',$categoria->category_id);

            foreach($categories as $cat){
                if(in_array($cat->cid,$category)){
                    $postcategories[] = $cat->title;


                }
                //
            }

            $categoria->category_id = implode(',', $postcategories);
            $postcategories = [];

        }
        if (isset($categoria->category_id)) {
            return $categoria->category_id;
        }
    }

    //remover elemento do array
    function removeElement($array,$value) {
     if (($key = array_search($value, $array)) !== false) {
       unset($array[$key]);
   }
   return $array;
}
//fim das minhas funcoes


public function index(){

    $categories = DB::table('categories')->where('status','on')->get();

    $featured = DB::table('posts')->where('category_id','LIKE','%13%')->orderby('pid','DESC')->get();
    self::menuCategorias($featured);
    
       //exit();

    //general posts
    $data = DB::table('posts')->orderby('pid','DESC')->paginate(10);
    self::menuCategorias($data);

    $populares = DB::table('posts')->where('category_id','LIKE','%24%')->orderby('pid','DESC')->get();
    self::menuCategorias($populares);

    $videos = DB::table('posts')->where('category_id','LIKE','%25%')->orderby('pid','DESC')->get();
    self::menuCategorias($videos);

    return view ('frontend.index',
        ['featured'=>$featured,
        'data'=>$data,
        'categories'=>$categories,
        'populares'=>$populares,
        'videos'=>$videos
    ]);
}

public function author(){
    return view ('frontend.author');
}

public function categoria($category_id){

    $categories = DB::table('categories')->where('status','on')->get();
    foreach($categories as $key=>$cat){
        if($cat->title == $category_id){
            $category = $cat->cid;
        }
    }
    
    $categoria = DB::table('posts')->where('category_id','LIKE','%'.$category.'%')->orwhere('category_id','LIKE','% '.$category)->orwhere('category_id','LIKE',$category.'%')->orderby('pid','DESC')->paginate(12);
    self::menuCategorias($categoria);
    //$categoria = $data->where('category_id','=',$category_id);

    return view ('frontend.category-01',['categoria'=>$categoria,'category_id'=>$category_id]);
}


public function category02(){
    return view ('frontend.category-02');
}
public function category03(){
    return view ('frontend.category-03');
}
public function single($slug){
    $categories = DB::table('categories')->where('status','on')->get();
    $data = DB::table('posts')->where('slug',$slug)->first();


    $category = explode(',',$data->category_id);

    foreach($categories as $cat){
        if(in_array($cat->cid,$category)){
            $postcategories[] = $cat->title;


        }
                //
    }
    $category = $category[0];
    $data->category_id = implode(',', $postcategories);
    $postcategories = [];
    if (isset($data->pid)) {
                // code...            
       $n = $data->pid - 1;
       $p = $data->pid + 1;
   }  

   $next = DB::table('posts')->where('pid',$n)->first();
   $prev = DB::table('posts')->where('pid',$p)->first();


   $related = DB::table('posts')->where('category_id','LIKE','%'.$category.'%')->get();
   self::menuCategorias($related);

   $populares = DB::table('posts')->where('category_id','LIKE','%24%')->orderby('pid','DESC')->get();
   self::menuCategorias($populares);

   return view ('frontend.single',['data'=>$data,
    'categories'=>$categories,
    'populares'=>$populares,
    'next'=>$next,
    'prev'=>$prev,
    'related'=>$related]);
}
public function contact(){
    return view ('frontend.contact');
}


public function searchContent(){
    $text = $_GET['text'];
    print_r($text);
}
}
