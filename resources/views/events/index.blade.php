@extends('layouts.backend')

@section('page-title', 'Events')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Events
                </h3>


                <a href="{{ route('events.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time Start</th>
                                <th>Time End</th>
                                <th>Venue</th>
                                <th>Location</th>
                                <th>Is Active</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($events as $ind => $event)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $event->name }}</td>

                                    <td>
                                        @if ($event->image)
                                            <img src="{{ $event->image_url }}" alt="image" class="img-fluid" >
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->time_start }}</td>
                                    <td>{{ $event->time_end }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->is_active }}</td>
                                    
                                    <td>{{ $event->created_at }}</td>
                                    <td>{{ $event->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $event->id }}"
                                            action="{{ route('events.destroy', $event->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $event->id }})"
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
