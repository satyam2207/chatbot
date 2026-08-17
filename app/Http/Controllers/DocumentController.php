<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\DocumentProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
   public function index(Request $request)
{
    $query = Document::query();

    // Search by title or file name
    if ($request->filled('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('file_name', 'like', '%' . $search . '%');
        });
    }

    // Filter by category
    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }

    $documents = $query
        ->latest()
        ->get();

    $categories = Document::query()
        ->whereNotNull('category')
        ->where('category', '!=', '')
        ->distinct()
        ->orderBy('category')
        ->pluck('category');

    return view('documents.index', compact(
        'documents',
        'categories'
    ));
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

        $document = Document::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
        ]);

        /*
         * Automatically extract and chunk the uploaded document.
         */
      try {
    $processor = app(DocumentProcessor::class);

    $processor->process($document);
} catch (\Throwable $exception) {
    report($exception);

    $document->update([
        'processing_status' => 'failed',
        'processing_error' => $exception->getMessage(),
    ]);
}
        return redirect()
            ->route('documents.index')
            ->with('success', 'Document uploaded and processed successfully.');
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