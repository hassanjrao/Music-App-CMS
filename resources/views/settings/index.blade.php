@extends('layouts.backend')

@section('page-title', 'Settings')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">Settings</h3>


            </div>
            <div class="block-content">
                <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')



                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">



                            <div class="row mb-4">


                                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                    <?php
                                    $value = old('working_days', $setting ? $setting->working_days : []);

                                    ?>
                                    <label class="form-label" for="label"> Working Days <span
                                            class="text-danger">*</span></label>
                                            <select required multiple class="form-control" id="working_days" name="working_days[]">

                                                <option value="Monday" {{ in_array('Monday', $value) ? 'selected' : '' }}>Monday</option>
                                                <option value="Tuesday" {{ in_array('Tuesday', $value) ? 'selected' : '' }}>Tuesday</option>
                                                <option value="Wednesday" {{ in_array('Wednesday', $value) ? 'selected' : '' }}>Wednesday</option>
                                                <option value="Thursday" {{ in_array('Thursday', $value) ? 'selected' : '' }}>Thursday</option>
                                                <option value="Friday" {{ in_array('Friday', $value) ? 'selected' : '' }}>Friday</option>
                                                <option value="Saturday" {{ in_array('Saturday', $value) ? 'selected' : '' }}>Saturday</option>
                                                <option value="Sunday" {{ in_array('Sunday', $value) ? 'selected' : '' }}>Sunday</option>

                                            </select>
                                    @error('working_days')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                                    <?php
                                    $value = old('start_time', $setting ? $setting->start_time : null);

                                    ?>
                                    <label class="form-label" for="label"> Start Time <span
                                            class="text-danger">*</span></label>
                                    <input required type="time" value="{{ $value }}" class="form-control"
                                        id="start_time" name="start_time" placeholder="Enter Start Time">

                                    @error('start_time')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                                    <?php
                                    $value = old('end_time', $setting ? $setting->end_time : null);

                                    ?>
                                    <label class="form-label" for="label"> End Time <span
                                            class="text-danger">*</span></label>
                                    <input required type="time" value="{{ $value }}" class="form-control"
                                        id="end_time" name="end_time" placeholder="Enter End Time">

                                    @error('end_time')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>






                            </div>

                        </div>



                        <div class="d-flex justify-content-end mt-4">

                            <button type="submit" id="submitBtn"
                                class="btn btn-primary  border">Update</button>

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
