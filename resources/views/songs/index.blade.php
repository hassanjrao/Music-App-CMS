@extends("layouts.backend")

@section('css_after')

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/tagsinput/tagin.min.css') }}" />



    <style>
        .tagin-tag {
            margin-right: 2px !important;
            color: white !important;
            background-color: #0275d8 !important;
            padding: 7px 8px !important;
            border-radius: 3px !important;
            border: 1px solid #01649e !important;
            font-size: 13px !important;
        }

        .songtags {
            margin-right: 2px !important;
            color: white !important;
            background-color: #0275d8 !important;
            padding: 7px 8px !important;
            border-radius: 3px !important;
            border: 1px solid #01649e !important;
            font-size: 13px !important;
        }

    </style>


@endsection

@section('content')


    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
            <div class="modal-content">

                <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Song</h3>
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
                                                    <label class="form-label" for="song">Upload Song</label>
                                                    <input required type="file" class="form-control" id="song" name="song">
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <label class="form-label" for="name">Title</label>
                                                    <input required type="text" class="form-control" id="name" name="title">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label" for="album_id">Album</label>
                                                    <select name="album_id" id="album_id" class="form-select">
                                                        <option value="" disabled selected hidden>Select Album</option>
                                                        <option value="" >No Album</option>
                                                        @forelse ($albums as $album)
                                                            <option value="{{ $album->id }}"> {{ $album->name }}
                                                            </option>
                                                        @empty
                                                            <option disabled>No Album Found</option>
                                                        @endforelse


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <label class="form-label" for="genre">Genre</label>
                                                    <select required name="genre_id" id="" class="form-select">
                                                        <option value="" disabled selected hidden>Select Genre</option>
                                                        @forelse ($genres as $genre)
                                                            <option value="{{ $genre->id }}"> {{ $genre->genre }}
                                                            </option>
                                                        @empty
                                                            <option disabled>No Genre Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label" for="dj_name">DJ Name</label>
                                                    <input required type="text" class="form-control" id="dj_name"
                                                        name="dj_name">

                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="image">Image</label>
                                                    <input required type="file" class="form-control" id="image"
                                                        name="image">
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description"
                                                        rows="4" placeholder="Description.."></textarea>
                                                </div>

                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-6">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="explicit_lyrics" name="explicit_lyrics">
                                                        <label class="form-check-label" for="explicit_lyrics">Explicit
                                                            Lyrics</label>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="private" name="private">
                                                        <label class="form-check-label" for="private">Private</label>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="tags">Tags</label>

                                                    <input type="text" name="tags" class="form-control tagin"
                                                        value="css,script,com" data-placeholder="Type and press comma" />

                                                 

                                                </div>


                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-6">

                                                    <label class="form-label" for="check_date">Published date</label>
                                                    <select required name="check_date" id="check_date" class="form-select"
                                                        onclick="checkDate()">
                                                        <option value="" disabled selected hidden>Published date</option>
                                                        <option>Now</option>
                                                        <option>Later</option>
                                                    </select>

                                                </div>

                                                <div class="col-6" id="picker">



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
            song</button>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Songs</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Song</th>
                                <th>Title</th>
                                <th>Album</th>
                                <th>Genre</th>
                                <th>Image</th>
                                <th>Dj Name</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>Explicit Lyrics</th>
                                <th>Private</th>
                                <th>Published at</th>

                                <th>Created at</th>

                                <th>Updated at</th>

                                <th style="width: 15%">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($songs as $index => $song)


                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        <audio controls>
                                            <source src="{{ asset("/storage/files/songs/$song->song") }}"
                                                type="audio/ogg">
                                            <source src="{{ asset("/storage/files/songs/$song->song") }}"
                                                type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                    </td>

                                    <td>
                                        {{ $song->title }}
                                    </td>

                                    <td>
                                        {{ $song->album ? $song->album->name : "" }}
                                    </td>

                                    <td>
                                        {{ $song->genre->genre }}
                                    </td>

                                    <td>
                                        <img src="{{ asset("/storage/images/songs/$song->image") }}" alt="song-img"
                                            width="100px" height="100px">

                                    </td>

                                    <td>
                                        {{ $song->dj_name }}
                                    </td>

                                    <td>
                                        {{ $song->description }}
                                    </td>

                                    <td >
                                        @forelse ($song->tags as $tag)
                                            
                                                #{{ $tag->tag }},
                                            

                                        @empty
                                            No Tag Found
                                        @endforelse
                                    </td>

                                    <td>
                                        @if ($song->explicit_lyrics === 1)
                                            Yes
                                        @else
                                            No
                                        @endif

                                    </td>
                                    <td>
                                        @if ($song->private === 1)
                                            Yes
                                        @else
                                            No
                                        @endif

                                    </td>

                                    <td>
                                        {{ $song->published_at }}
                                    </td>


                                    <td>
                                        {{ $song->created_at }}
                                    </td>

                                    <td>
                                        {{ $song->updated_at }}
                                    </td>

                                    <td>


                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                            <a href="{{ route('songs.edit', $song->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $song->id }}"
                                                action="{{ route('songs.destroy', $song->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $song->id }})"
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

        <!-- jQuery (required for DataTables plugin) -->
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

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>


        <script src="{{ asset('js/plugins/tagsinput/tagin.min.js') }}"></script>


        <script>
            One.helpersOnLoad(['js-flatpickr']);
            for (const el of document.querySelectorAll('.tagin')) {
                tagin(el)
            }
        </script>



        <!-- Page JS Code -->
        {{-- <script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script> --}}

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script>
            function checkDate() {

                var date = document.getElementById("check_date").value;

                console.log(date);
                if (date == "Later") {

                    var label = '<label class="form-label" for="example-flatpickr-datetime">Calendar and time picker</label>'

                    var dateTimePicker =
                        ' <input type="text" required class="js-flatpickr form-control" id="published_date" name="published_date" placeholder="Select Date & Time" data-enable-time="true">';



                    document.getElementById("picker").innerHTML = label + dateTimePicker;


                    flatpickr("#published_date", {

                        time_24hr: true,
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                    });

                } else {
                    document.getElementById("picker").innerHTML = "";
                }
            }


            function confirmDelete(id) {
                swal({
                        title: "Are you sure?",
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
