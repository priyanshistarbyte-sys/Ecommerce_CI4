                </div>
                </div>
                </div>
                </div>
                </div>

                <div id="mySidenav" class="sidenav">
                    <div class="sidenav-div">
                        <div class="drawer__title">
                            <!-- <img src="<?= base_url("assets/website/images/flikart-icon.png"); ?>" class="_31Y9yB logo-icon" style="width:auto;height:30px;"> -->
                            <h3 class="ui2-heading"><span><b>Your Cart</b></span></h3>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        </div>
                    </div>
                    <div class="cart-products-list">
                        <!-- <div class="cart-product">
                            <div class="cart-product-img">
                                <img src="https://cdn.shopify.com/s/files/1/0057/8938/4802/files/A161PP.386_160x.png?v=1698400100" alt="">
                            </div>
                            <div class="cart-product-details">
                                <div class="cart-product-title">
                                    <p>boAt Airdopes 141</p>
                                    <a href="#">
                                        <img src="https://cdn.shopify.com/s/files/1/0057/8938/4802/files/Group_1_93145e45-8530-46aa-9fb8-6768cc3d80d2.png?v=1633783107" class="remove-cart-item" alt="">
                                    </a>
                                </div>
                                <div class="cart-product-pricing">
                                    <p class="cart-product-price">₹329.00</p>&nbsp;
                                    <span class="cart-product-mrp">₹329.00</span>
                                </div>
                                <div class="cart-product-description">
                                    <p class="cart-product-color">Color</p>
                                    <div class="cart-qty-wrapper">
                                        <span class="minus">-</span>
                                        <span class="num">01</span>
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="cart__footer">
                        <div class="cart__price__details">
                            <div class="cart__breakup__inner">
                                <div class="cart__total">
                                    <span class="">Cart Total:</span>
                                    <span class="cartTotalAmount">₹00.00</span>
                                </div>
                                <div class="shipping__total" style="border-bottom: 1px dashed #000;">
                                    <span class="">Shipping:</span>
                                    <span class="">FREE</span>
                                </div>
                                <div class="mc_pay__total">
                                    <span class="">To Pay:</span>
                                    <span class="cartTotalAmount">₹00.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="cart__checkout">
                            <div class="cart__final__payment">
                                <h2 class="cart__final__price cartTotalAmount">₹00.00</h2>
                                <p class="cart__tax__text">Inclusive of all taxes</p>
                            </div>
                            <a href="<?= base_url("cart"); ?>" class="btn btn-dark cart__confirm__order">Confirm Order</a>
                        </div>
                    </div>
                </div>

             

                </footer>

                <script src="<?= base_url();  ?>assets/website/js/bootstrap.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>

                <script>
                    $(window).ready(function() {
                        $(".itivvW").remove();
                    });
                    //  Cart Start ==================
                    $(".custom_lazyload")
                        .lazyload({
                            effect: "fadeIn",
                            threshold: 5000,
                        })
                        .removeClass("custom_lazyload");

                    function openNav() {
                        document.getElementById("mySidenav").style.right = "0";
                        document.getElementById("overlay").style.display = "block";
                    }

                    function closeNav() {
                        document.getElementById("mySidenav").style.right = "-100%";
                        document.getElementById("overlay").style.display = "none";
                    }

                    function CartList() {
                        cart_html = "";
                        products = [];
                        cartTotalAmount = 0;

                        if (localStorage.getItem('products')) {
                            products = JSON.parse(localStorage.getItem('products'));
                        }
                        if (products.length > 0) {
                            for (index = 0; index < products.length; index++) {

                                qty = products[index]['qty'];
                                cartTotalAmount += (products[index]['price'] * qty);

                                product_qty = qty < 10 ? "0" + qty : qty;
                                cart_html += '<div class="cart-product cart-product-index-' + products[index]['index'] + '">\
                                    <div class="cart-product-img">\
                                            <img src="' + products[index]['product_img'] + '" alt="">\
                                        </div>\
                                        <div class="cart-product-details">\
                                            <div class="cart-product-title">\
                                                <p>' + products[index]['product_title'] + '</p>\
                                                <img src="https://cdn.shopify.com/s/files/1/0057/8938/4802/files/Group_1_93145e45-8530-46aa-9fb8-6768cc3d80d2.png?v=1633783107" class="remove-cart-item" data-index="' + products[index]['index'] + '" alt="">\
                                            </div>\
                                            <div class="cart-product-pricing">\
                                                <p class="cart-product-price">₹' + products[index]['price'] + '</p>&nbsp;\
                                                <span class="cart-product-mrp">₹' + products[index]['mrp'] + '</span>\
                                            </div>\
                                            <div class="cart-product-description">\
                                                <p class="cart-product-color">Size :' + products[index]['size'] + '</p>\
                                                <span class="sc-lbxAil evmCQI"></span>\
                                                <?php if (!@$is_cart_page) { ?>\
                                                    <div class="cart-qty-wrapper">\
                                                        <span class="minus" data-index="' + products[index]['index'] + '">-</span>\
                                                        <span class="num">' + product_qty + '</span>\
                                                        <span class="plus" data-index="' + products[index]['index'] + '">+</span>\
                                                    </div>\
                                                <?php } else { ?>\
                                                    <span class="cart-qty">Qty: ' + product_qty + '</span>\
                                                <?php }  ?>\
                                            </div>\
                                        </div>\
                                    </div>';
                            }
                        }
                        if (cart_html == "") {
                            cart_html = ' <center style="margin-top: 25vh;margin-bottom:30vh">\
                               <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="110" height="110" x="0" y="0" viewBox="0 0 450.391 450.391" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z" fill="#cccccc" opacity="1" data-original="#cccccc" class=""></path></g></svg>\
                                    <p style="font-size: 20px;font-weight: 600;color: #1a2024;margin-top:3rem;margin-bottom: 40px;">Your cart is feeling lonely</p>\
                                    <div class="button-wrapper">\
                                    <!-- <a href="#" class="btn btn-dark" style="border-radius: 10px!important;font-size: 16px;background-image: none;color: #fff;text-transform: capitalize;padding: 10px 16px;" onclick="closeNav()">Start shopping</a> --> </div></center>';
                        }

                        $(".cart-products-list").html(cart_html);

                        if (cartTotalAmount > 0) {
                            $(".cart__footer").show();
                            $(".cartTotalAmount").html("₹" + cartTotalAmount.toFixed(2));

                        } else {
                            $(".cart__footer").hide();
                        }
                        localStorage.setItem('cartTotalAmount', cartTotalAmount.toFixed(2));

                        //  Cart FFloating Item
                        $(".header__cart-count--floating").html(products.length);
                        if (products.length > 0) {
                            $(".header__cart-count--floating").removeClass("d-none");
                        } else {
                            $(".header__cart-count--floating").addClass("d-none");
                            if ("cart" == "<?= @$load_page ?>" || "payment" == "<?= @$load_page ?>") {
                                window.location.href = "<?= base_url(); ?>";
                            }
                        }
                    }
                    CartList();

                    function removeCart(removeIndex) {
                        CartProducts = [];

                        if (localStorage.getItem('products')) {
                            CartProducts = JSON.parse(localStorage.getItem('products'));
                        }

                        CartProducts.splice(removeIndex, 1);
                        $(".cart-product-index-" + removeIndex).remove();

                        for (index = 0; index < CartProducts.length; index++) {
                            CartProducts[index]['index'] = index;
                        }

                        localStorage.setItem('products', JSON.stringify(CartProducts));
                        CartList();
                    }

                    function updateCartQty(Index, newQty) {
                        CartProducts = [];

                        if (localStorage.getItem('products')) {
                            CartProducts = JSON.parse(localStorage.getItem('products'));
                        }

                        for (let index = 0; index < CartProducts.length; index++) {
                            if (CartProducts[index]['index'] == Index) {
                                CartProducts[index]['qty'] = newQty;
                            }
                        }
                        localStorage.setItem('products', JSON.stringify(CartProducts));
                        CartList();
                    }

                    // Qty Add Minus start ===========
                    $(document).ready(function() {
                        // Cache jQuery selectors for performance
                        const $plusButton = $(".plus");
                        const $minusButton = $(".minus");
                        const $numberDisplay = $(".num");

                        // Initialize the counter

                        // Function to update the display and handle formatting
                        const updateDisplay = (that) => {
                            const formattedCount = count < 10 ? "0" + count : count;
                            that.text(formattedCount);
                        };

                        // Event listener for the plus button
                        $(document).on("click", ".plus", function() {
                            product_index = $(this).attr("data-index");
                            $that = $(this).parent(".cart-qty-wrapper").find(".num");
                            count = parseInt($that.text());
                            count++;
                            updateDisplay($that);
                            updateCartQty(product_index, count);
                        });

                        // Event listener for the minus button
                        $(document).on("click", ".minus", function() {
                            product_index = $(this).attr("data-index");
                            $that = $(this).parent(".cart-qty-wrapper").find(".num");
                            count = parseInt($that.text());
                            if (count > 1) {
                                count--;
                                updateDisplay($that);
                                updateCartQty(product_index, count);
                            } else {
                                removeCart(product_index);
                            }
                        });


                        $(document).on("click", ".remove-cart-item", function() {
                            product_index = $(this).attr("data-index");
                            removeCart(product_index);
                        });
                    });

                    // Qty Add Minus End ===========
                    //  Cart End  ==========================

                    $("#back-btn").on("click", function() {
                        history.back();
                    });
                </script>
                <style>
                    .steps.svelte-idjy9v .steps-inner .step.active .info-wrap .circle-box.svelte-idjy9v {
                        border-color: #000000;
                        color: #000000;
                        background: #fff;
                    }


                    .steps.svelte-idjy9v .steps-inner .step.active .info-wrap .title.svelte-idjy9v {
                        color: #000000;
                    }

                    .steps.svelte-idjy9v .steps-inner .step.svelte-idjy9v:last-child {
                        justify-content: center;
                    }

                    .steps.svelte-idjy9v.svelte-idjy9v {
                        padding: 2.3rem 1.2rem 0.5rem;

                    }

                    ._2dxSCm .search-div:before {
                        background: url('<?= base_url("assets/images/theme/search.svg") ?>');
                    }
                </style>
                </body>

                </html>