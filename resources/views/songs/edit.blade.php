@extends("layouts.backend")


@section('css_after')

    <!-- Page JS Plugins CSS -->


    <link rel="stylesheet" href="{{ asset('js/plugins/tagsinput/tagin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">


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

    </style>

@endsection
@section('content')




    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Song</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('songs.update', $song->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-6">
                                    <audio controls>
                                        <source src="{{ asset("/storage/files/songs/$song->song") }}" type="audio/ogg">
                                        <source src="{{ asset("/storage/files/songs/$song->song") }}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="song">Update Song</label>
                                    <input  type="file" class="form-control" id="song" name="song">
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="name">Title</label>
                                    <input required type="text" class="form-control" id="name" name="title"
                                        value="{{ $song->title }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="album_id">Album</label>
                                    <select name="album_id" id="album_id" class="form-select">
                                        <option value="" disabled selected hidden>Select Album</option>
                                        @forelse ($albums as $album)
                                            @if ($album->id === $song->album_id)
                                                <option selected value="{{ $album->id }}"> {{ $album->name }}
                                                </option>
                                            @else
                                                <option value="{{ $album->id }}"> {{ $album->name }}
                                                </option>
                                            @endif

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

                                            @if ($genre->id === $song->genre_id)
                                                <option selected value="{{ $genre->id }}"> {{ $genre->genre }}
                                                </option>
                                            @else
                                                <option value="{{ $genre->id }}"> {{ $genre->genre }}
                                                </option>

                                            @endif

                                        @empty
                                            <option disabled>No Genre Found</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="dj_name">DJ Name</label>
                                    <input required type="text" class="form-control" id="dj_name" name="dj_name"
                                        value="{{ $song->dj_name }}">

                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <img src="{{ asset("/storage/images/songs/$song->image") }}" alt="song-img"
                                        width="200px" height="200px">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="image">Update Image</label>
                                    <input  type="file" class="form-control" id="image" name="image">
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                        placeholder="Description..">{{ $song->description }}</textarea>
                                </div>

                            </div>


                            <div class="row mb-4">
                                <div class="col-6">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            {{ $song->explicit_lyrics == 1 ? 'checked' : '' }} id="explicit_lyrics"
                                            name="explicit_lyrics">
                                        <label class="form-check-label" for="explicit_lyrics">Explicit
                                            Lyrics</label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            {{ $song->private == 1 ? 'checked' : '' }} id="private" name="private">
                                        <label class="form-check-label" for="private">Private</label>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="tags">Tags</label>

                                    <input type="text" name="tags" class="form-control tagin" value="@foreach ($song->tags as $k => $tag) {{ $tag->tag }}{{ $k != count($song->tags) - 1 ? ',' : '' }} @endforeach"
                                    data-placeholder="Type and press comma" />



                                </div>


                            </div>


                            <div class="row mb-4">
                                {{-- <div class="col-6">

                                    <label class="form-label" for="check_date">Published date</label>
                                    <select required name="check_date" id="check_date" class="form-select"
                                        onclick="checkDate()">
                                        <option value="" disabled selected hidden>Published date</option>
                                        <option>Now</option>
                                        <option>Later</option>
                                    </select>

                                </div> --}}

                                <div class="col-6" id="picker">

                                    <label class="form-label" for="example-flatpickr-datetime">Published at</label>

                                    <input type="text" required class="js-flatpickr form-control" id="published_date"
                                        name="published_date" placeholder="Select Date & Time"
                                        value="{{ $song->published_at }}" data-enable-time="true">


                                </div>

                            </div>

                            <br>
                            <div class="row mb-4">
                                <div class="col-6">

                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>

                            </div>




                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->




    @section('js_after')

        <script src="{{ asset('js/plugins/tagsinput/tagin.min.js') }}"></script>

        <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>



        <script>
              One.helpersOnLoad(['js-flatpickr']);
            for (const el of document.querySelectorAll('.tagin')) {
                tagin(el)
            }
        </script>


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
                        text: "There may be songs associated with this song, those songs will get deleted too!!",
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
