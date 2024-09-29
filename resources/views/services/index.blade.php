@extends('layouts.backend')

@section('page-title', 'Services')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Services
                </h3>


                <a href="{{ route('services.create') }}" class="btn btn-primary">Add</a>



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
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($services as $ind => $service)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>
                                        @if ($service->image)
                                            <img src="{{ $service->image_url }}" alt="image" class="img-fluid" style="width: 200px !important; height: 200px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $service->description }}</td>

                                    <td>{{ $service->created_at }}</td>
                                    <td>{{ $service->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $service->id }}"
                                            action="{{ route('services.destroy', $service->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $service->id }})"
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
