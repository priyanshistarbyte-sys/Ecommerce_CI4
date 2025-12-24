<div>
    <div class="products">
        <div class="product-list">
            <?php
            if (count(@$products)) {
                foreach ($products as $key => $product_details) {
            ?>
                    <a href="<?= base_url("product/" . md5(@$product_details['id']));  ?>" class="product-card">
                        <!-- <div class="product-img" style="background-image:url('<?= @$product_details['img1'] ?>')"></div> -->
                        <div class="product-img">
                            <img src="" alt="" loading="lazy" class="custom_lazyload" decoding="async" data-original="<?= @$product_details['img1'] ?>">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><?= @$product_details['name']; ?></h3>
                            <div class="product-price">
                                <span class="sell-price">₹<?= @$product_details['selling_price']; ?></span>
                                <span class="mrp-price line-through">₹<?= @$product_details['mrp'] ?></span>
                                <?php
                                @$product_details['mrp'] = (intval(@$product_details['mrp']) > 0) ? @$product_details['mrp'] : 999;
                                $remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp']);
                                $offer_percentage = round(100 - $remain_percentage);
                                ?>
                                <span class="off-percentage m-0"><?= @$offer_percentage; ?>% off</span>
                            </div>

                            <span class="NewProductCardstyled__OfferPill-sc-6y2tys-31 iMEkWH"><svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="12" class="sc-bcXHqe eqGISc">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6A6 6 0 1 1 0 6a6 6 0 0 1 12 0ZM5.168 9.008l.8.17L3.554 6.49l-.005-.75h1.298c.383 0 .687-.076.91-.228.225-.152.375-.352.45-.6h-2.76l.261-.892h2.478c-.167-.507-.62-.76-1.36-.76h-1.38l.277-1h4.834l-.262.897H7.176c.174.245.287.533.338.863h1.037l-.257.891H7.52c-.076.54-.301.952-.678 1.238-.376.286-.908.457-1.596.512L6.88 8.493l.064-.826a.41.41 0 0 1 .437-.375.403.403 0 0 1 .373.436L7.59 9.88l-.004.012-.004.013a.42.42 0 0 1-.03.104l-.001.005a.263.263 0 0 1-.017.037.288.288 0 0 1-.011.031c-.018.026-.039.045-.06.065a.07.07 0 0 0-.006.008c-.004.004-.007.009-.013.012a.433.433 0 0 1-.12.068.417.417 0 0 1-.155.023c-.005.002-.01.003-.015.002-.019-.002-.037-.006-.054-.01l-2.102-.445a.407.407 0 0 1 .17-.797Z" fill="#219653"></path>
                                </svg><span font-size="10px" font-weight="demi" color="greenBase" class="sc-gswNZR bjrKWS">₹<?= rand(999, 4999); ?> with <?= rand(1, 3); ?> Special Offers</span></span>
                            <p class="free-delivery">Free Delivery</p>

                            <div class="sc-kDvujY jTuxux NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA" color="white">
                                <div class="NewProductCardstyled__RatingSection-sc-6y2tys-9 fyvrGC"><span label="4.3" class="sc-fbYMXx jUvjLH"><span font-size="13px" font-weight="demi" color="#ffffff" class="sc-gswNZR jrrvJf"><?= number_format(mt_rand(40, 50) / 10, 1); ?></span><svg width="8" height="8" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" ml="4" iconSize="10" class="sc-bcXHqe cyUZOu">
                                            <g clip-path="url(#clip0)">
                                                <path d="M19.5399 6.85L13.6199 5.5L10.5099 0.29C10.3999 0.11 10.2099 0 9.99993 0C9.78993 0 9.59993 0.11 9.48993 0.29L6.37993 5.5L0.45993 6.85C0.25993 6.9 0.0899297 7.05 0.0299297 7.25C-0.0300703 7.45 0.00992969 7.67 0.14993 7.83L4.13993 12.4L3.58993 18.44C3.56993 18.65 3.65993 18.85 3.82993 18.98C3.99993 19.1 4.21993 19.13 4.41993 19.05L9.99993 16.64L15.5799 19.03C15.6599 19.06 15.7399 19.08 15.8099 19.08C15.8099 19.08 15.8099 19.08 15.8199 19.08C16.1199 19.09 16.4199 18.82 16.4199 18.48C16.4199 18.42 16.4099 18.36 16.3899 18.31L15.8499 12.38L19.8399 7.81C19.9799 7.65 20.0199 7.43 19.9599 7.23C19.9099 7.04 19.7399 6.89 19.5399 6.85Z" fill="#ffffff"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="20" height="19.08" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></span><span font-size="11px" font-weight="book" color="greyT2" class="sc-gswNZR gTFgDk NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI">(<?= rand(1000, 5454); ?>)</span></div>
                                         <svg width="55" height="20" viewBox="0 0 80 20" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Background -->
                                    <rect width="80" height="20" rx="10" fill="#FFF2E8"/>
                                    <!-- Centered Text -->
                                    <text x="40" y="14"
                                            text-anchor="middle"
                                            font-family="Inter, Arial, sans-serif"
                                            font-size="11"
                                            font-weight="600"
                                            fill="#E67E22">
                                        W Trusted
                                    </text>
                                    </svg>
                            </div>
                        </div>
                    </a>
                <?php }
            } else { ?>
                <center class="w-100" style="margin-top: 40vh;">
                    <h1>No Products Found!!!</h1>
                </center>
            <?php }  ?>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var hours = 3;
        var minutes = 30;
        var seconds = 0;

        function countdown() {
            if (seconds > 0) {
                seconds--;
            } else {
                if (minutes > 0) {
                    minutes--;
                    seconds = 59;
                } else {
                    if (hours > 0) {
                        hours--;
                        minutes = 59;
                        seconds = 59;
                    } else {
                        clearInterval(interval);
                        alert('Countdown finished!');
                    }
                }
            }

            // Format numbers to always have 2 digits
            var formattedHours = String(hours).padStart(2, '0');
            var formattedMinutes = String(minutes).padStart(2, '0');
            var formattedSeconds = String(seconds).padStart(2, '0');

            // Update the countdown display
            // $('#countdown').text(formattedHours + ':' + formattedMinutes + ':' + formattedSeconds);
            if (formattedHours != 0 && formattedMinutes != 0 && formattedSeconds != 0) {

                $(".js-timer-hours").text(formattedHours);
                $(".js-timer-minutes").text(formattedMinutes);
                $(".js-timer-seconds").text(formattedSeconds);
            }
        }
        // Initial call
        countdown();
        // Set interval to call countdown every 1000 milliseconds (1 second)
        var interval = setInterval(countdown, 1000);
    })
</script>