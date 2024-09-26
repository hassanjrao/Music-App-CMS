@extends('layouts.backend')

@section('page-title', 'Songs')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Songs
                </h3>


                <a href="{{ route('songs.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Audio</th>
                                <th>Sub Title</th>
                                <th>Cover Image</th>

                                <th>Thumbnail</th>
                                <th>DJ</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($songs as $ind => $song)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $song->title }}</td>
                                    <td>
                                        @if ($song->song)
                                            <audio controls>
                                                <source src="{{ $song->streaming_url }}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $song->subtitle }}</td>

                                    <td>
                                        @if ($song->image)
                                            <img src="{{ $song->artwork_url }}" alt="image" class="img-fluid">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($song->thumbnail)
                                            <img src="{{ $song->thumbnail_url }}" alt="image" class="img-fluid">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $song->dj->name }}</td>

                                    <td>{{ $song->created_at }}</td>
                                    <td>{{ $song->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $song->id }}"
                                            action="{{ route('songs.destroy', $song->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $song->id }})"
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
