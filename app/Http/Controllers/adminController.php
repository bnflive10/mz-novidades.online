<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Rqst;
use DB;
use Session;

class adminController extends Controller
{
    public function admin(){
        return view ('backend.index');
    }

    public function addPost(){

        $categories = DB::table('categories')->get();
        return view ('backend.posts.add-post', ['categories' => $categories]);
    }

    public function category(){
        $data = DB::table('categories')->get();
        return view ('backend.categorias.category',['data'=>$data]);
    }

    public function login(){
        return view ('backend.login');
    }

    public function allPosts(){
        $posts = DB::table('posts')->orderby('pid','DESC')->paginate(20);
        foreach ($posts as $post) {
            $categories = explode(',',$post->category_id);
            foreach ($categories as $cat) {
                $postcat = DB::table('categories')->where('cid',$cat)->value('title');
                $postcategories[] = $postcat;
                $postcat = implode(', ',$postcategories);
            }
            $post->category_id = $postcat;
            $postcategories = [];
        }

        $published = DB::table('posts')->where('status','publish')->count();
        $allposts = DB::table('posts')->count();
        return view ('backend.posts.all-posts',['posts'=>$posts,'published'=>$published,'allposts'=>$allposts]);
    }

    public function menu(){
        return view ('backend.menu');
    }

    public function editCategory($id){
        $singledata = DB::table('Categories')->where('cid',$id)->first();
        if($singledata == NULL){
            return redirect('category');
        }
        $data = DB::table('categories')->get();
        return view ('backend.categorias.editcategory',['data'=>$data,'singledata'=>$singledata]);
    }

    public function multipleDelete(){
        $data = Rqst::except('_token');
        if ($data['bulk-action']==0) {
            session::flash('message','por favor selecione a accao que pretente executar');
            return redirect()->back();
        }
        $tbl = decrypt($data['tbl']);
        $tblid = decrypt($data['tblid']);
        if (empty($data['select-data'])) {
            session::flash('message','por favor selecione os dados que pretente apagar');
            return redirect()->back();
        }
        $ids = $data['select-data'];
        foreach ($ids as $id) {
            DB::table($tbl)->where($tblid,$id)->delete();
        }
        session::flash('message','dado apagado com sucesso');
            return redirect()->back();
    }

    public function settings(){
        $data = DB::table('settings')->first();  
        if ($data) {
            $data->social = explode(',', $data->social);
          
        }
        return view('backend.settings', ['data'=>$data]);
    }

    public function editPost($id){
        $data = DB::table('posts')->where('pid',$id)->first();
        $postcat = explode(',',$data->category_id);
        $categories = DB::table('categories')->get();
        return view('backend.posts.edit',['data'=>$data,'categories'=>$categories,'postcat' => $postcat]);
    }
}
