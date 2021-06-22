<form id="booking-form" class="booking-<?php echo get_post_type( );?>">
    <div class="input_start">
        <label for="start">Start Date</label>
        <div class="input_box">
            <input type="date" id="start" name="start" >
        </div>
        <p class="input_start_date"></p>
    </div>
    <div class="input_end">
        <label for="end">End Date</label>
        <div class="input_box">
            <input type="date" id="end" name="end">
        </div>
        <p class="input_end_date"></p>
    </div>
    <div class="input_offer">
        <label for="offer">Offer Code</label>
        <div class="input_box">
            <input type="text" id="offer" name="offer">
            <button type="button" class="input_offer_apply default-button">Apply</button>
        </div>
        <p class="input_offer_availability"></p>
    </div>
    <div class="input_button">
        <button type="button" class="booking-submit book-button" id="booking-<?php echo get_post_type( );?>">BOOK NOW</button>        <p>*- If offer code is Invalid or not input, it will not apply to your booking</p>
    </div>
</form>
