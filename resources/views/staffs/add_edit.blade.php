@extends('layouts.backend')

@php
    $addEdit = isset($staff) ? 'Edit' : 'Add';
    $addUpdate = isset($staff) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Staff')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Staff</h3>

                <a href="{{ route('staffs.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($staff)
                    <form action="{{ route('staffs.update', $staff->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4 justify-content-between">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $staff ? $staff->name : null);

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

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('designation', $staff ? $staff->designation : null);

                                ?>
                                <label class="form-label" for="label"> Designation <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="designation" name="designation" placeholder="Enter Designation">
                                @error('designation')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($staff && $staff->image)
                                    <img src="{{ $staff->image_url }}" alt="image" style="width: 200px !important; height: 200px;">
                                @endif

                                <label class="form-label" for="label">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                accept="image/*"
                                    {{ $staff ? '' : 'required' }} name="image">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <?php
                                $value = old('description', $staff ? $staff->description : null);

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
