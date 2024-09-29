@extends('layouts.backend')

@php
    $addEdit = isset($eventPlanningEssential) ? 'Edit' : 'Add';
    $addUpdate = isset($eventPlanningEssential) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Event Planning Essential')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Event Planning Essential</h3>

                <a href="{{ route('event-planning-essentials.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($eventPlanningEssential)
                    <form action="{{ route('event-planning-essentials.update', $eventPlanningEssential->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('event-planning-essentials.store') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('title', $eventPlanningEssential ? $eventPlanningEssential->title : null);

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

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $eventPlanningEssential ? $eventPlanningEssential->description : null);

                                ?>
                                <label class="form-label" for="label"> Description <span
                                        class="text-danger">*</span></label>
                                <textarea required class="form-control" id="description" name="description" placeholder="Description">{{ $value }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <?php
                                $value = old('is_featured', $eventPlanningEssential ? $eventPlanningEssential->is_featured : null);

                                ?>
                                <div class="form-check form-switch form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="is_featured" name="is_featured" {{ $value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Is Featured</label>
                                </div>

                                @error('is_featured')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                @if ($eventPlanningEssential && $eventPlanningEssential->video_path)
                                    <video width="320" height="240" controls>
                                        <source src="{{ $eventPlanningEssential->video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif

                                <label class="form-label" for="label">Video <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="video" accept="video/*"
                                    {{ $eventPlanningEssential ? '' : 'required' }} name="video">
                                @error('video')
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
