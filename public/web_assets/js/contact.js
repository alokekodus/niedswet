toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on(
            "input keydown keyup mousedown mouseup select contextmenu drop",
            function () {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(
                        this.oldSelectionStart,
                        this.oldSelectionEnd
                    );
                }
            }
        );
    };
})(jQuery);

$("#phone").inputFilter(function (value) {
    return (
        /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999)
    );
});

$("#contactForm").validate({
    rules: {
        fname: "required",
        lname: "required",
        phone: "required",
        email: "required",
        message: "required",
    },
    messages: {
        fname: "Please enter first name",
        lname: "Please enter last name",
        phone: "Please enter phone number",
        email: "Please enter email address",
        message: "Please enter your message",
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
        // Add the `invalid-feedback` class to the error element
        error.addClass("invalid-feedback");
        error.insertAfter(element);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
    },
    submitHandler: function (form, e) {
        e.preventDefault();
        $("#submitBtn").text("Sending...");
        $("#submitBtn").attr("disabled", true);
        let data = new FormData(form);
        let url = "contact";
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: url,
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status === 200) {
                    $("#submitBtn").text("Send");
                    $("#submitBtn").attr("disabled", false);
                    $("#contactForm")[0].reset();
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: data.message,
                    });
                } else {
                    $("#submitBtn").text("Send");
                    $("#submitBtn").attr("disabled", false);
                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text: data.message,
                    });
                }
            },
        });
    },
});
