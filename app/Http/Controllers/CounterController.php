<?php

namespace App\Http\Controllers;

use App\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::all();
        return view('admin.admin-content.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin-content.counter.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'title_bn' => 'required',
            'title_en' => 'required',
            'content_bn' => 'required',
            'content_en' => 'required',
//            'image' => 'required|mimes:jpeg,jpg,png',
        ]);


        Counter::create($inputs);
        session()->flash('create', 'Data Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('admin.admin-content.counter.edit', compact('counter'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $inputs = \request()->validate([
            'title_bn' => 'required',
            'title_en' => 'required',
            'content_bn' => 'required',
            'content_en' => 'required',
//            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $counter->update($inputs);
        session()->flash('create', 'Data Updated Successfully');
        return redirect()->route('counter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
        session()->flash('delete', 'Data Deleted Successfully');

        return redirect()->route("counter.index");
    }
}
