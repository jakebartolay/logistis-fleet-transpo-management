@extends('layouts/layoutMaster')

@section('title', 'Chat')

{{-- @section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
@endsection --}}

@section('page-script')
    <script src="{{ asset('assets/js/app-chat.js') }}"></script>
@endsection

@section('content')
    <!-- Contacts -->
    <ul class="list-unstyled chat-contact-list mb-0" id="contact-list">
        <li class="chat-contact-list-item chat-contact-list-item-title">
            <h5 class="text-primary mb-0">Contacts</h5>
        </li>
        <li class="chat-contact-list-item contact-list-item-0 d-none">
            <h6 class="text-muted mb-0">No Contacts Found</h6>
        </li>
        @foreach ($activeUsers as $list)
            @if ($list->id !== auth()->id())
                <li class="chat-contact-list-item"
                    style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <a class="d-flex align-items-center" href="{{ url('admin/chat/' . $list->id) }}">
                        <div class="flex-shrink-0 avatar">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                class="rounded-circle">
                        </div>
                        <div class="chat-contact-info flex-grow-1 ms-2">
                            <h6 class="chat-contact-name text-truncate m-0">{{ $list->firstname }} {{ $list->lastname }}
                            </h6>
                            <h3 class="m-0" style="font-size: smaller;">{{ $list->role }}</h3>
                        </div>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
    </div>
    </div>
    <!-- /Chat contacts -->
    <!-- Chat History -->
    <div class="col app-chat-history bg-body"
        style="padding: 20px; border-left: 1px solid #ccc; overflow-y: auto; max-height: 500px;">
        <div class="chat-history-wrapper">
            <div class="chat-history-header border-bottom" style="padding-bottom: 10px; margin-bottom: 20px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex overflow-hidden align-items-center">
                        <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2" data-bs-toggle="sidebar"
                            data-overlay data-target="#app-chat-contacts"></i>
                        <div class="flex-shrink-0 avatar">
                            <img src="{{ Auth::user()->profile_photo_url }}"alt="{{ Auth::user()->name }}"
                                class="rounded-circle" data-bs-toggle="sidebar" data-overlay
                                data-target="#app-chat-sidebar-right">
                        </div>
                        <div class="chat-contact-info flex-grow-1 ms-2">
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $urlParts = explode('/', $url);
                            $id = end($urlParts);
                            
                            $receiver = App\Models\User::find($id);
                            
                            if ($receiver) {
                                echo '<h6 class="m-0">' . $receiver->firstname . ' ' . $receiver->lastname . '</h6>';
                                echo '<h3 class="m-0" style="font-size: smaller;">' . $receiver->role . '</h3>';
                            } else {
                                echo '<h6 class="m-0">User not found</h6>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat-history-body bg-body" style="padding: 10px;">
                <ul class="list-unstyled chat-history">
                </ul>
            </div>
            <!-- Chat message form -->
            <div class="chat-history-footer shadow-sm" style="padding-top: 20px;">
                <form class="form-send-message d-flex justify-content-between align-items-center">
                    <input type="hidden" id="receiver_id" value="{{ $receiverId }}">
                    <input type="hidden" id="sender_id" value="{{ $loggedInUserId }}">
                    <input class="form-control message-input border-0 me-3 shadow-none" placeholder="Type your message here"
                        style="flex-grow: 1; border-radius: 20px; padding: 10px; min-width: 0;">
                    <div class="message-actions d-flex align-items-center">
                        <button type="button" class="btn btn-primary d-flex send-msg-btn"
                            style="border-radius: 20px; padding: 5px 15px;">
                            <i class="ti ti-send me-md-1 me-0"></i>
                            <span class="align-middle d-md-inline-block d-none">Send</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Chat History -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var messageInterval;

            function formatDate(timestamp) {
                var date = new Date(timestamp);
                var options = {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    hour12: true
                };
                return date.toLocaleDateString('en-US', options);
            }

            function getMessages() {
                var receiverId = $('#receiver_id').val();
                var senderId = $('#sender_id').val();

                $.ajax({
                    url: "https://mesph.online/chat/get_chat.php",
                    method: "POST",
                    data: {
                        sender_id: senderId,
                        receiver_id: receiverId,
                        _token: "JEpVjIjwApzzqbuLs9WhmfzPYUeHC4yp6unEx9Rn"
                    },
                    success: function(response) {
                        var messages = response.messages;
                        var chatHistory = $('.chat-history');

                        chatHistory.empty();

                        $.each(messages, function(index, message) {
                            var messageClass = message.SenderID == senderId ?
                                'chat-message-right' : 'chat-message-left';
                            var messageAlignment = message.SenderID == senderId ? 'text-end' :
                                'text-start';

                            var messageItem = '<li class="chat-message ' + messageClass + '">' +
                                '<div class="d-flex overflow-hidden">' +
                                '<div class="user-avatar flex-shrink-0 ' + (message.SenderID ==
                                    senderId ? 'ms-3' : 'me-3') + '">' +
                                '<div class="avatar avatar-sm">' +
                                '</div>' +
                                '</div>' +
                                '<div class="chat-message-wrapper flex-grow-1">' +
                                '<div class="chat-message-text ' + messageAlignment + '">' +
                                '<p class="mb-0">' + message.MessageContent + '</p>' +
                                '</div>' +
                                '<div class="text-muted mt-1">' +
                                '<small>' + formatDate(message.created_at) + '</small>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</li>';

                            chatHistory.append(messageItem);
                        });

                        clearInterval(messageInterval);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            getMessages();

            messageInterval = setInterval(getMessages, 1000);

            $('.send-msg-btn').click(function(e) {
                e.preventDefault();

                var messageContent = $('.message-input').val();
                var senderId = $('#sender_id').val();
                var receiverId = $('#receiver_id').val();

                $.ajax({
                    url: "https://mesph.online/chat/send_chat.php",
                    method: "POST",
                    data: {
                        sender_id: senderId,
                        receiver_id: receiverId,
                        message_content: messageContent,
                        _token: "JEpVjIjwApzzqbuLs9WhmfzPYUeHC4yp6unEx9Rn"
                    },
                    success: function(response) {
                        $('.message-input').val('');

                        getMessages();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.message-input').keypress(function(event) {
                if (event.which === 13) {
                    event.preventDefault();

                    $('.send-msg-btn').click();
                }
            });

            function updateChatHistory() {
                var url = window.location.href;

                if (/\/chat\/1\/?$/.test(url)) {
                    $('.app-chat-history').addClass('d-none');
                } else {
                    $('.app-chat-history').removeClass('d-none');
                }
            }

            updateChatHistory();

            $(window).on('hashchange', function() {
                updateChatHistory();
            });
        });
    </script>

@endsection
