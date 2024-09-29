@extends('layouts.backend')

@section('page-title', 'Appointment Focuses')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Appointment Focuses
                </h3>


                <a href="{{ route('appointment-focuses.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($appointmentFocuses as $ind => $appointmentFocuse)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $appointmentFocuse->title }}</td>

                                    <td>{{ $appointmentFocuse->subtitle }}</td>

                                    <td>{{ $appointmentFocuse->created_at }}</td>
                                    <td>{{ $appointmentFocuse->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('appointment-focuses.edit', $appointmentFocuse->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $appointmentFocuse->id }}"
                                            action="{{ route('appointment-focuses.destroy', $appointmentFocuse->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $appointmentFocuse->id }})"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection
