@extends('layouts.backend')

@section('page-title', 'Meetings')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Meetings
                </h3>


                {{-- <a href="{{ route('meetings.create') }}" class="btn btn-primary">Add</a> --}}



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Appointment Focus</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($meetings as $ind => $meeting)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $meeting->appointmentFocus->title }}</td>
                                    <td>{{ $meeting->user->name }}</td>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->time }}</td>

                                    <td>{{ $meeting->created_at }}</td>
                                    <td>{{ $meeting->updated_at }}</td>

                                    <td>
                                        <form id="form-{{ $meeting->id }}"
                                            action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $meeting->id }})"
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
