<?php

namespace App\Http\Controllers;

use App\Models\TextEditor;
use Illuminate\Http\Request;

class TextEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('texteditor.texteditor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editor = new TextEditor();
        $editor->image = $request->image;
        $editor->save();
        return response()->json($editor,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TextEditor  $textEditor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TextEditor::findOrFail($id);
        return view('texteditor.image')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TextEditor  $textEditor
     * @return \Illuminate\Http\Response
     */
    public function edit(TextEditor $textEditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TextEditor  $textEditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TextEditor $textEditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TextEditor  $textEditor
     * @return \Illuminate\Http\Response
     */
    public function destroy(TextEditor $textEditor)
    {
        //
    }
}
