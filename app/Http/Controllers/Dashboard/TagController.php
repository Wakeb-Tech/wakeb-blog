<?php

namespace App\Http\Controllers\Dashboard;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
   
    public function index()
    {
        $tags = Tag::whenSearch(request()->search)
            ->paginate(5);

        return view('dashboard.tags.index', compact('tags'));

    }//end of index

    public function create()
    {
        return view('dashboard.tags.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name',
        ]);

        Tag::create($request->all());
        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.tags.index');

    }//end of store

    public function show()
    {

    }//end of show

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));

    }//end of edit

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($request->all());
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.tags.index');

    }//end of update

    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.tags.index');

    }//end of destroy

}//end of controller
