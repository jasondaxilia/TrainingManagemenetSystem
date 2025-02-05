@extends('layout.admin')

@section('content')
    {{-- @php
        dd($companies);
    @endphp --}}

    <div class="container">
        <h1>Company List</h1>
        <button class="btn btn-success">
            <a href="/AddCompany">
                Add Company
            </a>
        </button>
        <table id="companiesTable" class="display">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Company Code</th>
                    <th>Company Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_code }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>
                            <a href="{{ route('EditCompanyPage', $company->id) }}">Edit</a>
                            <form action="{{ route('DeleteCompany', $company->id) }}" method="POST" style="display:inline;">
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
            $('#companiesTable').DataTable(); // Initialize DataTables
        });
    </script>
@endsection
