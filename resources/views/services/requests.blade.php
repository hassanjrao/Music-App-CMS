@extends('layouts.backend')

@section('page-title', 'Requests')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Requests
                </h3>




            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                {{-- <th>Updated At</th> --}}
                                {{-- <th>Action</th> --}}

                            </tr>


                        </thead>

                        <tbody>

                            @foreach ($serviceRequests as $ind=> $request)
                                <tr>
                                    <td>{{ $ind + 1 }}</td>
                                    <td>
                                        <a href="{{ $request->service->id }}" target="_blank">{{ $request->service->name }}
                                        </a>
                                    </td>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->email }}</td>
                                    <td>{{ $request->phone }}</td>

                                    <td>{{ $request->created_at }}</td>
                                    {{-- <td>{{ $request->updated_at }}</td> --}}

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection
