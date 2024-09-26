@extends('layouts.backend')

@php
    $addEdit = isset($song) ? 'Edit' : 'Add';
    $addUpdate = isset($song) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Song')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Song</h3>

                <a href="{{ route('songs.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($song)
                    <form action="{{ route('songs.update', $song->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('title', $song ? $song->title : null);

                                ?>
                                <label class="form-label" for="label"> Title <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="title" name="title" placeholder="Enter title">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('subtitle', $song ? $song->subtitle : null);

                                ?>
                                <label class="form-label" for="label"> Sub Title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="subtitle" name="subtitle" placeholder="Enter Sub Title">
                                @error('subtitle')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('dj', $song ? $song->dj_id : null);

                                ?>
                                <label class="form-label" for="label"> DJ <span class="text-danger">*</span></label>

                                <select required class="form-select" id="dj" name="dj">
                                    <option value="">Select DJ</option>
                                    @foreach ($djs as $dj)
                                        <option value="{{ $dj->id }}"
                                            @if ($dj->id == $value) selected @endif>
                                            {{ $dj->name }}</option>
                                    @endforeach
                                </select>

                                @error('dj')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($song && $song->song)
                                    <audio controls>
                                        <source src="{{ $song->streaming_url }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @endif

                                <label class="form-label" for="label">Audio <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="audio" accept="audio/*"
                                    {{ $song ? '' : 'required' }} name="audio">
                                @error('audio')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($song && $song->thumbnail)
                                    <img src="{{ $song->thumbnail_url }}" alt="thumbnail" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Thumbnail <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="thumbnail"
                                accept="image/*"
                                    {{ $song ? '' : 'required' }} name="thumbnail">
                                @error('thumbnail')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($song && $song->image)
                                    <img src="{{ $song->artwork_url }}" alt="image" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Cover Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="cover_image"
                                accept="image/*"
                                    {{ $song ? '' : 'required' }} name="cover_image">
                                @error('cover_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>






                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $song ? $song->description : null);

                                ?>
                                <label class="form-label" for="label"> Description <span class="text-danger"></span></label>
                                <textarea required class="form-control" id="description" name="description" placeholder="Description">{{ $value }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>

                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
