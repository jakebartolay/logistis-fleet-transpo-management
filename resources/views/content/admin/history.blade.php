@extends('layouts/layoutMaster')

@section('title', 'Chat')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-chat.js') }}"></script>
@endsection
@php
    $user = auth()->user();
@endphp


@section('content')
    <div class="app-chat card overflow-hidden">
        <div class="row g-0">
            <!-- Chat & Contacts -->
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
                <div class="sidebar-header">
                    <h5 class="text-primary mb-0">Account</h5>

                    <div class="d-flex align-items-center me-3 me-lg-0">
                        <div class="flex-shrink-0 avatar  me-3" data-bs-toggle="sidebar" data-overlay="app-overlay-ex"
                            data-target="#app-chat-sidebar-left">
                            <img class="user-avatar rounded-circle cursor-pointer"
                                src="{{ Auth::user()->profile_photo_url }}"alt="{{ Auth::user()->name }}"
                                class="rounded-circle">

                        </div>

                        <h6 class="m-0">
                            @if (Auth::check())
                                @php
                                    $user = Auth::user();
                                    $fullName = $user->firstname . ' ' . $user->lastname;
                                @endphp
                                <br>
                                <p>{{ $fullName }}<br><span style="font-size: 13px;">{{ $user->role }}</span>
                                </p>
                            @endif
                        </h6>

                    </div>
                    <i class="ti ti-x cursor-pointer mt-2 me-1 d-lg-none d-block position-absolute top-0 end-0" data-overlay
                        data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                </div>
                <hr class="container-m-nx m-0">
                <div class="sidebar-body">

                    <!-- Chats -->
                    <ul class="list-unstyled chat-contact-list" id="chat-list">
                        @if ($messages->isEmpty())
                        @else
                            <?php $displayedUserIDs = []; ?>
                            @foreach ($messages as $message)
                                @if ($message->SenderID != Auth::id() && !in_array($message->SenderID, $displayedUserIDs))
                                    <?php $displayedUserIDs[] = $message->SenderID; ?>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                    @include('content.admin.chat')

                    <div class="app-overlay"></div>
                </div>
            </div>


        @endsection

        {{-- <style>
            .app-chat {
                position: relative;
                height: calc(100vh - 11.5rem);
            }

            .layout-navbar-hidden .app-chat {
                height: calc(100vh - 7.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat {
                    height: calc(100vh - 11.5rem - 2.2rem) !important;
                }
            }

            @media (max-width: 992px) {
                .app-chat .app-sidebar {
                    z-index: 4;
                }
            }

            .app-chat .app-sidebar .sidebar-header {
                position: relative;
                padding: 0.73rem 1.25rem;
            }

            .app-chat .app-sidebar .sidebar-header .close-sidebar {
                position: absolute;
                top: 0.5rem;
                right: 0.5rem;
                margin: 0.15rem 0.15rem 0 0;
            }

            .app-chat .app-chat-contacts {
                position: absolute;
                left: calc(-21rem - 1rem);
                height: calc(100vh - 11.5rem);
                width: 21rem;
                -ms-flex-preferred-size: 21rem;
                flex-basis: 21rem;
                transition: all 0.25s ease;
            }

            .layout-navbar-hidden .app-chat .app-chat-contacts {
                height: calc(100vh - 7.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-contacts {
                    height: calc(100vh - 11.5rem - 2.2rem);
                }
            }

            @media (min-width: 992px) {
                .app-chat .app-chat-contacts {
                    position: static;
                }
            }

            .app-chat .app-chat-contacts.show {
                left: 0rem;
            }

            .app-chat .app-chat-contacts .sidebar-body {
                height: calc(calc(100vh - 11.5rem) - 3.9rem);
                height: calc(calc(100vh - 11.5rem) - 3.5rem);
            }

            .layout-navbar-hidden .app-chat .app-chat-contacts .sidebar-body {
                height: calc(calc(100vh - 7.5rem) - 3.9rem);
                height: calc(calc(100vh - 11.5rem) - 3.5rem);
            }

            @media (min-width: 992px) {
                .layout-horizontal .app-chat .app-chat-contacts .sidebar-body {
                    height: calc(calc(100vh - 11.5rem) - 5rem + 2.2rem / 2);
                }
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-contacts .sidebar-body {
                    height: calc(calc(100vh - 11.5rem) - 5rem - 2.2rem);
                }
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: justify;
                justify-content: space-between;
                padding: 0.5rem 0.75rem;
                margin: 0.25rem 0.75rem;
                border-radius: 0.375rem;
                cursor: pointer;
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item a {
                width: 100%;
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item .avatar {
                border: 2px solid transparent;
                border-radius: 50%;
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item .chat-contact-info {
                min-width: 0;
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item .chat-contact-info .chat-contact-name {
                line-height: 1.5;
            }

            .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.chat-contact-list-item small {
                white-space: nowrap;
            }

            .app-chat .app-chat-sidebar-left {
                position: absolute;
                top: 0;
                left: calc(-21rem - 1rem);
                width: 21rem;
                height: calc(100vh - 11.5rem);
                opacity: 0;
                z-index: 5;
                transition: all 0.25s ease;
            }

            .layout-navbar-hidden .app-chat .app-chat-sidebar-left {
                height: calc(100vh - 7.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-sidebar-left {
                    height: calc(100vh - 11.5rem - 2.2rem);
                }
            }

            .app-chat .app-chat-sidebar-left.show {
                left: 0;
                opacity: 1;
            }

            .app-chat .app-chat-sidebar-left .sidebar-body {
                height: calc(calc(100vh - 11.5rem) - 11.5rem);
            }

            .layout-navbar-hidden .app-chat .app-chat-sidebar-left .sidebar-body {
                height: calc(calc(100vh - 7.5rem) - 11.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-sidebar-left .sidebar-body {
                    height: calc(calc(100vh - 11.5rem) - 10.9rem - 2.2rem);
                }
            }

            .app-chat .app-chat-history {
                position: relative;
                height: calc(100vh - 11.5rem);
                transition: all 0.25s ease;
            }

            .layout-navbar-hidden .app-chat .app-chat-history {
                height: calc(100vh - 7.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-history {
                    height: calc(100vh - 11.5rem - 2.2rem);
                }
            }

            .app-chat .app-chat-history .chat-history-header {
                padding: 0.575rem 1.25rem;
            }

            .app-chat .app-chat-history .chat-history-header .user-status {
                margin-bottom: 0.1rem;
            }

            .app-chat .app-chat-history .chat-history-body {
                height: calc(100vh - 20.5rem);
                padding: 2rem 1.5rem;
                overflow: hidden;
            }

            .layout-navbar-hidden .app-chat .app-chat-history .chat-history-body {
                height: calc(100vh - 16.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-history .chat-history-body {
                    height: calc(100vh - 20.5rem - 2.2rem);
                }
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message .chat-message-text {
                border-radius: 0.375rem;
                padding: 0.75rem 1rem;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message:not(.chat-message-right) .chat-message-text {
                border-top-left-radius: 0;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right {
                -ms-flex-pack: end;
                justify-content: flex-end;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right .chat-message-text {
                border-top-right-radius: 0;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right .user-avatar {
                margin-right: 0rem;
                margin-left: 1rem;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message .thumbnail {
                cursor: zoom-in;
            }

            .app-chat .app-chat-history .chat-history-body .chat-history .chat-message:not(:last-child) {
                margin-bottom: 1rem;
            }

            .app-chat .app-chat-history .chat-history-footer {
                padding: 0.575rem 0.5rem;
                margin: 0 1.5rem;
                border-radius: 0.375rem;
            }

            .app-chat .app-chat-sidebar-right {
                position: absolute;
                top: 0;
                right: calc(-21rem - 1rem);
                width: 21rem;
                height: calc(100vh - 11.5rem);
                opacity: 0;
                z-index: 5;
                transition: all 0.25s ease;
            }

            .layout-navbar-hidden .app-chat .app-chat-sidebar-right {
                height: calc(100vh - 7.5rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-sidebar-right {
                    height: calc(100vh - 11.5rem - 2.2rem);
                }
            }

            .app-chat .app-chat-sidebar-right.show {
                opacity: 1;
                right: 0;
            }

            .app-chat .app-chat-sidebar-right .sidebar-body {
                height: calc(calc(100vh - 11.5rem) - 11.75rem);
            }

            .layout-navbar-hidden .app-chat .app-chat-sidebar-right .sidebar-body {
                height: calc(calc(100vh - 7.5rem) - 11.75rem);
            }

            @media (min-width: 1200px) {
                .layout-horizontal .app-chat .app-chat-sidebar-right .sidebar-body {
                    height: calc(calc(100vh - 11.5rem) - 11.1rem - 2.2rem);
                }
            }

            @media (max-width: 576px) {

                .app-chat .app-chat-sidebar-right.show,
                .app-chat .app-chat-sidebar-left.show,
                .app-chat .app-chat-contacts.show {
                    width: 100%;
                }
            }

            .light-style .app-chat .app-chat-contacts,
            .light-style .app-chat .app-chat-sidebar-left {
                background-color: #fff;
                box-shadow: 0 0 0 1px rgba(75, 70, 92, 0.075);
            }

            .light-style .app-chat .app-chat-contacts .chat-actions .chat-search-input,
            .light-style .app-chat .app-chat-sidebar-left .chat-actions .chat-search-input {
                background-color: #f8f7fa;
            }

            .light-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active,
            .light-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active {
                color: #fff;
            }

            .light-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active h6,
            .light-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active .text-muted,
            .light-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active h6,
            .light-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active .text-muted {
                color: #fff !important;
            }

            .light-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active .avatar,
            .light-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active .avatar {
                border-color: #fff;
            }

            .light-style .app-chat .app-chat-history .chat-history-header,
            .light-style .app-chat .app-chat-history .chat-history-footer {
                background-color: #fff;
            }

            .light-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message .chat-message-text {
                background-color: #fff;
                box-shadow: 0 0.125rem 0.25rem rgba(165, 163, 174, 0.3);
            }

            .light-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right {
                -ms-flex-pack: end;
                justify-content: flex-end;
            }

            .light-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right .chat-message-text {
                color: #fff;
            }

            .light-style .app-chat .app-chat-sidebar-right {
                background-color: #fff;
                box-shadow: 16px 1px 45px 3px rgba(75, 70, 92, 0.5);
            }

            @media (max-width: 992px) {
                .light-style .app-chat .app-chat-contacts .chat-actions .chat-search-input {
                    background-color: #fff;
                }
            }

            .dark-style .app-chat .app-chat-contacts,
            .dark-style .app-chat .app-chat-sidebar-left {
                background-color: #2f3349;
            }

            .dark-style .app-chat .app-chat-contacts .chat-actions .chat-search-input,
            .dark-style .app-chat .app-chat-sidebar-left .chat-actions .chat-search-input {
                background-color: #25293c;
            }

            .dark-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active,
            .dark-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active {
                color: #fff;
            }

            .dark-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active h6,
            .dark-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active .text-muted,
            .dark-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active h6,
            .dark-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active .text-muted {
                color: #fff !important;
            }

            .dark-style .app-chat .app-chat-contacts .sidebar-body .chat-contact-list li.active .avatar,
            .dark-style .app-chat .app-chat-sidebar-left .sidebar-body .chat-contact-list li.active .avatar {
                border-color: #2f3349;
            }

            .dark-style .app-chat .app-chat-history .chat-history-header,
            .dark-style .app-chat .app-chat-history .chat-history-footer {
                background-color: #2f3349;
            }

            .dark-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message .chat-message-text {
                background-color: #2f3349;
                box-shadow: 0 0.125rem 0.25rem rgba(15, 20, 34, 0.4);
            }

            .dark-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right {
                -ms-flex-pack: end;
                justify-content: flex-end;
            }

            .dark-style .app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right .chat-message-text {
                color: #fff;
            }

            .dark-style .app-chat .app-chat-sidebar-right {
                background-color: #2f3349;
            }

            [dir=rtl] .app-chat .app-chat-sidebar-left,
            [dir=rtl] .app-chat .app-chat-contacts {
                right: calc(-21rem - 1rem);
                left: auto;
            }

            [dir=rtl] .app-chat .app-chat-sidebar-left.show,
            [dir=rtl] .app-chat .app-chat-contacts.show {
                left: auto;
                right: 0;
            }

            [dir=rtl] .app-chat .app-chat-sidebar-right {
                left: calc(-21rem - 1rem);
                right: auto;
            }

            [dir=rtl] .app-chat .app-chat-sidebar-right.show {
                left: 0;
                right: auto;
            }

            [dir=rtl] .app-chat .app-chat-history .chat-history-body .chat-history .chat .user-avatar {
                margin-left: 1rem;
                margin-right: 0;
            }

            [dir=rtl] .app-chat .app-chat-history .chat-message:not(.chat-message-right) .chat-message-text {
                border-top-right-radius: 0;
                border-top-left-radius: 0.375rem !important;
            }

            [dir=rtl] .app-chat .app-chat-history .chat-message.chat-message-right .chat-message-text {
                border-top-left-radius: 0;
                border-top-right-radius: 0.375rem !important;
            }
        </style> --}}
