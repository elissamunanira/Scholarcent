<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Facades\Eloquent;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Branch;
use Spatie\Permission\Models\Role;
use DB;
use App\Http\Requests;

class PostsController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except'=> ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::All();
        //return Post::where('title', 'Second thesis')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')-> with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view ('posts.create',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request , [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // if($request->hasFile('profilePic')){
        //     $formFields['profilePic'] =$request->file('profilePic')->store('profiles', 'public');
        // }


        // if($request->hasFile('cover_image')){
        //         $cover_image = $request->file('cover_image');
        //         // @unlink(public_path('images' . $request->cover_image));
        //         $fileNameToStore = date('YmdHi') . $cover_image->getClientOriginalName();
        //         $cover_image->move(public_path('images'), $fileNameToStore);
        //     }

        // Handle File upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image' )->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image' )->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/images/',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        //create a new post


        $branch_id=$request->branch_name;
        // dd($branch_id);
        $branch_details = Branch::find($branch_id);
        $branch_name= $branch_details->branch_name;
        $post = new Post();
        $post->branch_name=$branch_name;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->User()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        $post->branch()->attach($branch_id);

        return redirect('/dashboard')-> with('success','Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $recentPosts = Post::orderBy('created_at','desc')->paginate(4);
        $branches = Branch::all();
        $post = Post::find($id);
        return view('home.single',compact('recentPosts','branches','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $postInfo = Post::find($id);
        $branches = Branch::all();
        $post = Post::find($id);

        //check for the correct user

        if(auth()->user()->roles){
            foreach(auth()->user()->roles as $role){
                if (($role->name == 'Admin')||($role->name != 'Admin' && auth()->user()->id == $project->user_id)){

                    return view('posts.edit',compact('branches'))->with('post', $post);
                }
            }
        }


        else{
            return redirect('/posts')->with('error', 'unauthorized Page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this -> validate($request , [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Handle File upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image' )->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image' )->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->saveAs('public/images/',$fileNameToStore);
        }
        //updating post
 


        $post_id = DB::table('branch_post')->where('post_id',$id)->value('branch_id');
        
        $branch_id=$request->branch_name;
        
        $branch_details = Branch::find($branch_id);
        $branch_name= $branch_details->branch_name;

        $post = Post::find($id);

        $post->branch_name = $branch_name;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image =$fileNameToStore;
        } 
        
        $post->update();

        $post->branch()->detach($post_id);
        $post->branch()->attach($branch_id);

        // $post->assign($request->input('branches'));

        return redirect('/posts')-> with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->roles){
            foreach(auth()->user()->roles as $role){
                if (($role->name == 'Admin')||($role->name != 'Admin' && auth()->user()->id == $project->user_id)){
                    if($post->cover_image != 'noimage.jpg'){
                        //Delete the image
                        Storage::delete('/public/images/'. $post->cover_image);
                        //other alternative
                        // Retrieve the image file path
                        // $imagePath = $post->image; // Assuming 'image' is the attribute that stores the image file path

                        // // Delete the image file
                        // if (!empty($imagePath)) {
                        //     if (file_exists($imagePath)) {
                        //         unlink($imagePath);
                        //     }
                    }

                    $post->delete();
                    return redirect('/posts')->with('success','Post deleted successfully');
                }
            }
        }

        else{
            return redirect('/posts')->with('error', 'unauthorized Page');
        }
    }

    public function branchBlog(Branch $branches){ 
        $posts = Post::orderBy('created_at','desc')->where('branch_name', $branches->branch_name)->paginate(6);
        return view('home.blogs', compact('branches', 'posts'));
    }
  
}
