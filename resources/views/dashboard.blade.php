@extends('layouts.backend')

@section('page-title','Dashboard')

@section('content')
    <div class="content">
        <div class="row row-deck">
            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('users.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $users }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Registered Users</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-2x fa-users text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('users.index') }}">
                                <span>View Users</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('djs.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $djs }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">DJs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-headphones fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('djs.index') }}">
                                <span>View DJs</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('songs.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $songs }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Songs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-music fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('songs.index') }}">
                                <span>View Songs</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('event-planning-essentials.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $eventPlanningEssentials }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Event Planning Essentials</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-eye fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('event-planning-essentials.index') }}">
                                <span>View Event Planning Essentials</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('services.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $services }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Services</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-cogs fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('services.index') }}">
                                <span>View Services</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('services.requests') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $servicesRequests }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Services Requests</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-cogs fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('services.requests') }}">
                                <span>View Requests</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('staffs.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $staffs }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Staffs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-wrench fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('staffs.index') }}">
                                <span>View Staffs</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('events.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $events }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Events</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-calendar fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('events.index') }}">
                                <span>View Events</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('appointment-focuses.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $appointmentFocuses }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Appointment Focuses</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-umbrella fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('appointment-focuses.index') }}">
                                <span>View Appointment Focuses</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('meetings.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $meetings }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Meetings</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-handshake fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('meetings.index') }}">
                                <span>View Meetings</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>
@endsection
