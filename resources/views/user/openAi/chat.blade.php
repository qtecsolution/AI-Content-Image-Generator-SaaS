@extends('layouts.app')
@section('title', 'Chat with AI')
@section('breadcrumb')
    <li class="breadcrumb-item active">Chat with AI</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">
            <div class="my-projects-header border-bottom d-none">
                <h4 class="header-title">Chat with AI</h4>
            </div>
            <div class="my-projects-body">
                <div class="row">
                    <div class="col-12">
                        <div class="msger">
                            <div class="msger-chat" id="conversations">
                                @foreach($chatHistory as $history)
                                <div class="msg right-msg">
                                    <div class="msg-img">
                                        <img src="{{ filePath(Auth::user()->avatar) }}" alt="">
                                    </div>
                                    <div class="msg-bubble">
                                        <div class="msg-text">
                                            {{$history->chat_request}}
                                        </div>
                                    </div>
                                </div>
                                <div class="msg left-msg">
                                    <div class="msg-img ">
                                        <img src="{{ asset('assets/images/chat-gpt.png') }}" alt="">
                                    </div>
                                    <div class="msg-bubble">
                                        <div class="msg-text">
                                            {{$history->chat_response}}
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                            </div>
                            @if(showBalance()->chat_enabled==1)
                            <form class="msger-inputarea" onsubmit="requestForResponse(event)">
                                <textarea id="myTextarea" class="msger-input" rows="1" placeholder="Enter your message..."></textarea>
                                <button type="submit" class="msger-send-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                    </svg>
                                </button>
                            </form>
                            @else
                                <div class="col-md-12">
                                    <p class="text-danger">
                                        <small> You should upgrade your subscription plan for access chat feature. <a href="{{route('user.purchase')}}"> Click here </a> </small>
                                    </p>
                                </div>
                                <div class="msger-inputarea">
                                    <textarea class="msger-input" rows="1" disabled placeholder="Enter your message..."></textarea>
                                    <button type="submit" class="msger-send-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                            <path
                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <p class="text-danger" id="openai-error" style="display: none">
                                    <small> Don't worry, you can contact with admin. </small>
                                    <br>
                                    <small> <b>Error:</b> <span></span> </small>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        const msgerForm = get(".msger-inputarea");
        const msgerInput = get(".msger-input");
        const msgerChat = get(".msger-chat");
        const textarea = document.getElementById("myTextarea");
        // scroll to last chat
        const div = document.getElementById("conversations");
        const lastElement = div.lastElementChild;
        if(lastElement != null){
            div.scrollTop = lastElement.offsetTop;
        }
        // if press enter + shift
        textarea.addEventListener("keydown", (event) => {
        if (event.keyCode === 13 && event.shiftKey) {
            // Increment textarea rows
            textarea.rows += 1;
            // Move cursor to next line
            const startPos = textarea.selectionStart;
            const endPos = textarea.selectionEnd;
            const currentValue = textarea.value;
            textarea.value = currentValue.substring(0, startPos) + "\n" + currentValue.substring(endPos);
            textarea.selectionStart = startPos + 1;
            textarea.selectionEnd = startPos + 1;
            event.preventDefault();
        }
        });
        // if press only enter
        textarea.addEventListener("keyup", (event) => {
            if (event.keyCode === 13 && !event.shiftKey) {
                // Submit form
                requestForResponse(event)
            }
        });
        // Icon links
        const BOT_IMG = "{{ asset('assets/images/chat-gpt.png') }}";
        const PERSON_IMG = "{{ filePath(Auth::user()->avatar) }}";

       function requestForResponse(event){
            event.preventDefault();
            $('#openai-error').hide();

            const msgText = msgerInput.value;
            if (!msgText) return;

            appendMessage(PERSON_IMG, "right", msgText);
            appendMessage(BOT_IMG, "left", "", true);
            $.ajax({
                type: 'POST',
                url: "{{ route('chat.response') }}",
                data: {
                    description: msgerInput.value,
                },
                success: function(data) {
                    replaceWithText(data.content)
                    console.log(data);
                },
                error: function(msg) {
                    var errors = msg.responseJSON;
                    $('#openai-error').show();
                    $('#openai-error span').html(errors?.error);
                    console.log(errors)
                }
            });
            msgerInput.value = "";
            textarea.rows = 1;
        }

        msgerForm.addEventListener("submit", event => {
            requestForResponse(event)
        });

        function appendMessage(img, side, text, bubble = false) {
            //   Simple solution for small apps
            const msgHTML = `
                <div class="msg ${side}-msg">
                    <div class="msg-img">
                        <img src="${img}" alt="">
                    </div>

                    <div class="msg-bubble ${bubble?'loader-div':''}">
                        ${bubble
                            ?`<div class="fb-chat">
                                    <div class="fb-chat--bubbles">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>`
                            :`<div>
                                    <div class="msg-text">${text}</div>
                                </div>`}
                    </div>
                </div>`;

            msgerChat.insertAdjacentHTML("beforeend", msgHTML);
            msgerChat.scrollTop += 500;
        }

        function replaceWithText(text) {
            var lastElement = $('div.loader-div');
            lastElement.html(`<div> <div class="msg-text">${text}</div> </div>`);
            lastElement.removeClass('loader-div');
            msgerChat.scrollTop += 500;

        }


        // Utils
        function get(selector, root = document) {
            return root.querySelector(selector);
        }
    </script>
@endsection
