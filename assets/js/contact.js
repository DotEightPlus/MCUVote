$(document).ready(function () {
  (function ($) {
    "use strict";

    jQuery.validator.addMethod(
      "answercheck",
      function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value);
      },
      "type the correct answer -_-"
    );

    // validate contactForm form
    $(function () {
      $("#contactForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 2,
          },
          subject: {
            required: true,
            minlength: 4,
          },
          deptr: {
            required: true,
            minlength: 5,
          },
          email: {
            required: true,
            email: true,
          },
          matric: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "come on, you have a name, don't you?",
            minlength: "your name must consist of at least 2 characters",
          },
          subject: {
            required: "come on, you have a subject, don't you?",
            minlength: "your subject must consist of at least 4 characters",
          },
          deptr: {
            required: "A department is necessary.",
            minlength: "May I have your department name in full please?",
          },
          email: {
            required: "You`ve got have an email, right?",
          },
          matric: {
            required: "No matric? really?",
            minlength: "thats all? really?",
          },
        },
        submitHandler: function (form) {
          $(form).ajaxSubmit({
            type: "POST",
            data: $(form).serialize(),
            url: "functions/init.php",
            success: function (data) {
              $("#msg").html(data);
            },
          });
          $("#exampleModalCenter").modal();
        },
      });
    });
  })(jQuery);
});
