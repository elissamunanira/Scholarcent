<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Branch;

class BranchController extends Controller
{



    function __construct()
    {
         $this->middleware('permission:branch-list|branch-create|branch-edit|branch-delete', ['only' => ['index','store']]);
         $this->middleware('permission:branch-create', ['only' => ['create','store']]);
         $this->middleware('permission:branch-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:branch-delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $i=0;
        $branches = Branch::all();
        return view('branches.index',compact('i'))-> with('branches', $branches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request , [
            'branch_name' => 'required',
            'campus' => 'required'
        ]);

        $branch = new Branch();
        $branch->branch_name = $request->input('branch_name');
        $branch->campus = $request->input('campus');
        $branch->save();

        return redirect('/dashboard')-> with('success','Branch created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $branch = Branch::find($id);
        return view('branches.show')->with('branch', $branch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $branch = Branch::find($id);

        //check for the correct user

        // if(auth()->user()->id != $branch->user_id){
        //     return redirect('/dashboard')->with('error', 'unauthorized Page');
        // }
        return view('branches.edit')->with('branch', $branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request , [
            'branch_name' => 'required',
            'campus' => 'required'
        ]);

        $branch = Branch::find($id); 
        $branch->branch_name = $request->input('branch_name');
        $branch->campus = $request->input('campus');
        $branch->save();

        return redirect('/branches')-> with('success','branches updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch = Branch::find($id); 
        $branch->delete();
        return redirect('/posts')->with('success','Post deleted successfully');
    }
}
