(function ($) {
  //Mews
  (function (m, e, w, s) {
    c = m.createElement(e);
    c.onload = function () {
      Mews.D.apply(null, s);
    };
    c.async = 1;
    c.src = w;
    t = m.getElementsByTagName(e)[0];
    t.parentNode.insertBefore(c, t);
  })(document, "script", "https://www.mews.li/distributor/distributor.min.js", [
    ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"],
  ]);

  //Booking Form
  var dateToString = (date) => {
    var dd = date.getDate();
    var mm = date.getMonth() + 1; //January is 0!
    var yyyy = date.getFullYear();
    if (dd < 10) {
      dd = "0" + dd;
    }
    if (mm < 10) {
      mm = "0" + mm;
    }
    return yyyy + "-" + mm + "-" + dd;
  };
  var stringToDate = (string) => {
    var value = string.split("-");
    return new Date(value[0], value[1] - 1, value[2]);
  };

  var editDate = (name, value, type) => {
    return type == "min"
      ? $(`input[name^='${name}']`).attr("min", value)
      : type == "value"
      ? ($(`input[name^='${name}']`).attr("value", value),
        $(`.input_${name}_date`).html(""),
        $(`.input_${name}_date`).html(
          `${stringToDate(value)}`.substring(0, 15)
        ))
      : ($(`input[name^='${name}']`).attr("min", value).attr("value", value),
        $(`.input_${name}_date`).html(""),
        $(`.input_${name}_date`).html(
          `${stringToDate(value)}`.substring(0, 15)
        ));
  };

  var today = new Date();
  editDate("start", dateToString(today));
  var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
  editDate("end", dateToString(tomorrow));

  $("input[name^='start']").change(function () {
    var startDate = stringToDate($(this).val());
    var curEndDate = stringToDate($("input[name^='end']").val());
    var endDate = new Date(startDate.getTime() + 24 * 60 * 60 * 1000);
    editDate("start", dateToString(startDate), "value");
    if (curEndDate <= startDate) {
      editDate("end", dateToString(endDate));
    } else {
      editDate("end", dateToString(endDate), "min");
    }
  });

  $("input[name^='end']").change(function () {
    var endDateValue = stringToDate($(this).val());
    editDate("end", dateToString(endDateValue), "value");
  });

  var editOffer = (value, type, available, description) => {
    return (
      type == "initial"
        ? $(`input[name^='offer']`).attr("value", value)
        : $(`input[name^='offer']`).attr("value", value),
      $(`.input_offer_availability`).css({
        padding: available == false ? "0 1rem" : "",
        borderRadius: available == false ? "1rem" : "",
        backgroundColor: available == false ? "red" : "",
        fontWeight: available == false ? "bold" : "",
      }),
      $(`.input_offer_availability`).html(""),
      $(`.input_offer_availability`).html(
        available == false ? "Code Invalid" : value == "" ? "-" : description
      )
    );
  };

  var offers = [[]];
  var availability = true;

  $("#booking-form").ready(function () {
    var data = {
      action: "load_offer_availability_by_ajax",
      security: blog.security,
      type: "initial",
    };
    $.post(
      blog.ajaxurl,
      data,
      function (response) {
        offers = [...response, ["", ""]];
        var defaultOffer = offers.find((offer) => {
          return offer[2] == "true";
        });
        editOffer(defaultOffer[0], data.type, true, defaultOffer[1]);
        console.log(defaultOffer);
      },
      "json"
    );
  });

  $(".input_offer_apply").click(function () {
    var offerCode = $("input[name^='offer']").val();
    availability = offers.find((offer) => {
      return offer[0] == `${offerCode}`;
    });
    if (availability == undefined) {
      editOffer(offerCode, "", false);
    } else {
      editOffer(offerCode, "", true, availability[1]);
    }
  });

  Mews.Distributor(
    { configurationIds: ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"] },
    function (distributor) {
      $("#booking-page.booking-submit").click(function (e) {
        var start = new Date();
        var end = new Date();
        results = $("#booking-form").serializeArray();
        start = results.find(({ name }) => {
          return name == "start";
        })["value"];
        end = results.find(({ name }) => {
          return name == "end";
        })["value"];
        distributor.setStartDate(stringToDate(start));
        distributor.setEndDate(stringToDate(end));
        coupon = results.find(({ name }) => {
          return name == "offer";
        })["value"];
        if (availability == undefined) {
          distributor.setVoucherCode("");
        } else {
          distributor.setVoucherCode(coupon);
        }
        distributor.open();
        distributor.showRooms();
      });
    }
  );
  //

  // Navbar
  const menu = document.querySelector(".menu-icon");
  const mobileNav = document.querySelector("#menu");
  menu.addEventListener("click", function () {
    mobileNav.classList.toggle("open");
  });
  $(".parent").hover(
    function () {
      $(`#${this.id} > .sub-menu`).css({
        width: $(`#${this.id} > a`).outerWidth(),
      });
      $(`#${this.id} > .sub-menu`).show();
    },
    function () {
      $(".sub-menu").hide();
    }
  );
  //

  //Hide when scroll down
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      $(".header").css({ top: 0 });
    } else {
      $(".header").css({ top: "-100px" });
    }
    prevScrollpos = currentScrollPos;
  };
  //

  // Show Map in Post
  $(".show_map").click(function () {
    const postId = $(this).attr("post-id");
    const map = $(`.post_img[post-id="${postId}"] iframe`);
    map.show();
    $(this).hide();
  });
  //

  // Default Button
  $(".splide .default-button").click(function () {
    window.location = $(this).find("a").attr("href");
    return false;
  });
  //

  // Slider
  new Splide("#room-slider", {
    perPage: 3,
    trimSpace: false,
    perMove: 1,
    gap: "1rem",
    breakpoints: {
      1100: {
        perPage: 2,
      },
      750: {
        perPage: 1,
      },
    },
  }).mount();
  //
})(jQuery);
