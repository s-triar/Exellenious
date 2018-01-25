  /* ///////////////////////////////////////////////////////////////////// 
      // 01 - Login/Register Form 
      /////////////////////////////////////////////////////////////////////*/

  $(".form-group").find("input, select").on("keyup blur focus click", function (e) {
      var $this = $(this),
          label = $this.prev("label");
      if ($(".form-group").find('input').val() === null) {
          label.removeClass("active highlight");
      } else {
          label.addClass("active highlight");
      }
      if (e.type === "keyup") {
          if ($this.val() === "") {
              label.removeClass("active highlight");
          } else {
              label.addClass("active highlight");
          }
      } else if (e.type === "click") {
          if ($this.val() === "") {
              label.addClass("active highlight");
          } else {
              label.addClass("active highlight");
          }
      } else if (e.type === "blur") {
          if ($this.val() === "") {
              label.removeClass("active highlight");
          } else {
              label.removeClass("highlight");
          }
      } else if (e.type === "focus") {
          if ($this.val() === "") {
              label.removeClass("highlight");
          } else if ($this.val() !== "") {
              label.addClass("highlight");
          }
      }
  });

    // $("#signup").validate({
    //     rules: {
    //         name: "required",
    //         email: {
    //             required: true,
    //             email: true
    //         }
    //     },
    //     messages: {
    //         name: "Please specify your name",
    //         email: {
    //             required: "We need your email address to contact you",
    //             email: "Your email address must be in the format of name@domain.com"
    //         }
    //     },
    //     submitHandler: function (form) {
        //   //   $.ajax({
        //   //       dataType: "jsonp",
        //   //       url: "http://getsimpleform.com/messages/ajax?form_api_token=<api-token>",
        //   //       data: $(".ajax-form").serialize()
        //   //   }).done(function () {
        //   //       //callback which can be used to show a thank you message
        //   //       //and reset the form
        //   //       $(".ajax-form").hide();
        //   //       $(".form-thank-you").fadeIn("400");
        //   //   });
        //     return false; //to stop the form from submitting
    //     }
    // });