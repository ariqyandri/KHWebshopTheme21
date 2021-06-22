<div id="qv_hubspot_modal">
	<div class="qv_overlay"></div>
	<div class="qv_wrapper">
		<div class="qv_main">
			<a href="#" id="qv_close" class="qv_close">    
				<i class="fas fa-times"></i>
			</a>
			<div id="qv_content" >
        <?php $loopb = new WP_Query( array( 'post_type' =>
        'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
        'slug', 'terms' => "hubspot", ) ) ) ); while ( $loopb->have_posts() ) : $loopb->the_post();

          get_template_part('template-parts/post','post');

        endwhile;
        wp_reset_postdata();?>
      </div>
		</div>
	</div>
</div>

<script>
(function ($) {
  //Hubspot Modal
  var qv_modal = $("#qv_hubspot_modal"),
    qv_overlay = qv_modal.find(".qv_overlay"),
    qv_content = qv_modal.find("#qv_content"),
    qv_close = qv_modal.find("#qv_close"),
    qv_wrapper = qv_modal.find(".qv_wrapper"),
    qv_wrapper_w = qv_wrapper.width(),
    qv_wrapper_h = qv_wrapper.height(),
    center_modal = function () {
      var window_w = $(window).width(),
        window_h = $(window).height(),
        width = window_w - 60 > qv_wrapper_w ? qv_wrapper_w : window_w - 60,
        height = window_h - 120 > qv_wrapper_h ? qv_wrapper_h : window_h - 120;
      qv_wrapper.css({
        left: window_w / 2 - width / 2,
        top: window_h / 2 - height / 2,
      });
    };

  var close_modal_qv = function () {
    // Close box by click overlay
    qv_overlay.on("click", function (e) {
      close_qv();
    });
    // Close box with esc key
    $(document).keyup(function (e) {
      if (e.keyCode === 27) close_qv();
    });
    // Close box by click close button
    qv_close.on("click", function (e) {
      e.preventDefault();
      close_qv();
    });
    //

    var close_qv = function () {
      qv_modal.removeClass("open");
      qv_modal.find(".qv_main").removeClass("show");
    };
  };

  close_modal_qv();

  var openHubspot = function () {
    qv_modal.addClass("open");
    qv_modal.find(".qv_main").addClass("show");
    //https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_element_iframe
    var iframe = document.getElementById("hs-form-iframe-0");
    var elmnt = iframe.contentWindow.document.querySelector(".hubspot-link__container.sproket");
    elmnt.style.display = "none";  
  }
  
  //Hubspot load
  $(document).ready(function () {
    window.setTimeout(function () {
      if (window.localStorage) {
        // Get the expiration date of the previous popup.
        var nextPopup = localStorage.getItem("PopUpp");
        var now = new Date();
        now = now.setHours(now.getHours());
        if (nextPopup > now) {
          return;
        }
        // Store the expiration date of the current popup in localStorage.
        var expires = new Date();
        expires = expires.setHours(expires.getHours() + 2);
        localStorage.setItem("PopUpp", expires);
      }
      openHubspot()
      }, 2000);
  });
  //


  $(".hubspotModalOpen").click(function () {
    openHubspot()
  });
  
})(jQuery);
</script>