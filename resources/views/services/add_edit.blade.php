@extends('layouts.backend')

@php
    $addEdit = isset($service) ? 'Edit' : 'Add';
    $addUpdate = isset($service) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Service')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Service</h3>

                <a href="{{ route('services.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($service)
                    <form action="{{ route('services.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $service ? $service->name : null);

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

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($service && $service->image)
                                    <img src="{{ $service->image_url }}" alt="image" style="width: 200px !important; height: 200px;">
                                @endif

                                <label class="form-label" for="label">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                accept="image/*"
                                    {{ $service ? '' : 'required' }} name="image">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $service ? $service->description : null);

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
