@extends('layouts.backend')

@php
    $addEdit = isset($event) ? 'Edit' : 'Add';
    $addUpdate = isset($event) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Event')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Event</h3>

                <a href="{{ route('events.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($event)
                    <form action="{{ route('events.update', $event->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4 justify-content-between">


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $event ? $event->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $event ? $event->description : null);

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


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($event && $event->image)
                                    <img src="{{ $event->image_url }}" alt="image" style="width: 200px !important; height: 200px;">
                                @endif

                                <label class="form-label" for="label">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                accept="image/*"
                                    {{ $event ? '' : 'required' }} name="image">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('date', $event ? $event->date : null);

                                ?>
                                <label class="form-label" for="label"> Date <span
                                        class="text-danger">*</span></label>
                                <input required type="date" value="{{ $value }}" class="form-control"
                                    id="date" name="date" placeholder="Select Date">
                                @error('date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('time_start', $event ? $event->time_start : null);

                                ?>
                                <label class="form-label" for="label"> Time Start <span
                                        class="text-danger">*</span></label>
                                <input required type="time" value="{{ $value }}" class="form-control"
                                    id="time_start" name="time_start" placeholder="Select Time Start">
                                @error('time_start')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('time_end', $event ? $event->time_end : null);

                                ?>
                                <label class="form-label" for="label"> Time End <span
                                        class="text-danger">*</span></label>
                                <input required type="time" value="{{ $value }}" class="form-control"
                                    id="time_end" name="time_end" placeholder="Select Time End">
                                @error('time_end')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('venue', $event ? $event->venue : null);

                                ?>
                                <label class="form-label" for="label"> Venue <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="venue" name="venue" placeholder="Enter Venue">
                                @error('venue')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('location', $event ? $event->location : null);

                                ?>
                                <label class="form-label" for="label"> Location <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="location" name="location" placeholder="Enter Location">
                                @error('location')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 mt-4">
                                <?php
                                $value = old('is_active', $event ? $event->is_active : null);

                                ?>
                                <div class="form-check form-switch form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="is_active" name="is_active" {{ $value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Is Active</label>
                                </div>

                                @error('is_active')
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
