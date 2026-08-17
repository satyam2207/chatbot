<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'document' => 'required|file|mimes:pdf,doc,docx,txt|max:20480',
        ]);

        $file = $request->file('document');

        $path = $file->store('college-documents', 'public');

        Document::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);

        $document->delete();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}