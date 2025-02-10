@extends('layout.' . $user->role)

@section('content')
    {{-- @php
        dd($companies);
    @endphp --}}

    <div class="container">
        <h1>Manual Book</h1>

        @if ($user->role == 'admin')
            <button class="btn btn-success mb-3">
                <a href="{{ route('AddManualBookPage') }}" style="text-decoration: none; color: white;">
                    Add Manual Book
                </a>
            </button>
        @endif
        <table id="manualbookTable" class="table table-hover display w-100 p-5">
            <thead>
                <tr class="text-center">
                    <th>Manual Book Name</th>
                    <th>Manual Book Description</th>
                    <th>Manual Book Writer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manual_books as $manual_book)
                    <tr class="text-center">
                        <td>{{ $manual_book->manual_book_name }}</td>
                        {{-- <td>{{ $manual_book->manual_book_description }}</td> --}}
                        <td class="col-md-5">
                            @if (strlen($manual_book->manual_book_description) >= 75)
                                {{ Str::limit($manual_book->manual_book_description, 75, '...') }}
                            @elseif (strlen($manual_book->manual_book_description) <= 75)
                                {{ $manual_book->manual_book_description }}
                            @endif
                        </td>
                        <td>{{ $manual_book->manual_book_writer }}</td>
                        <td>
                            <a class="btn btn-primary"
                                href="{{ route('DetailManualBookPage', $manual_book->id) }}">Detail</a>
                            @if ($user->role == 'admin')
                                <a class="btn btn-secondary"
                                    href="{{ route('EditManualBookPage', $manual_book->id) }}">Edit</a>
                                <form action="{{ route('DeleteManualBook', $manual_book->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#manualbookTable').DataTable(); // Initialize DataTables
        });
    </script>
@endsection
