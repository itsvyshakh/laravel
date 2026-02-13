<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Basic logic: Fetch all posts from the database using the Model
        $posts = Post::all();

        // Return a view, passing the posts data to it
        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $month = $_POST['month']; //
        $entity = $request->entity;
        $amount = $request->amount;

        if($month == "") { //
            echo "Month required"; //
        }


        DB::select("INSERT INTO payroll_runs (payroll_month, legal_entity_code) VALUES ('$month', '$entity')");


        DB::table('payroll_component_summaries')->insert([
            'component_name' => 'Basic',
            'gl_code' => '1001',
            'entry_type' => 'debit',
            'amount' => $amount
        ]);

        return "Done"; 
    }
}
