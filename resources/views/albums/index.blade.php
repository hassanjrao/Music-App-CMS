@extends("layouts.backend")

@section('css_after')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">

@endsection

@section('content')


    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">

                <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Album</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="name">Album Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>
                                            </div>
                                           

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div class="content">




        <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-popin">Add
            Album</button>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Albums</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                           
                                <th>Created at</th>

                                <th>Updated at</th>

                                <th style="width: 15%">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($albums as $index => $album)


                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $album->name }}
                                    </td>
                                   

                                    <td>
                                        {{ $album->created_at }}
                                    </td>

                                    <td>
                                        {{ $album->updated_at }}
                                    </td>

                                    <td>


                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                            <a href="{{ route('albums.edit', $album->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $album->id }}"
                                                action="{{ route('albums.destroy', $album->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $album->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>



                                    </td>

                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- END Page Content -->


@section('js_after')


    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>


    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <script>
        function confirmDelete(id) {
            swal({
                    title: "Are you sure?",
                    text: "There may be songs associated with this album, those songs will get deleted too!!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#form-" + id).submit();
                    }
                });

        }
    </script>
@endsection

@endsection
