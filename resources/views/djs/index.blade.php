@extends('layouts.backend')

@section('page-title', 'DJs')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    DJs
                </h3>


                <a href="{{ route('djs.create') }}" class="btn btn-primary">Add</a>



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
                                <th>About</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($djs as $ind => $dj)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $dj->name }}</td>
                                    <td>
                                        @if($dj->image)
                                        <img src="{{ $dj->image_url }}" alt="image" class="img-fluid">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ $dj->about }}</td>

                                    <td>{{ $dj->created_at }}</td>
                                    <td>{{ $dj->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('djs.edit', $dj->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $dj->id }}"
                                            action="{{ route('djs.destroy', $dj->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $dj->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
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

