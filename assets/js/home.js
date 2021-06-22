(function ($) {
  //Slider
  new Splide("#home-slider", {
    type: "loop",
    height: "80vh",
    cover: true,
    lazyLoad: "nearby",
  }).mount();
  new Splide("#guestbook-slider", {
    perMove: 1,
    perPage: 2,
    direction: "ttb",
    height: "50vh",
    gap: "1rem",
    autoplay: true,
    rewind: true,
  }).mount();
  //

  $(".test-button").click(function () {
    $.ajax({
      url: "https://api.mews-demo.com/api/distributor/v1/configuration/get",
      data: 
      {
        "Client": "My Client 1.0.0",
        "Ids": ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"],
        "PrimaryId": "942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"
    },
      success: function (data) {
        console.log(data);
      },
    });
  });
})(jQuery);
