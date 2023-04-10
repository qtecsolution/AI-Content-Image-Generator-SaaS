@extends('layouts.app')
@section('title', 'Chat with AI')
@section('breadcrumb')
<li class="breadcrumb-item active">Chat with AI</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <section class="my-projects">
        <div class="my-projects-header border-bottom">
            <h4 class="header-title">Chat with AI</h4>
        </div>
        <div class="my-projects-body">
            <div class="row">

                <div class="col-12">
                    <div class="msger ">

                       

                        <div class="msger-chat">



                            <div class="msg left-msg ">
                                <div class="msg-img ">
                                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                        alt="">
                                </div>
                                <div class="msg-bubble">

                                    <!-- loader  -->
                                    <div class="d-none">
                                        <div class="fb-chat">
                                            <div class="fb-chat--bubbles">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- chat content  -->
                                    <div class="">
                                        <div class="msg-info d-none">
                                            <div class="msg-info-name">BOT</div>
                                            <div class="msg-info-time">12:45</div>
                                        </div>
                                        <div class="msg-text">
                                            Hi , Welcome to Chatgpt ! Go ahead and send me a message
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="msg right-msg">
                                <div class="msg-img">
                                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                        alt="">
                                </div>
                                <div class="msg-bubble">
                                    <div class="msg-info">
                                        <div class="msg-info-name">Kawsar</div>
                                        <div class="msg-info-time">12:45</div>
                                    </div>
                                    <div class="msg-text">
                                        Hi , Welcome to Chatgpt ! Go ahead and send me a message
                                    </div>
                                </div>
                            </div>
                            <div class="msg left-msg">
                                <div class="msg-img">
                                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                        alt="">
                                </div>
                                <div class="msg-bubble">
                                    <div class="msg-info">
                                        <div class="msg-info-name">BOT</div>
                                        <div class="msg-info-time">12:45</div>
                                    </div>
                                    <div class="msg-text">
                                        Hi , Welcome to Chatgpt ! Go ahead and send me a message
                                    </div>
                                </div>
                            </div>

                        </div>

                        <form class="msger-inputarea">
                            <input type="text" class="msger-input" placeholder="Enter your message...">
                            <button type="submit" class="msger-send-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-send" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </button>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>
</div>
@endsection
@section('script')
<script>
function contentSave() {
    let description = $('#description').val();
    $('#save-title').val(description.slice(0, 200));
    $('#save-description').val(description);
    $('form#save-form').submit();
}
$(document).ready(function() {
    // Submit form
    $("form#input-form").submit(function(event) {
        event.preventDefault();
        contentGenerate()
    });
});

function contentGenerate() {
    $('#openai-error').hide();
    let description = $('#description').val();

    $('#content-generate-preloader').show();

    $.ajax({
        type: 'POST',
        url: "{{ route('code.generate') }}",
        data: {
            description,
        },
        success: function(data) {
            let formatted_text = nl2br(data.content);
            $('#summernote').summernote('code', formatted_text);
            $('#content-generate-preloader').hide();
            $('#words-count').html(data.words);
            $('#charecters-count').html(data.characters);
            $('#content-control').show();
            $('.content-regenerate').show();
            $('.content-generate-preloader').hide();
            console.log(data);
        },
        error: function(msg) {
            $('#content-generate-preloader').hide();
            $('#content-control').hide();
            var errors = msg.responseJSON;
            $('#openai-error').show();
            $('#openai-error span').html(errors?.error);
            console.log(errors)
        }
    });
}

// Regenerate content
function regenerate() {

    let title = $('#title').val();
    if (title != '') {
        $('.content-regenerate').hide();
        $('.content-generate-preloader').show();
        $("form#input-form").submit();
    }
}
// Document Copy
function copyText() {
    // Copy content to clipboard
    var textToCopy = $('#summernote').summernote('code');
    textToCopy = textToCopy.replace("<!-- default value -->", "");
    var $temp = $('<input>');
    $('body').append($temp);
    $temp.val(textToCopy).select();
    document.execCommand('copy');
    $temp.remove();

    // Change copy button tooltip
    $('.copy-button').attr('data-bs-original-title', 'Content Copied!');
    $('.copy-button').tooltip('show');
    setTimeout(function() {
        $('.copy-button').attr('data-bs-original-title', 'Copy to clipboard');
        $('.copy-button').tooltip('hide');
    }, 1000);
}

function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}


// Summernote (Texteditor) Script
$(document).ready(function() {
    $('#summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'list']],
            ['color', ['forecolor']],
            ['height', ['height']]
        ],
        colorNames: {
            'red': '#ff0000',
            'green': '#00ff00',
            'blue': '#0000ff'
        }
    });

    // these code for fixing some style in editor 
    var styleEle = $("style#fixed");
    if (styleEle.length == 0)
        $(
            "<style id=\"fixed\">.note-editor .dropdown-toggle::after { all: unset; } .note-editor .note-dropdown-menu { box-sizing: content-box; } .note-editor .note-modal-footer { box-sizing: content-box; }</style>"
        )
        .prependTo("body");
})


// message 
const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");

const BOT_MSGS = [
    "Hi, how are you?",
    "Ohh... I can't understand what you trying to say. Sorry!",
    "I like to play games... But I don't know how to play!",
    "Sorry if my answers are not relevant. :))",
    "I feel sleepy! :("
];

// Icons made by Freepik from www.flaticon.com
const BOT_IMG = "https://cdn.pixabay.com/photo/2023/03/15/12/07/ai-generated-7854427__340.jpg";
const PERSON_IMG =
    "https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60";
const BOT_NAME = "BOT";
const PERSON_NAME = "Sajad";

msgerForm.addEventListener("submit", event => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
    msgerInput.value = "";

    botResponse();
});

function appendMessage(name, img, side, text) {
    //   Simple solution for small apps
    const msgHTML = `
    <div class="msg ${side}-msg">
    <div class="msg-img">
        <img src="${img}"
                                        alt="">
     </div>
      

      <div class="msg-bubble">
        <div>
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
        </div>
      </div>
    </div>
  `;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 500;
}

function botResponse() {
    const r = random(0, BOT_MSGS.length - 1);
    const msgText = BOT_MSGS[r];
    const delay = msgText.split(" ").length * 100;

    setTimeout(() => {
        appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
    }, delay);
}

// Utils
function get(selector, root = document) {
    return root.querySelector(selector);
}

function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${h.slice(-2)}:${m.slice(-2)}`;
}

function random(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}
</script>
@endsection