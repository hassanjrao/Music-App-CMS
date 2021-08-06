@extends("layouts.backend")
@section('content')




    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Album</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-5">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="name">Album Name</label>
                                    <input required type="text" class="form-control" id="name" name="name"
                                        value="{{ $album->name }}">
                                </div>
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->


@endsection
