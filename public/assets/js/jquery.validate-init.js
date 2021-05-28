(function ($) {
    "use strict"

jQuery("#gopegi-form").validate({
    rules: {
        "fullname": {
            required: true
        },
        "doc_name": {
            required: true,
            extension: "jpg|png"
        },
        "doc_type": {
            required: true
        },
        "gender": {
            required:true,
        },
        "email": {
            required: true,
            email: true
        },
        "address": {
            required: true
        },
        "country": {
            required: !0
        },
        "state": {
            required: !0
        },
        "city": {
            required: !0
        },
        "bsc_address": {
            required: true
        },
    },
    messages: {
        "doc_name": {
            required: "Please select a file!",
            extension: "Just .jpg and .png extension is allowed!"
        },
        "doc_type": "Please select a document type!",
        "gender": "Please select a gender!",
        "fullname": {
            required: "Please enter your fullname!",
        },
        "email": "Please enter a valid email address!",
        "address": "Please enter your full address!",
        "country": "Please enter a vallid country!",
        "state": "Please enter a valid state!",
        "city": "Please enter a valid city!",
        "bsc_address": "Please enter a valid BSC Address!",
    },

    errorClass: "invalid-feedback animated fadeInUp",
    errorPlacement: function(error, element) {
        if(element.attr("name") == "doc_type"){
            error.appendTo('#error-doctype');
        }else if(element.attr("name") == "gender"){
            error.appendTo('#error-gender');
        }else if(element.attr("name") == "doc_name"){
            error.appendTo('#error-docname');
        }else{
            error.insertAfter(element);
        }
        // jQuery(a).parents(".form-group > input").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-control").removeClass("valid").addClass("invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-control").removeClass("is-invalid:focus")
    },
});

})(jQuery);
