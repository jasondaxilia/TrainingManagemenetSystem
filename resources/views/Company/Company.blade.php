@extends('layout.admin')

@section('content')
    {{-- @php
        dd($companies);
    @endphp --}}

    <div class="container">
        <h1>Company List</h1>
        <button class="btn btn-success mb-3">
            <a href="{{ route('AddCompanyPage') }}" style="text-decoration: none; color: white;">
                Add Company
            </a>
        </button>
        <table id="companiesTable" class="table table-hover display w-100 p-5">
            <thead>
                <tr class="text-center">
                    <th>Company Code</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Total Employee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr class="text-center">
                        <td>{{ $company->company_code }}</td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>{{ $company->user_count }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('EditCompanyPage', $company->id) }}">Edit</a>
                            <form action="{{ route('DeleteCompany', $company->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
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
