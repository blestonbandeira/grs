<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentType;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('documents.index')
        ->with(compact('documents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('documents.create')
        ->with(compact('documents', 'documentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($files = $request->file('file')) {

            foreach($request->file('file') as $file) {
                
            }
            $path = $request->file->storeAs('files_uploaded', $files->getClientOriginalName());
            
            $fileSize = $request->file('file')->getClientSize();
            $fileUploaded = $files->getClientOriginalName() . "." . $files->getClientOriginalExtension();
        
            $files->move($path, $fileUploaded);

            $document = new Document();
            $document->name = "$fileUploaded";
            $document->size= $fileSize;
            $document->save();
        }
        return back()->with('success', 'Ficheiro carregado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
