@extends('layouts.backend')

@php
    $addEdit = isset($appointmentFocus) ? 'Edit' : 'Add';
    $addUpdate = isset($appointmentFocus) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Appointment Focus')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Appointment Focus</h3>

                <a href="{{ route('appointment-focuses.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($appointmentFocus)
                    <form action="{{ route('appointment-focuses.update', $appointmentFocus->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('appointment-focuses.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('title', $appointmentFocus ? $appointmentFocus->title : null);

                                ?>
                                <label class="form-label" for="label"> Title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="title" name="title" placeholder="Enter Title">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('subtitle', $appointmentFocus ? $appointmentFocus->subtitle : null);

                                ?>
                                <label class="form-label" for="label"> Sub title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="subtitle" name="subtitle" placeholder="Enter Sub title">
                                @error('subtitle')
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
