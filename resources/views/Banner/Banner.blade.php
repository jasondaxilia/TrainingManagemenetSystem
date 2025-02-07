@extends('layout.admin')

@section('content')
    {{-- @php
        dd($banners);
    @endphp --}}

    <div class="container">
        <h1>Banner List</h1>
        <button class="btn btn-success mb-3">
            <a href="/AddBanner">
                Add Banner
            </a>
        </button>
        <table id="BannerTables" class="table table-hover display w-100">
            <thead>
                <tr>
                    <th>Banner Name</th>
                    <th>Banner Image</th>
                    <th>Banner Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->banner_name }}</td>
                        <td><img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $banner->banner_image }}"
                                style="width: 400px">
                        </td>
                        <td>{{ $banner->banner_link }}</td>
                        <td>
                            <a href="{{ route('EditBannerPage', $banner->id) }}">Edit</a>
                            <form action="{{ route('DeleteBanner', $banner->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
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
            $('#BannerTables').DataTable(); // Initialize DataTables
        });
    </script>
@endsection
