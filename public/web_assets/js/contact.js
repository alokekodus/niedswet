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
        $('#submitBtn').text('Sending...');
        $('#submitBtn').attr('disabled', true);
        let data = new FormData();
        let url = "contact";
        console.log(url);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            cache: false,
            dataType: "json",
            method: "post",
            url: url,
            data: data,
            processData: false,
            success: function (data) {
                if (data.result === 1) {
                    $('#submitBtn').text('Send');
                    $('#submitBtn').attr('disabled', false);
                    $("#contactForm")[0].reset();
                    toastr[data.status](data.message);
                } else {
                    $('#submitBtn').text('Send');
                    $('#submitBtn').attr('disabled', false);
                    toastr[data.status](data.message);
                }
            },
        });
    },
});
