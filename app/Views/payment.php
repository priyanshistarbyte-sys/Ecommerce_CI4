<?php if (@$hash) { ?>

    <div>

        <center style="margin-top: 45vh;margin-bottom:30vh">
            <p style="font-size: 40px;font-weight: 600;color: #1a2024;margin-top:3rem;margin-bottom: 40px;">Waiting for redirection...</p>
        </center>

        <form action="<?php echo $action; ?>" method="post" name="payuForm" style="display: none;">
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>" />
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
            <table>
                <tr>
                    <td><b>Mandatory Parameters</b></td>
                </tr>
                <tr>
                    <td>Amount: </td>
                    <td><input name="amount" value="<?php echo (empty(@$posted['amount'])) ? '' : @$posted['amount'] ?>" /></td>
                    <td>First Name: </td>
                    <td><input name="firstname" id="firstname" value="<?php echo (empty(@$posted['firstname'])) ? '' : @$posted['firstname']; ?>" /></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input name="email" id="email" value="<?php echo (empty(@$posted['email'])) ? '' : @$posted['email']; ?>" /></td>
                    <td>Phone: </td>
                    <td><input name="phone" value="<?php echo (empty(@$posted['phone'])) ? '' : @$posted['phone']; ?>" /></td>
                </tr>
                <tr>
                    <td>Product Info: </td>
                    <td colspan="3"><textarea name="productinfo"><?php echo (empty(@$posted['productinfo'])) ? '' : @$posted['productinfo'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Success URI: </td>
                    <td colspan="3"><input name="surl" value="<?php echo (empty(@$posted['surl'])) ? '' : @$posted['surl'] ?>" size="64" /></td>
                </tr>
                <tr>
                    <td>Failure URI: </td>
                    <td colspan="3"><input name="furl" value="<?php echo (empty(@$posted['furl'])) ? '' : @$posted['furl'] ?>" size="64" /></td>
                </tr>

                <tr>
                    <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
                </tr>

                <tr>
                    <td><b>Optional Parameters</b></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input name="lastname" id="lastname" value="<?php echo (empty(@$posted['lastname'])) ? '' : @$posted['lastname']; ?>" /></td>
                    <td>Cancel URI: </td>
                    <td><input name="curl" value="" /></td>
                </tr>
                <tr>
                    <td>Address1: </td>
                    <td><input name="address1" value="<?php echo (empty(@$posted['address1'])) ? '' : @$posted['address1']; ?>" /></td>
                    <td>Address2: </td>
                    <td><input name="address2" value="<?php echo (empty(@$posted['address2'])) ? '' : @$posted['address2']; ?>" /></td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><input name="city" value="<?php echo (empty(@$posted['city'])) ? '' : @$posted['city']; ?>" /></td>
                    <td>State: </td>
                    <td><input name="state" value="<?php echo (empty(@$posted['state'])) ? '' : @$posted['state']; ?>" /></td>
                </tr>
                <tr>
                    <td>Country: </td>
                    <td><input name="country" value="<?php echo (empty(@$posted['country'])) ? '' : @$posted['country']; ?>" /></td>
                    <td>Zipcode: </td>
                    <td><input name="zipcode" value="<?php echo (empty(@$posted['zipcode'])) ? '' : @$posted['zipcode']; ?>" /></td>
                </tr>
                <tr>
                    <td>UDF1: </td>
                    <td><input name="udf1" value="<?php echo (empty(@$posted['udf1'])) ? '' : @$posted['udf1']; ?>" /></td>
                    <td>UDF2: </td>
                    <td><input name="udf2" value="<?php echo (empty(@$posted['udf2'])) ? '' : @$posted['udf2']; ?>" /></td>
                </tr>
                <tr>
                    <td>UDF3: </td>
                    <td><input name="udf3" value="<?php echo (empty(@$posted['udf3'])) ? '' : @$posted['udf3']; ?>" /></td>
                    <td>UDF4: </td>
                    <td><input name="udf4" value="<?php echo (empty(@$posted['udf4'])) ? '' : @$posted['udf4']; ?>" /></td>
                </tr>
                <tr>
                    <td>UDF5: </td>
                    <td><input name="udf5" value="<?php echo (empty(@$posted['udf5'])) ? '' : @$posted['udf5']; ?>" /></td>
                    <td>PG: </td>
                    <td><input name="pg" value="<?php echo (empty(@$posted['pg'])) ? '' : @$posted['pg']; ?>" /></td>
                </tr>
                <tr>
                    <?php if (!$hash) { ?>
                        <td colspan="4"><input type="submit" value="Submit" /></td>
                    <?php } ?>
                </tr>
            </table>
        </form>
        <script>
            var hash = '<?= @$hash ?>';
            if (hash != '') {
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </div>

<?php } else { ?>
    <style>
        .cart_page_footer {
            box-shadow: none;
            position: fixed;
            bottom: 80px
        }

        .header-menu {
            display: none;
        }

        .cart-list {
            max-height: max-content;
        }

        ._1fhgRH {
            margin-bottom: 250px;
        }

        .gNFCeh {
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            padding: 16px 16px 18px;
            background-color: #FFFFFF;
        }

        .fill-grey-t2 {
            fill: rgb(139, 139, 163);
        }

        .hEBjyt {
            color: rgb(53, 53, 67);
            font-style: normal;
            font-weight: 700;
            font-size: 17px;
            line-height: 20px;
            font-family: "Mier bold";
            margin: 0px;
            padding: 0px;
        }

        .cHsEym {
            padding: 0px 16px 18px;
            background-color: #FFFFFF;
        }

        .efQsfx {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: start;
            justify-content: start;
            flex-direction: row;
            border-radius: 4px;
            background-color: rgb(231, 238, 255);
            padding: 6px 12px;
            gap: 10px;
        }

        .eVDQPI {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            padding-left: 10px;
            height: 60px;
            width: 60px;
        }

        .cOCnuI {
            display: flex;
            -webkit-box-align: center;
            -webkit-box-pack: center;
            justify-content: center;
            flex-direction: column;
            align-items: flex-start;
            max-height: 50px;
            border-radius: 4px;
            background-color: rgb(231, 238, 255);
        }

        .eNkLGR {
            color: rgb(159, 32, 137);
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 20px;
            font-family: "Mier demi";
            margin: 0px;
            padding: 0px;
        }

        .RrifI {
            color: rgb(85, 133, 248);
        }

        .GmPbS {
            padding: 6px 16px;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            gap: 10px;
            background-color: #FFFFFF;
        }

        .GmPbS span {
            font-weight: 600;
            font-size: 10px;
            font-family: "Mier book";
        }

        .GmPbS div {
            height: 1px;
            background-color: rgb(206, 206, 222);
            -webkit-box-flex: 1;
            flex-grow: 1;
        }

        .cart__footer {
            position: unset;
            box-shadow: unset;
            border-top: 5px solid #eaeaf2;
            border-bottom: 5px solid #eaeaf2;
        }

        .error-message {
            font-size: 14px;
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .eGwEyP {
            padding: 12px 16px;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
        }

        .dUijPM {
            display: flex;
            flex-direction: column;
            -webkit-box-pack: justify;
            justify-content: space-between;
            max-width: 50%;
            padding-right: 8px;
        }

        .dUijPM span {
            color: rgb(53, 53, 67);
            font-weight: 700;
            font-size: 17px;
            line-height: 20px;
            font-family: "Mier bold";
        }

        .dUijPM button {
            font-weight: unset;
            font-family: "Mier bold";
        }

        .ylmAj {
            background: #E67E22;
            cursor: pointer;
            font-style: normal;
            text-align: center;
            letter-spacing: 0.0015em;
            font-size: 13px;
            font-weight: 700;
            line-height: 16px;
            border-radius: 4px;
            background: inherit;
            border: none;
            padding: 0px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .iAFVK {
            width: 50%;
        }

        .iAFVK button {
            width: 100%;
            font-weight: 600;
            font-family: "Mier demi";
        }

        .bwHzRF {
            cursor: pointer;
            font-style: normal;
            text-align: center;
            letter-spacing: 0.0015em;
            font-size: 15px;
            line-height: 20px;
            border-radius: 4px;
            color: rgb(255, 255, 255);
            background: #E67E22;
            border: none;
            padding: 12px;
            font-weight: 500;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ixHOyU {
            position: fixed;
            width: 100%;
            max-width: 800px;
            background-color: rgb(255, 255, 255);
            bottom: 0px;
            z-index: 1;
        }

        .IhlWp {
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid rgb(85, 133, 248);
            color: rgb(85, 133, 248);
            font-size: 11px;
            font-weight: 700;
            background-color: rgb(85, 133, 248);
        }
    </style>
    <div id="container">
        <div style="" data-reactroot="">
            <div class="_1fhgRH" style="min-height: 100vh;">
                <div data-testid="stepper-container" class="sc-geuGuN gqSLnX">
                    <div class="sc-kGhOqx chtKwW">
                        <ul class="sc-bAKPPm eOmvaT">
                            <div class="sc-jZiqTT hGoFZP">
                                <div class="sc-bxSTMQ geeMAN">
                                    <div data-testid="left-line" class="sc-PJClH lagJzQ"></div>
                                    <div class="sc-iJkHyd IhlWp"><svg width="20" height="20" viewBox="0.5 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <title>check-icon</title>
                                            <rect x="1.25" y="0.75" width="18.5" height="18.5" rx="9.25" fill="#5585F8"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6716 7.37285C17.0971 6.96439 17.1108 6.28832 16.7023 5.86289C16.2939 5.43755 15.618 5.4238 15.1926 5.83218L10.9997 9.85723L10.9997 9.85727L9.02229 11.7557L6.82333 9.55674C6.40622 9.13963 5.72995 9.13963 5.31284 9.55674C4.8957 9.97388 4.89573 10.6502 5.31289 11.0673L8.26525 14.0192C8.66883 14.4227 9.32103 14.4293 9.73274 14.0341L10.9998 12.8178V12.8178L16.6716 7.37285Z" fill="white"></path>
                                            <rect x="1.25" y="0.75" width="18.5" height="18.5" rx="9.25" stroke="#5585F8" stroke-width="1.5"></rect>
                                        </svg></div>
                                    <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                                </div>
                                <div class="sc-jWquRx ezBHwi">Cart</div>
                            </div>
                            <div class="sc-jZiqTT hGoFZP">
                                <div class="sc-bxSTMQ geeMAN">
                                    <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                    <div class="sc-iJkHyd IhlWp"><svg width="20" height="20" viewBox="0.5 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <title>check-icon</title>
                                            <rect x="1.25" y="0.75" width="18.5" height="18.5" rx="9.25" fill="#5585F8"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6716 7.37285C17.0971 6.96439 17.1108 6.28832 16.7023 5.86289C16.2939 5.43755 15.618 5.4238 15.1926 5.83218L10.9997 9.85723L10.9997 9.85727L9.02229 11.7557L6.82333 9.55674C6.40622 9.13963 5.72995 9.13963 5.31284 9.55674C4.8957 9.97388 4.89573 10.6502 5.31289 11.0673L8.26525 14.0192C8.66883 14.4227 9.32103 14.4293 9.73274 14.0341L10.9998 12.8178V12.8178L16.6716 7.37285Z" fill="white"></path>
                                            <rect x="1.25" y="0.75" width="18.5" height="18.5" rx="9.25" stroke="#5585F8" stroke-width="1.5"></rect>
                                        </svg></div>
                                    <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                                </div>
                                <div class="sc-jWquRx ezBHwi">Address</div>
                            </div>
                            <div class="sc-jZiqTT hGoFZP">
                                <div class="sc-bxSTMQ geeMAN">
                                    <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                    <div class="sc-dGHKFW cRaGaC">3</div>
                                    <div data-testid="right-line" class="sc-jfdOKL bSausD"></div>
                                </div>
                                <div class="sc-jWquRx iefUco">Payment</div>
                            </div>
                            <div class="sc-jZiqTT hGoFZP">
                                <div class="sc-bxSTMQ geeMAN">
                                    <div data-testid="left-line" class="sc-PJClH kHHhBS"></div>
                                    <div class="sc-dGHKFW iefbLi">4</div>
                                    <div data-testid="right-line" class="sc-jfdOKL jSyZxf"></div>
                                </div>
                                <div class="sc-jWquRx ezBHwi">Summary</div>
                            </div>
                        </ul>
                    </div>
                </div>
                <?php include(APPPATH . 'Views/common_template/ads.php'); ?>
                <div class="sc-bBXxYQ jMfCEJ"></div>

                <!-- <div class="sc-dwVMhp gNFCeh">
                    <h6 font-size="17px" font-weight="bold" color="greyBase" class="sc-fnykZs hEBjyt">Select Payment Method</h6><svg width="80" height="24" viewBox="0 0 80 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1172 3C10.3409 3 9.04382 3.29813 7.82319 3.63C6.57444 3.9675 5.31557 4.36687 4.57532 4.60875C4.26582 4.71096 3.99143 4.8984 3.78367 5.14954C3.57591 5.40068 3.44321 5.70533 3.40082 6.0285C2.73032 11.0651 4.28619 14.7979 6.17394 17.2672C6.97447 18.3236 7.92897 19.2538 9.00557 20.0269C9.43982 20.334 9.84257 20.5691 10.1845 20.73C10.4995 20.8785 10.8382 21 11.1172 21C11.3962 21 11.7337 20.8785 12.0498 20.73C12.4621 20.5296 12.8565 20.2944 13.2288 20.0269C14.3054 19.2538 15.2599 18.3236 16.0604 17.2672C17.9482 14.7979 19.504 11.0651 18.8335 6.0285C18.7912 5.70518 18.6586 5.40035 18.4508 5.14901C18.2431 4.89768 17.9686 4.71003 17.659 4.60762C16.5845 4.25529 15.5015 3.92894 14.4112 3.62888C13.1905 3.29925 11.8934 3 11.1172 3ZM13.5314 9.68925C13.637 9.58363 13.7803 9.52429 13.9297 9.52429C14.079 9.52429 14.2223 9.58363 14.3279 9.68925C14.4335 9.79487 14.4929 9.93813 14.4929 10.0875C14.4929 10.2369 14.4335 10.3801 14.3279 10.4858L10.9529 13.8608C10.9007 13.9131 10.8386 13.9547 10.7703 13.9831C10.7019 14.0114 10.6287 14.026 10.5547 14.026C10.4807 14.026 10.4074 14.0114 10.3391 13.9831C10.2707 13.9547 10.2087 13.9131 10.1564 13.8608L8.46894 12.1733C8.41664 12.121 8.37516 12.0589 8.34685 11.9905C8.31855 11.9222 8.30398 11.849 8.30398 11.775C8.30398 11.701 8.31855 11.6278 8.34685 11.5595C8.37516 11.4911 8.41664 11.429 8.46894 11.3767C8.52124 11.3244 8.58333 11.283 8.65166 11.2547C8.71999 11.2264 8.79323 11.2118 8.86719 11.2118C8.94115 11.2118 9.01439 11.2264 9.08272 11.2547C9.15105 11.283 9.21314 11.3244 9.26544 11.3767L10.5547 12.6671L13.5314 9.68925Z" fill="#ADC6FF"></path>
                        <path d="M24.1172 3.53998L24.2472 4.65998L26.0372 3.67998V9.49998H27.1472V2.49998H26.1472L24.1172 3.53998Z" class="fill-grey-t2"></path>
                        <path d="M31.5958 9.64998C33.2058 9.64998 34.2458 8.19998 34.2458 5.99998C34.2458 3.79998 33.2058 2.34998 31.5658 2.34998C29.9458 2.34998 28.9158 3.79998 28.9158 5.99998C28.9158 8.19998 29.9458 9.64998 31.5958 9.64998ZM31.5958 8.62998C30.5958 8.62998 30.0658 7.55998 30.0658 5.99998C30.0658 4.43998 30.5858 3.36998 31.5658 3.36998C32.5658 3.36998 33.0958 4.43998 33.0958 5.99998C33.0958 7.55998 32.5658 8.62998 31.5958 8.62998Z" class="fill-grey-t2"></path>
                        <path d="M38.149 9.64998C39.759 9.64998 40.799 8.19998 40.799 5.99998C40.799 3.79998 39.759 2.34998 38.119 2.34998C36.499 2.34998 35.469 3.79998 35.469 5.99998C35.469 8.19998 36.499 9.64998 38.149 9.64998ZM38.149 8.62998C37.149 8.62998 36.619 7.55998 36.619 5.99998C36.619 4.43998 37.139 3.36998 38.119 3.36998C39.119 3.36998 39.649 4.43998 39.649 5.99998C39.649 7.55998 39.119 8.62998 38.149 8.62998Z" class="fill-grey-t2"></path>
                        <path d="M43.4923 6.24998C44.3823 6.24998 45.0923 5.55998 45.0923 4.29998C45.0923 3.03998 44.3823 2.34998 43.4923 2.34998C42.6123 2.34998 41.9023 3.03998 41.9023 4.29998C41.9023 5.55998 42.6123 6.24998 43.4923 6.24998ZM48.2923 2.49998H47.4323L42.7823 9.49998H43.6423L48.2923 2.49998ZM43.4923 5.43998C43.0623 5.43998 42.7623 5.06998 42.7623 4.29998C42.7623 3.52998 43.0623 3.15998 43.4923 3.15998C43.9223 3.15998 44.2323 3.52998 44.2323 4.29998C44.2323 5.06998 43.9223 5.43998 43.4923 5.43998ZM47.5823 9.64998C48.4723 9.64998 49.1823 8.95998 49.1823 7.69998C49.1823 6.43998 48.4723 5.74998 47.5823 5.74998C46.7023 5.74998 45.9923 6.43998 45.9923 7.69998C45.9923 8.95998 46.7023 9.64998 47.5823 9.64998ZM47.5823 8.83998C47.1523 8.83998 46.8523 8.46998 46.8523 7.69998C46.8523 6.92998 47.1523 6.55998 47.5823 6.55998C48.0223 6.55998 48.3223 6.92998 48.3223 7.69998C48.3223 8.46998 48.0223 8.83998 47.5823 8.83998Z" class="fill-grey-t2"></path>
                        <path d="M55.4541 9.64998C56.9141 9.64998 57.9341 8.78998 57.9341 7.47998C57.9341 4.79998 54.3341 5.96998 54.3341 4.29998C54.3341 3.69998 54.8141 3.34998 55.4641 3.34998C56.2141 3.34998 56.6841 3.78998 56.7941 4.42998L57.9041 4.22998C57.7241 3.12998 56.8241 2.34998 55.4941 2.34998C54.1441 2.34998 53.1741 3.16998 53.1741 4.39998C53.1741 7.07998 56.7641 5.90998 56.7641 7.59998C56.7641 8.22998 56.2541 8.65998 55.4841 8.65998C54.7941 8.65998 54.1341 8.28998 54.0141 7.57998L52.9041 7.81998C53.1041 8.98998 54.2041 9.64998 55.4541 9.64998Z" class="fill-grey-t2"></path>
                        <path d="M65.2964 9.49998L62.6764 2.45998H61.4064L58.7864 9.49998H59.9964L60.6264 7.68998H63.4264L64.0664 9.49998H65.2964ZM62.0564 3.73998L63.0864 6.65998H60.9964L62.0164 3.73998H62.0564Z" class="fill-grey-t2"></path>
                        <path d="M71.3322 2.49998H66.7522V9.49998H67.8922V6.54998H70.4722V5.50998H67.8922V3.53998H71.3322V2.49998Z" class="fill-grey-t2"></path>
                        <path d="M77.6917 2.49998H73.0417V9.49998H77.6917V8.45998H74.1817V6.49998H76.8417V5.44998H74.1817V3.53998H77.6917V2.49998Z" class="fill-grey-t2"></path>
                        <path d="M27.307 18.9C28.657 18.9 29.627 17.95 29.627 16.7C29.627 15.33 28.537 14.5 27.207 14.5H24.717V21.5H25.857V18.9H27.307ZM28.447 16.7C28.447 17.31 28.027 17.85 27.117 17.85H25.857V15.55H27.007C28.037 15.55 28.447 16.11 28.447 16.7Z" class="fill-grey-t2"></path>
                        <path d="M36.4524 21.5L33.8324 14.46H32.5624L29.9424 21.5H31.1524L31.7824 19.69H34.5824L35.2224 21.5H36.4524ZM33.2124 15.74L34.2424 18.66H32.1524L33.1724 15.74H33.2124Z" class="fill-grey-t2"></path>
                        <path d="M39.6613 21.5V18.57L42.0913 14.5H40.8413L39.1513 17.45H39.1013L37.4113 14.5H36.0813L38.5213 18.57V21.5H39.6613Z" class="fill-grey-t2"></path>
                        <path d="M50.8513 21.5V14.5H49.1513L47.1513 19.76H47.1113L45.1213 14.5H43.3513V21.5H44.4913V15.98H44.5313L46.6113 21.5H47.5913L49.6713 15.98H49.7113V21.5H50.8513Z" class="fill-grey-t2"></path>
                        <path d="M57.5103 14.5H52.8604V21.5H57.5103V20.46H54.0004V18.5H56.6604V17.45H54.0004V15.54H57.5103V14.5Z" class="fill-grey-t2"></path>
                        <path d="M65.3439 21.54V14.5H64.2039V19.78L60.5339 14.46H59.2639V21.5H60.4039V16.22L64.0739 21.54H65.3439Z" class="fill-grey-t2"></path>
                        <path d="M72.0671 14.5H66.7571V15.55H68.8471V21.5H69.9871V15.55H72.0671V14.5Z" class="fill-grey-t2"></path>
                        <path d="M75.4028 21.65C76.8628 21.65 77.8828 20.79 77.8828 19.48C77.8828 16.8 74.2828 17.97 74.2828 16.3C74.2828 15.7 74.7628 15.35 75.4128 15.35C76.1628 15.35 76.6328 15.79 76.7428 16.43L77.8528 16.23C77.6728 15.13 76.7728 14.35 75.4428 14.35C74.0928 14.35 73.1228 15.17 73.1228 16.4C73.1228 19.08 76.7128 17.91 76.7128 19.6C76.7128 20.23 76.2028 20.66 75.4328 20.66C74.7428 20.66 74.0828 20.29 73.9628 19.58L72.8528 19.82C73.0528 20.99 74.1528 21.65 75.4028 21.65Z" class="fill-grey-t2"></path>
                    </svg>
                </div> -->
                <!-- <div class="sc-hKdnnL cHsEym">
                    <div class="sc-liHMlC efQsfx"><video autoplay="" loop="" playsinline="" src="<?= base_url("assets/cod_lat.webm"); ?>" class="sc-fSUSjI eVDQPI"></video>
                        <div class="sc-cuqtlR cOCnuI"><span font-size="15px" font-weight="demi" class="sc-fnykZs eNkLGR sc-bTmccw RrifI sc-bTmccw RrifI" color="pinkBase">Pay online &amp; get EXTRA ₹33 off</span></div>
                    </div>
                </div> -->


                <div>
                    <div data-testid="PAY ONLINE" class="sc-gVAlfg GmPbS">
                        <span>PAY  OFFLINE</span>
                        <div></div>
                    </div>
                    <ul class="accordion">

                        <!-- <li class="accordion-item ">
                            <h3 class="accordion-thumb">
                                <div class=" flex align-items-center">
                                    <img src="https://images.meesho.com/files/headless/card_ppr.png" width="20px">
                                    <span class="cash-delivery px-2">Debit/Credit Cards</span>
                                </div>
                            </h3>
                            <div class="accordion-panel">
                                <p class='error-message'>Debit/ Credit card payments are temporarily unavailable.</p>
                            </div>
                        </li>
                        <li class="accordion-item ">
                            <h3 class="accordion-thumb">
                                <div class=" flex align-items-center">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="16" height="16" fill="white"></rect>
                                        <g clip-path="url(#clip0_1522_56449)">
                                            <path d="M13.1306 1.75918L0.0769665 5.93773C-0.468501 6.11233 -0.792684 6.65432 -0.631688 7.15726L1.59253 14.1056C1.75093 14.6005 2.33218 14.8615 2.87765 14.6869L15.9218 10.5114C16.4767 10.3338 16.7915 9.79481 16.6305 9.29187L14.4063 2.34351C14.2479 1.84868 13.6666 1.58759 13.1212 1.76219L13.1306 1.75918Z" fill="#90B1FB"></path>
                                            <path d="M14.9493 3.72461H1.06066C0.4803 3.72461 0 4.11077 0 4.59939V11.8498C0 12.3306 0.4803 12.7246 1.06066 12.7246H14.9393C15.5297 12.7246 16 12.3384 16 11.8498V4.59939C16 4.11865 15.5197 3.72461 14.9393 3.72461H14.9493Z" fill="#5580E6"></path>
                                            <path d="M9.8286 6.9569C9.83963 7.02307 9.86169 7.0782 9.86169 7.14437C9.86169 7.18848 9.86169 7.24362 9.83963 7.28773C9.8286 7.33184 9.79552 7.37595 9.76244 7.40903C9.72936 7.44211 9.69627 7.46417 9.65216 7.4752C9.60805 7.4752 9.56394 7.49725 9.51983 7.49725H8.76996C8.76996 7.77294 8.67071 8.0376 8.51632 8.26918C8.36194 8.51179 8.13036 8.71028 7.85467 8.84262C7.52384 8.997 7.15993 9.09625 6.78499 9.10728L9.22209 10.3424C9.22209 10.3424 9.2662 10.3754 9.28825 10.3975C9.29928 10.4196 9.32134 10.4416 9.33236 10.4637V10.5409C9.33236 10.5409 9.32134 10.596 9.29928 10.607C9.189 10.7394 9.04565 10.8496 8.88023 10.9158C8.70379 10.982 8.51632 11.004 8.33988 10.982C8.1855 10.9709 8.03111 10.9268 7.88775 10.8607C7.76645 10.7945 7.63412 10.7063 7.52384 10.6291L5.60504 9.06317C5.57196 8.997 5.56093 8.91981 5.56093 8.85364C5.56093 8.78748 5.56093 8.71028 5.60504 8.64412C5.63813 8.57795 5.69327 8.52282 5.75943 8.47871H6.34389C6.7078 8.48973 7.06068 8.40151 7.33637 8.20302C7.45768 8.1148 7.55692 8.00452 7.62309 7.88322C7.68926 7.76191 7.73337 7.62958 7.73337 7.48622H5.25216C5.25216 7.48622 5.19703 7.38698 5.186 7.34287C5.16394 7.2767 5.15291 7.21053 5.14189 7.13334C5.14189 7.08923 5.14189 7.03409 5.16394 6.98998C5.17497 6.94587 5.20805 6.90176 5.24113 6.86868C5.27422 6.84663 5.3073 6.82457 5.35141 6.80252C5.39552 6.79149 5.43963 6.78046 5.48374 6.79149H7.76645C7.74439 6.59299 7.67823 6.39449 7.59001 6.20703H5.24113C5.24113 6.20703 5.186 6.10778 5.17497 6.05264C5.15291 5.98648 5.13086 5.90928 5.13086 5.84312C5.13086 5.79901 5.13086 5.74387 5.15291 5.69976C5.17497 5.65565 5.19702 5.61154 5.23011 5.57845C5.26319 5.54537 5.29627 5.52332 5.34038 5.51229C5.38449 5.51229 5.4286 5.49023 5.47271 5.49023H9.72936C9.72936 5.49023 9.79552 5.58948 9.80655 5.64462C9.80655 5.71079 9.83963 5.76592 9.83963 5.84312C9.83963 5.89825 9.83963 5.94236 9.8286 5.9975C9.81758 6.04161 9.78449 6.09675 9.74038 6.12983C9.7073 6.16292 9.67422 6.17394 9.63011 6.196C9.586 6.20703 9.54189 6.21805 9.49778 6.20703H8.53838C8.61557 6.39449 8.67071 6.59299 8.70379 6.79149H9.72936C9.72936 6.79149 9.78449 6.89074 9.80655 6.94587H9.8286V6.9569Z" fill="white"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1522_56449">
                                                <rect width="16" height="13.25" fill="white" transform="translate(0 1.59961)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="cash-delivery px-2">Cash On Delivery</span>
                                </div>
                            </h3>
                            <div class="accordion-panel">
                                <p class='error-message'>Cash on delivery is not available in your Pincode.</p>
                            </div>
                        </li> -->
                        <li class="accordion-item is-active">
                            <h3 class="accordion-thumb ">
                                <div class=" flex align-items-center">
                                    <img src="<?php echo base_url('assets/website/images/express-delivery.png'); ?>" alt="logo" width="25PX" >
                                    <!-- <img src="https://images.meesho.com/files/headless/upi_ppr.png" width="20PX"> -->
                                    <span class="order-summary px-2">Cash On Delivery</span>
                                </div>
                            </h3>
                            <div class="accordion-panel p-0 pt-3">

                                <div class="plans">
                                    <?php
                                    $checked = "";
                                    if (@$netbanking == 1) { ?>
                                        <label class="plan" for="net_banking">
                                            <input checked type="radio" name="paymentMetod" class="paymentMetod" value="net_banking" id="net_banking" />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>Net Banking</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 469.334 469.334" style="enable-background:new 0 0 512 512" xml:space="preserve" class="pay-logo">
                                                        <g>
                                                            <path d="M458.667 192c5.896 0 10.667-4.742 10.667-10.638v-42.661c0-3.76-1.979-7.25-5.219-9.165L255.459 5.62c-.094-.063-.188-.115-.281-.167-12.969-7.186-27.594-7.405-41.313.146L5.219 129.536A10.642 10.642 0 0 0 0 138.701v42.661C0 187.258 4.771 192 10.667 192h32v192.008C19.136 384.008 0 403.142 0 426.671v31.997a10.66 10.66 0 0 0 10.667 10.665h448a10.66 10.66 0 0 0 10.667-10.665v-31.997c0-23.529-19.135-42.663-42.667-42.663V192h32zM192 384h-64V192h64v192zm149.334 0h-64V192h64v192z" style="" fill="#303c42" data-original="#303c42"></path>
                                                            <path d="M21.334 144.74 224.448 24.073c6.646-3.656 13.708-3.646 20.271-.073L448 144.74v25.927H21.334V144.74zM213.334 192h42.667v192h-42.667zM64 192h42.667v192H64zM448 426.667V448H21.334v-21.333c0-11.76 9.573-21.333 21.333-21.333H426.667c11.76 0 21.333 9.573 21.333 21.333zM362.667 192h42.667v192h-42.667z" style="" fill="#fafafa" data-original="#fafafa"></path>
                                                            <linearGradient id="a" x1="-60.036" x2="-47.536" y1="619.151" y2="606.651" gradientTransform="matrix(21.3333 0 0 -21.3333 1430.108 13315.227)" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" style="stop-color:#000000;stop-opacity:0.1" stop-color="#000000;stop-opacity:0.1"></stop>
                                                                <stop offset="1" style="stop-color:#000000;stop-opacity:0" stop-color="#000000;stop-opacity:0"></stop>
                                                            </linearGradient>
                                                            <path d="M213.334 298.667 256 341.334V192h-42.667v106.667zm-106.667-64V192H64l42.667 42.667zm256-42.667v192h42.667V192h-42.667z" style="fill:url(#a);" fill=""></path>
                                                            <circle cx="234.646" cy="106.667" r="42.667" style="" fill="#303c42" data-original="#303c42"></circle>
                                                            <circle cx="234.646" cy="106.667" r="21.333" style="" fill="#fafafa" data-original="#fafafa"></circle>
                                                            <path d="M223.959 117.355c0-11.771 9.583-21.354 21.354-21.354 3.137 0 6.064.76 8.749 1.982-3.346-7.434-10.753-12.669-19.415-12.669-11.771 0-21.354 9.583-21.354 21.354 0 8.634 5.211 16.012 12.605 19.372-1.201-2.667-1.939-5.577-1.939-8.685z" style="opacity:0.1;enable-background:new ;" fill="#000000" opacity="1" data-original="#000000"></path>
                                                            <linearGradient id="b" x1="-67.747" x2="-43.846" y1="616.237" y2="605.091" gradientTransform="matrix(21.3333 0 0 -21.3333 1430.108 13315.227)" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" style="stop-color:#FFFFFF;stop-opacity:0.2" stop-color="#ffffff;stop-opacity:0.2"></stop>
                                                                <stop offset="1" style="stop-color:#FFFFFF;stop-opacity:0" stop-color="#ffffff;stop-opacity:0"></stop>
                                                            </linearGradient>
                                                            <path d="M458.667 192c5.896 0 10.667-4.742 10.667-10.638v-42.661c0-3.76-1.979-7.25-5.219-9.165L255.459 5.62c-.094-.063-.188-.115-.281-.167-12.969-7.186-27.594-7.405-41.313.146L5.219 129.536A10.642 10.642 0 0 0 0 138.701v42.661C0 187.258 4.771 192 10.667 192h32v192.008C19.136 384.008 0 403.142 0 426.671v31.997a10.66 10.66 0 0 0 10.667 10.665h448a10.66 10.66 0 0 0 10.667-10.665v-31.997c0-23.529-19.135-42.663-42.667-42.663V192h32zM192 384h-64V192h64v192zm149.334 0h-64V192h64v192z" style="fill:url(#b);" fill=""></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>

                                        <label class="plan" for="credit_card">
                                            <input type="radio" id="credit_card" name="paymentMetod" class="paymentMetod" value="credit_card" />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>Credit / Debit/ ATM Card</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" x="0" y="0" viewBox="0 0 609.809 609.809" style="enable-background:new 0 0 512 512" xml:space="preserve" class="pay-logo">
                                                        <g>
                                                            <path fill="#505278" d="M570.267 512.144H39.542C17.746 512.144 0 494.398 0 472.483V137.326c0-21.796 17.746-39.542 39.542-39.542h530.605c21.915 0 39.661 17.746 39.661 39.542v335.157c.001 21.915-17.745 39.661-39.541 39.661z" opacity="1" data-original="#505278"></path>
                                                            <path fill="#424566" d="M570.267 97.784H304.904v414.36h265.362c21.915 0 39.542-17.746 39.542-39.542V137.326c.001-21.796-17.745-39.542-39.541-39.542z" opacity="1" data-original="#424566" class=""></path>
                                                            <path fill="#575982" d="M318.125 97.784c-4.05 122.319-104.811 220.46-228.083 220.46-31.92 0-62.41-6.551-90.042-18.58v-53.239c26.56 15.364 57.289 24.059 90.042 24.059 96.95 0 176.273-76.822 180.322-172.819h47.76v.119z" opacity="1" data-original="#575982"></path>
                                                            <path fill="#505278" d="M304.904 97.784v69.199c7.742-21.796 12.387-45.021 13.22-69.199zM609.809 340.04v48.356c-28.585-5.479-56.455-7.861-84.087-5.121-49.904 5.002-96.236 28.347-145.902 73.487a2171.756 2171.756 0 0 0-23.821 22.034c-11.91 11.077-23.821 22.272-36.327 33.23h-77.179c28.585-19.057 54.192-42.996 80.99-68.008 7.98-7.384 16.079-15.126 24.297-22.511 57.646-52.286 112.672-79.561 173.176-85.635 29.897-2.978 60.149-.596 88.853 4.168z" opacity="1" data-original="#505278"></path>
                                                            <path fill="#575982" d="M242.494 512.144h62.41v-50.857c-20.366 18.699-40.495 36.208-62.41 50.857z" opacity="1" data-original="#575982"></path>
                                                            <path fill="#424566" d="M127.679 299.426h-58.48c-8.933 0-16.198-7.265-16.198-16.198V244.4c0-8.933 7.265-16.198 16.198-16.198h58.48c8.933 0 16.198 7.265 16.198 16.198v38.828c-.119 9.052-7.266 16.198-16.198 16.198z" opacity="1" data-original="#424566" class=""></path>
                                                            <path fill="#febd55" d="M127.679 298.473H69.08c-8.337 0-15.126-6.789-15.126-15.126V244.4c0-8.337 6.789-15.126 15.126-15.126h58.599c8.337 0 15.126 6.789 15.126 15.126v38.947c0 8.337-6.789 15.126-15.126 15.126z" opacity="1" data-original="#febd55"></path>
                                                            <path fill="#b5613c" d="M142.805 265.124v-2.382h-30.967v-10.481l7.98-7.98h22.987c0-.834-.119-1.667-.238-2.382h-23.344c-.357 0-.596.119-.834.357l-8.337 8.337H99.57v-21.2h-2.382v21.2H86.826l-8.337-8.337a1.288 1.288 0 0 0-.834-.357H54.192c-.119.715-.238 1.548-.238 2.382h23.225l7.861 7.861v10.6H53.954v2.382H85.04v10.6l-7.861 7.861H53.954c0 .834.119 1.667.238 2.382h23.463c.357 0 .596-.119.834-.357l8.337-8.337h10.362v21.2h2.382v-21.2h10.481l8.337 8.337c.238.238.476.357.834.357h23.344c.119-.715.238-1.548.238-2.382h-22.987l-7.98-7.98v-10.481zm-33.349 9.766H87.422v-22.034h22.034z" opacity="1" data-original="#b5613c"></path>
                                                            <path fill="#cad4ff" d="M545.97 297.758a3.295 3.295 0 0 1-1.548-.357c-1.787-.834-2.501-2.978-1.548-4.764 9.171-18.223 9.171-39.066 0-57.289-.834-1.787-.119-3.93 1.548-4.764 1.787-.834 3.93-.119 4.764 1.548 10.243 20.248 10.243 43.473 0 63.72-.715 1.192-1.906 1.906-3.216 1.906zm-12.268-6.789c9.647-17.151 9.647-36.922 0-54.073-.953-1.667-3.097-2.382-4.883-1.31-1.667.953-2.382 3.097-1.31 4.883 8.456 15.007 8.456 32.158 0 47.046-.953 1.667-.357 3.93 1.31 4.883a3.365 3.365 0 0 0 1.787.476c1.19-.118 2.381-.833 3.096-1.905zm-15.245-4.883c9.409-13.697 9.409-30.729 0-44.545-1.072-1.667-3.335-2.025-5.002-.953s-2.025 3.335-.953 5.002c7.623 11.196 7.623 25.25 0 36.446-1.072 1.667-.715 3.811.953 5.002.596.476 1.31.595 2.025.595 1.19.121 2.262-.475 2.977-1.547zm-16.079-4.526c5.241-4.764 8.099-11.077 8.099-17.627s-2.858-12.863-8.099-17.627c-1.429-1.31-3.692-1.31-5.002.238-1.31 1.429-1.31 3.692.238 5.002 3.692 3.454 5.717 7.861 5.717 12.387s-2.025 8.933-5.717 12.387c-1.429 1.31-1.548 3.573-.238 5.002.715.715 1.667 1.191 2.62 1.191.833 0 1.667-.357 2.382-.953z" opacity="1" data-original="#cad4ff"></path>
                                                            <path fill="#e6eaff" d="M300.021 452.116H57.527c-2.025 0-3.573-1.548-3.573-3.573s1.548-3.573 3.573-3.573h242.494c2.025 0 3.573 1.548 3.573 3.573s-1.667 3.573-3.573 3.573z" opacity="1" data-original="#e6eaff"></path>
                                                            <path fill="#cad4ff" d="M553.235 452.116h-45.974c-2.025 0-3.573-1.548-3.573-3.573s1.548-3.573 3.573-3.573h45.974c2.025 0 3.573 1.548 3.573 3.573s-1.667 3.573-3.573 3.573zm-65.507-3.573c0-2.025-1.548-3.573-3.573-3.573h-45.974c-2.025 0-3.573 1.548-3.573 3.573s1.548 3.573 3.573 3.573h45.974c2.025 0 3.573-1.667 3.573-3.573z" opacity="1" data-original="#cad4ff"></path>
                                                            <path fill="#e6eaff" d="M57.527 179.012c-2.025 0-3.573-1.548-3.573-3.573v-14.054c0-2.025 1.548-3.573 3.573-3.573s3.573 1.548 3.573 3.573v13.935c0 2.025-1.548 3.692-3.573 3.692zm22.987-3.573v-14.054c0-2.025-1.548-3.573-3.573-3.573s-3.573 1.548-3.573 3.573v13.935c0 2.025 1.548 3.573 3.573 3.573 2.024.119 3.573-1.548 3.573-3.454zm19.533 0v-14.054c0-2.025-1.548-3.573-3.573-3.573s-3.573 1.548-3.573 3.573v13.935c0 2.025 1.548 3.573 3.573 3.573 1.905.119 3.573-1.548 3.573-3.454zm19.414 0v-14.054c0-2.025-1.548-3.573-3.573-3.573s-3.573 1.548-3.573 3.573v13.935c0 2.025 1.548 3.573 3.573 3.573 2.024.119 3.573-1.548 3.573-3.454zM64.911 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913a10.8 10.8 0 0 1-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM93.853 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913a10.8 10.8 0 0 1-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM122.796 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.596-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM151.738 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.596-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM196.163 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM225.105 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM254.047 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.882 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM282.989 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.882 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692z" opacity="1" data-original="#e6eaff"></path>
                                                            <path fill="#cad4ff" d="M327.415 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.596-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM356.357 391.493h-.595c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.595c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.595a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM385.299 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM414.241 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM458.667 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.596-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM487.609 391.493h-.595c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.595c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.596-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.595a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM516.551 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c0 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692zM545.493 391.493h-.596c-5.955 0-10.838-4.883-10.838-10.838v-16.913c0-5.955 4.883-10.838 10.838-10.838h.596c5.955 0 10.838 4.883 10.838 10.838v16.913c.001 5.954-4.883 10.838-10.838 10.838zm-.595-31.444a3.71 3.71 0 0 0-3.692 3.692v16.913a3.71 3.71 0 0 0 3.692 3.692h.596a3.71 3.71 0 0 0 3.692-3.692v-16.913a3.71 3.71 0 0 0-3.692-3.692z" opacity="1" data-original="#cad4ff"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    <?php } else {
                                        $checked = "checked";
                                    }  ?>


                                    <?php if (in_array("gpay", @$payment_method)) { ?>

                                        <label class="plan" for="gpay">
                                            <input type="radio" id="gpay" name="paymentMetod" class="paymentMetod" value="gpay" <?= @$checked; ?> />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>G Pay</span>
                                                    <img src="<?= base_url(); ?>assets/website/images/gpay_icon.svg" class="pay-logo" alt="button">
                                                </div>
                                            </div>
                                        </label>

                                    <?php $checked = "";
                                    } ?>


                                    <?php if (in_array("phonepe", @$payment_method)) { ?>

                                        <label class="plan" for="phonepe">
                                            <input type="radio" id="phonepe" name="paymentMetod" class="paymentMetod" value="phonepe" <?= @$checked; ?> />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>PhonePe</span>
                                                    <img src="<?= base_url(); ?>assets/website/images/phonepe.svg" class="pay-logo" alt="button">
                                                </div>
                                            </div>
                                        </label>

                                    <?php $checked = "";
                                    } ?>

                                    <?php if (in_array("paytm", @$payment_method)) { ?>

                                        <label class="plan" for="paytm">
                                            <input type="radio" id="paytm" name="paymentMetod" class="paymentMetod" value="paytm" <?= @$checked; ?> />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>Paytm</span>
                                                    <img src="<?= base_url(); ?>assets/website/images/paytm_icon.svg" class="pay-logo" alt="button">
                                                </div>
                                            </div>
                                        </label>

                                    <?php $checked = "";
                                    } ?>

                                    <?php if (in_array("bhim_upi", @$payment_method)) { ?>

                                        <label class="plan" for="bhim_upi">
                                            <input type="radio" id="bhim_upi" name="paymentMetod" class="paymentMetod" value="bhim_upi" <?= @$checked; ?> />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>BHIM UPI</span>
                                                    <img src="<?= base_url(); ?>assets/website/images/bhim_upi.svg" class="pay-logo" alt="button">
                                                </div>
                                            </div>
                                        </label>

                                    <?php $checked = "";
                                    } ?>
                                    <?php if (in_array("whatspp_pay", @$payment_method)) { ?>

                                        <label class="plan" for="whatspp_pay">
                                            <input type="radio" id="whatspp_pay" name="paymentMetod" class="paymentMetod" value="whatspp_pay" <?= @$checked; ?> />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>WhatsppPay</span>
                                                    <img src="<?= base_url(); ?>assets/website/images/whatspp_pay.svg" class="pay-logo" alt="button">
                                                </div>
                                            </div>
                                        </label>

                                    <?php $checked = "";
                                    } ?>

                                </div>
                            </div>
                        </li>

                        <!-- <li class="accordion-item ">
                        <h3 class="accordion-thumb">
                            <div class=" flex align-items-center">
                                <img src="https://pdp.gokwik.co/assets/icons/cart.svg" alt="">
                                <span class="order-summary px-2">Shipping Address</span>
                            </div>
                        </h3>
                        <div class="accordion-panel customer-address"></div>
                    </li> -->

                    </ul>
                </div>

                <div class="cart__footer">
                    <div class="cart__price__details">
                        <div class="cart__breakup__inner">
                            <div class="shipping__total">
                                <span class="">Shipping:</span>
                                <span class="">FREE</span>
                            </div>
                            <div class="cart__total">
                                <span class="">Total Product Price:</span>
                                <span class="cartTotalAmount">₹00.00</span>
                            </div>
                            <div class="sc-bBXxYQ jMfCEJ mt-3 mb-1"></div>
                            <div class="mc_pay__total">
                                <span class="">Order Total :</span>
                                <span class="cartTotalAmount">₹00.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-container flex">
                    <div class="sc-fThYeS dUijPM"><span class="cartTotalAmount">₹00.00</span><button class="sc-kLLXSd ylmAj">VIEW PRICE DETAILS</button></div>
                    <div class="sc-BrFsL iAFVK"><button class="sc-ikZpkk bwHzRF" onclick="confirmOrder()">Confirm Order</button></div>
                </div>

                <form method="post" id="orderForm">
                    <input type="hidden" id="price" name="price" value="">
                    <input type="hidden" id="product_name" name="product_name" value="">
                    <input type="hidden" id="customerName" name="customerName" value="">
                    <input type="hidden" id="customerMobile" name="customerMobile" value="">
                    <button class="btn btn-dark d-none" value="confirm_order" id="submitOrder" name="confirm_order" type="submit"></button>
                </form>
            </div>
        </div>
        <script>
            function displayAddress() {
                var addressData = localStorage.getItem('address');

                if (addressData) {
                    var address = JSON.parse(addressData);

                    var addressString = `
                Full Name: ${address.name}<br>
                Mobile Number: ${address.number}<br>
                PIN Code: ${address.pin}<br>
                City: ${address.city}<br>
                State: ${address.state}<br>
                House No./Building Name: ${address.flat}<br>
                Road/Area/Colony: ${address.area}<br>
            `;

                    var customerAddressDiv = document.querySelector('.customer-address');
                    customerAddressDiv.innerHTML = addressString;
                }
            }
            // displayAddress();

            var itemData;
            $(document).ready(function() {
                var amt = localStorage.getItem("cartTotalAmount");
                $('.price-btn').html("₹" + amt);
                $(".form-check").on('click', function() {
                    $(".form-check").removeClass('active');
                    $(this).addClass('active');
                });
            });

            let guid = () => {
                let s4 = () => {
                    return Math.floor((1 + Math.random()) * 0x10000)
                        .toString(16)
                        .substring(1);
                }
                //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
                return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4();
            }

            function confirmOrder() {
                $('#price').val(parseFloat(localStorage.getItem("cartTotalAmount")).toFixed(2));
                $('#product_name').val('items');
                var addressData = localStorage.getItem('address');
                if (addressData) {
                    var address = JSON.parse(addressData);
                    $('#customerName').val(address.name);
                    $('#customerMobile').val(address.number);
                }
                $("#submitOrder").trigger("click");
            }

            function payment_method(payType) {

                $('#price').val(parseFloat(localStorage.getItem("cartTotalAmount")).toFixed(2));
                $('#product_name').val('items');
                var addressData = localStorage.getItem('address');
                if (addressData) {
                    var address = JSON.parse(addressData);
                    $('#customerName').val(address.name);
                    $('#customerMobile').val(address.number);
                }
                $("#submitForm").trigger("click");
            }

            $(function() {
                // (Optional) Active an item if it has the class "is-active"	
                $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();

                $(".accordion .accordion-thumb").click(function() {
                    // Cancel the siblings
                    $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
                    // Toggle the item
                    $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
                });
            });
        </script>
    </div>

<?php }  ?>