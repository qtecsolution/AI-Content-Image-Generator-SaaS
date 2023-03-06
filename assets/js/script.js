
function redirectUrl(url){
    window.location.href = url;
}

// avatar preview

function imageUpload(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview").hide();
            $("#imagePreview").fadeIn(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload").change(function () {
    imageUpload(this);
});

function imageUpload2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview2").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview2").hide();
            $("#imagePreview2").fadeIn(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload2").change(function () {
    imageUpload2(this);
});

function imageUpload3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview3").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview3").hide();
            $("#imagePreview3").fadeIn(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload3").change(function () {
    imageUpload3(this);
});


function imageUploadFIcon(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview_f_icon").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview_f_icon").hide();
            $("#imagePreview_f_icon").fadeIn(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload_f_icon").change(function () {
    imageUploadFIcon(this);
});



//show the modal in this function
function forModal(url, message, header='show') {
    $("#show-modal").modal("show");
    $("#title").text(message);
    $("#show-form").load(url);

    if(header != 'show'){
        $("#modal-header").empty();
        $("#modal-header").removeClass('modal-header');
        $("#show-form").removeClass('modal-body');
    }

    $("body").on("shown.bs.modal", ".modal", function () {
        $(this)
            .find("select")
            .each(function () {
                var dropdownParent = $(document.body);
                if ($(this).parents(".modal.in:first").length !== 0)
                    dropdownParent = $(this).parents(".modal.in:first");
                $(this).select2({
                    dropdownParent: dropdownParent,
                    templateResult: formatState,
                    templateSelection: formatState,
                });
            });
    });
}


function imageUploadPreIcon(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview_pre_icon").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview_pre_icon").hide();
            $("#imagePreview_pre_icon").fadeIn(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload_pre_icon").change(function () {
    imageUploadFIcon(this);
});

function imageUploadFLogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview_f_logo").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview_f_logo").hide();
            $("#imagePreview_f_logo").fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload_f_logo").change(function () {
    imageUploadFLogo(this);
});