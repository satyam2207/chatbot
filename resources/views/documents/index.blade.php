<x-app-layout>

    <div style="max-width: 1000px; margin: 40px auto; padding: 20px;">

        <div style="display: flex; justify-content: space-between; align-items: center;">

            <h1>College Documents</h1>

            <a href="{{ route('documents.create') }}">
                + Upload Document
            </a>

        </div>

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        @if ($documents->count())

            <table width="100%" cellpadding="12" cellspacing="0">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($documents as $document)

                        <tr>

                            <td>
                                {{ $document->title }}
                            </td>

                            <td>
                                {{ $document->category ?? 'General' }}
                            </td>

                            <td>
                                {{ $document->file_name }}
                            </td>

                            <td>

                                <form
                                    action="{{ route('documents.destroy', $document) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <p>No college documents uploaded yet.</p>

        @endif

    </div>

</x-app-layout>