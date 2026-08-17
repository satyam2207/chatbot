<x-app-layout>

    <div style="max-width: 1100px; margin: 40px auto; padding: 20px;">

        {{-- Header --}}
        <div style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        ">

            <div>
                <h1 style="margin: 0; font-size: 28px;">
                    College Documents
                </h1>

                <p style="margin-top: 6px; color: #64748b;">
                    Manage documents used by College AI.
                </p>
            </div>

            <a
                href="{{ route('documents.create') }}"
                style="
                    background: #4f46e5;
                    color: white;
                    padding: 11px 18px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 600;
                "
            >
                + Upload Document
            </a>

        </div>


        {{-- Success message --}}
        @if (session('success'))

            <div style="
                background: #ecfdf5;
                color: #047857;
                border: 1px solid #a7f3d0;
                padding: 12px 15px;
                border-radius: 8px;
                margin-bottom: 20px;
            ">
                ✓ {{ session('success') }}
            </div>

        @endif

{{-- Search and filter --}}
<form
    method="GET"
    action="{{ route('documents.index') }}"
    style="
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    "
>

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search documents..."
        style="
            flex: 1;
            min-width: 220px;
            padding: 11px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
        "
    >

    <select
        name="category"
        style="
            padding: 11px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
        "
    >

        <option value="">All Categories</option>

        @foreach ($categories as $category)

            <option
                value="{{ $category }}"
                @selected(request('category') === $category)
            >
                {{ $category }}
            </option>

        @endforeach

    </select>

    <button
        type="submit"
        style="
            background: #0f172a;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        "
    >
        Search
    </button>

    @if (request('search') || request('category'))

        <a
            href="{{ route('documents.index') }}"
            style="
                padding: 11px 15px;
                border: 1px solid #cbd5e1;
                border-radius: 8px;
                text-decoration: none;
                color: #475569;
                background: white;
            "
        >
            Clear
        </a>

    @endif

</form>
        {{-- Documents --}}
        @if ($documents->count())

            <div style="
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                overflow: hidden;
            ">

                <table width="100%" cellpadding="14" cellspacing="0">

                    <thead>

                        <tr style="
                            background: #f8fafc;
                            text-align: left;
                            color: #475569;
                        ">

                            <th>Document</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Chunks</th>
                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($documents as $document)

                            <tr style="
                                border-top: 1px solid #e2e8f0;
                            ">

                                {{-- Document --}}
                                <td>

                                    <div style="font-weight: 600;">
                                        {{ $document->title }}
                                    </div>

                                    <div style="
                                        color: #64748b;
                                        font-size: 13px;
                                        margin-top: 3px;
                                    ">
                                        {{ $document->file_name }}
                                    </div>

                                </td>


                                {{-- Category --}}
                                <td>

                                    {{ $document->category ?? 'General' }}

                                </td>


                                {{-- Processing status --}}
                                <td>

                                    @if ($document->processing_status === 'processed')

                                        <span style="
                                            background: #dcfce7;
                                            color: #166534;
                                            padding: 5px 10px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 600;
                                        ">
                                            ✓ Processed
                                        </span>

                                    @elseif ($document->processing_status === 'processing')

                                        <span style="
                                            background: #fef3c7;
                                            color: #92400e;
                                            padding: 5px 10px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 600;
                                        ">
                                            ⟳ Processing
                                        </span>

                                    @elseif ($document->processing_status === 'failed')

                                        <span style="
                                            background: #fee2e2;
                                            color: #991b1b;
                                            padding: 5px 10px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 600;
                                        ">
                                            ✕ Failed
                                        </span>

                                    @else

                                        <span style="
                                            background: #e2e8f0;
                                            color: #475569;
                                            padding: 5px 10px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 600;
                                        ">
                                            Uploaded
                                        </span>

                                    @endif

                                </td>


                                {{-- Chunk count --}}
                                <td>

                                    @if ($document->processing_status === 'processed')

                                        {{ $document->chunk_count }}

                                    @else

                                        —

                                    @endif

                                </td>


                                {{-- Delete --}}
                                <td>

                                    <form
                                        action="{{ route('documents.destroy', $document) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this document?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            style="
                                                background: #fee2e2;
                                                color: #b91c1c;
                                                border: none;
                                                padding: 7px 12px;
                                                border-radius: 7px;
                                                cursor: pointer;
                                                font-weight: 600;
                                            "
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div style="
                text-align: center;
                padding: 60px 20px;
                border: 1px dashed #cbd5e1;
                border-radius: 12px;
                color: #64748b;
            ">

                <div style="font-size: 40px;">
                    📚
                </div>

                <h2 style="color: #334155;">
                    No college documents
                </h2>

                <p>
                    Upload PDFs, Word documents or text files for College AI.
                </p>

            </div>

        @endif

    </div>

</x-app-layout>