@extends('layouts.backend')

@section('page-title', 'Event Planning Essentials')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Event Planning Essentials
                </h3>


                <a href="{{ route('event-planning-essentials.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Is Featured</th>
                                <th>Description</th>
                                <th>Video</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($eventPlanningEssentials as $ind => $eventPlanningEssential)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $eventPlanningEssential->title }}</td>
                                    <td>
                                        @if ($eventPlanningEssential->is_featured)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $eventPlanningEssential->description }}
                                    </td>
                                    <td>
                                        @if ($eventPlanningEssential->video_path)
                                            <video width="320" height="240" controls>
                                                <source src="{{ $eventPlanningEssential->video_url }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $eventPlanningEssential->created_at }}</td>
                                    <td>{{ $eventPlanningEssential->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('event-planning-essentials.edit', $eventPlanningEssential->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $eventPlanningEssential->id }}"
                                            action="{{ route('event-planning-essentials.destroy', $eventPlanningEssential->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $eventPlanningEssential->id }})"
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
