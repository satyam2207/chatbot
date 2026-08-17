<x-app-layout>

    <div style="max-width: 700px; margin: 40px auto; padding: 20px;">

        <h1>Upload College Document</h1>

        @if ($errors->any())
            <div style="margin-bottom: 20px; color: #b91c1c;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('documents.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div style="margin-bottom: 15px;">
                <label for="title">Document Title</label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    style="width: 100%; padding: 10px;"
                >
            </div>

            <div style="margin-bottom: 15px;">
                <label for="category">Category</label>

                <select
                    id="category"
                    name="category"
                    style="width: 100%; padding: 10px;"
                >
                    <option value="">Select category</option>
                    <option value="Admission">Admission</option>
                    <option value="Fees">Fees</option>
                    <option value="Exam">Exam</option>
                    <option value="Syllabus">Syllabus</option>
                    <option value="Scholarship">Scholarship</option>
                    <option value="Notice">Notice</option>
                    <option value="Department">Department</option>
                    <option value="General">General</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="document">Document</label>

                <input
                    id="document"
                    type="file"
                    name="document"
                    accept=".pdf,.doc,.docx,.txt"
                    required
                >
            </div>

            <button type="submit">
                Upload Document
            </button>

        </form>

    </div>

</x-app-layout>