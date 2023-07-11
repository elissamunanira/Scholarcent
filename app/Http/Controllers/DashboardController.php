<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Branch;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }
    // public function count(){
    //     $posts = Post::all();
    //     $postsCount = Post::all()->count();
    //     $usersCount = User::all()->count();
    //     $rolesCount = Role::all()->count();
    //     return view('dashboard.index',compact('postsCount','usersCount','rolesCount'));
    // }
    public function post(){
        //count

        $postsCount = Post::all()->count();
        $usersCount = User::all()->count();
        $rolesCount = Role::all()->count();
        $commentsCount = Comment::all()->count();
        $branchesCount = Branch::all()->count();

        //start of post chart
                    
        $postChart = Post::select('id','created_at')->get()->groupBy(function($postChart){
            return Carbon::parse($postChart->created_at)->format('Y-M');
        });
        
        $postMonths =[];
        $postMonthCount = [];
        foreach($postChart as $postMonth => $postValues){
            $postMonths[] = $postMonth;
            $postMonthCount[] = count($postValues);
        }

        //end of post chart
        $user_id = auth()->user()->id;
        $i = 0;
        $postOwner = DB::table('posts')
                    ->where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    // ->get();
                    ->paginate(10);

        return view('dashboard.index',compact('postsCount','usersCount','rolesCount','branchesCount','postChart','postMonthCount','postMonths','postOwner','i'));

        // return view('dashboard.index',compact('postsCount','usersCount','rolesCount','branchesCount','postOwner','i'));
    }

    public function dashboardPost(){

        $i = 0;
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.posts',compact('posts','i'));
    }
}
