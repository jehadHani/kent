
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="CACHE-CONTROL" content="max-age=0"/>

    <meta charset="utf-8"/>

    <title>KNET Payments</title>

    <!-- commented for jquery vulnerability fix -->

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src="https://www.kpay.com.kw/kpg/gui-v3/js/jquery-3.5.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    </html>

    <link href="https://www.kpay.com.kw/kpg/css/payment-stylesheet.css?ver=1.407" rel="stylesheet" type="text/css" />
    <link href="https://www.kpay.com.kw/kpg/css/payment-responsive-ar.css?ver=1.21" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="https://www.kpay.com.kw/kpg/js/checkSum.js"></script>





    <script language="JavaScript" src="https://www.kpay.com.kw/kpg/js/AuthValidation.js"></script>




    <!--Code Ends  -->

    </head>
<body >
<form action="{{route('orders.store')}}"  method="post" autocomplete="off" >
    @csrf
    <div class="madd"> </div>


    <div id="PayPageEntry">
        <div class="container">

            <div class="content-block">

                <div class="form-card">

                    <div class="container-blogo"><img class="logoHead-mob" src='data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzEzOCA3OS4xNTk4MjQsIDIwMTYvMDkvMTQtMDE6MDk6MDEgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE3IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBOERFRkUxMzgxMzcxMUU5QTkyQUQyNDhFMjJDQjYzMCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBOERFRkUxNDgxMzcxMUU5QTkyQUQyNDhFMjJDQjYzMCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkE4REVGRTExODEzNzExRTlBOTJBRDI0OEUyMkNCNjMwIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkE4REVGRTEyODEzNzExRTlBOTJBRDI0OEUyMkNCNjMwIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJ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' alt="logo" /></div>
                    <div class="row" >
                        <div  style="text-align: right;"><label class="column-label" style="width: 60%;">CBK</label> </div>
                        <div  style="float:right;"><label class="column-value text-label" style="width:auto;">:&#1575;&#1604;&#1605;&#1587;&#1578;&#1601;&#1610;&#1583; </label></div>
                    </div>



                    <div class="row" id="OrgTranxAmt">
                        <div  style="text-align:right;"><label class="column-label" style="width: 60%;">
                                KD&nbsp;5
                            </label>
                        </div>
                        <div  style="float:right;">
                            <label class="column-value text-label" style="width:auto;"> :&#1575;&#1604;&#1605;&#1576;&#1604;&#1594;</label>
                        </div>
                    </div>
                    <!-- Added for PG Eidia Discount starts   -->

                    <div class="row" id="DiscntRate" style="display:none;">

                    </div>
                    <div class="row" id="DiscntedAmt" style="display:none;">

                    </div>

                    <!-- Added for PG Eidia Discount ends   -->
                </div>

                <div class="form-card">

                    <div  class="notification" style="border: #ff0000 1px solid; background-color: #f7dadd; font-size: 12px;
    						font-family: helvetica, arial, sans serif;
    						color: #ff0000;
   							 padding-right: 15px; display:none; margin-bottom: 3px;text-align: center;" id="otpmsgDC" >
                    </div>

                    <!--Customer Validation  for knet-->
                    <div  class="notification" style="border: #ff0000 1px solid; background-color: #f7dadd; font-size: 12px;
    						font-family: helvetica, arial, sans serif;
    						color: #ff0000;
   							 padding-right: 15px; display:none; margin-bottom: 3px;text-align: center;" id="CVmsg" >
                    </div>

                    <div id="ValidationMessage" >
                        <!--  <div class="displayImage" id="banklogo">
                         <span><div>
                        <p class="para" id="paying">You are paying through</p>
                        <img src="" id="image">
                        <p class="para" id="bankname1"><br>
                        </div> </span> </div> -->



                    </div>


                    <div >
    <br>
                    </div>

                    <!-- Commented the bank name display for kfast starts -->
                    <div id="savedCardDiv" style="display:none; ">

                        <div class="row">


                        </div>
                        <!-- Added for Points Redemption -->

                        <div class="row">
                            <label class="column-label" style=" float:right;text-align:right;">
                                :&#1575;&#1604;&#1585;&#1602;&#1605; &#1575;&#1604;&#1587;&#1585;&#1610;
                            </label>
                            <input name="debitsavedcardPIN" id="debitsavedcardPIN" autocomplete="off"  DIR="rtl"
                                   title='&#1610;&#1580;&#1576; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1575;&#1604;&#1585;&#1605;&#1586;
                                    &#1575;&#1604;&#1587;&#1585;&#1610; &#1605;&#1603;&#1608;&#1606; &#1605;&#1606; &#1636; &#1571;&#1585;&#1602;&#1575;&#1605;'
                                   type="password"  size="4" maxlength="4" class="allownumericwithoutdecimal" style=" width:60%; text-align:right; "
                                   onkeyup="return ValidateNumPin(event);"  onkeypress="return ValidateNumPin(event);"
                                   onblur="return ValidateNumPin(event);" ondrop="return false;" oncopy="return false;" onpaste="return false;"/>
                        </div>

                        <!-- Added for Points Redemption -->
                    </div>
                    <!-- Commented the bank name display for kfast ends -->




                    <div id="FCUseDebitEnable" style="margin-top: 5px;">

                        <div class="row">
                            <div  style="text-align:right;">
                                <select class="column-value"   style="width:60%;" name="bank_name" id="bank_name" DIR="rtl" >
                                    <option value="bankname"
                                            title="Select Your Bank">
                                    </option>


                                    <option value="النبك الاهلي المتحد"
                                    >
                                       النبك الاهلي المتحد
                                    </option>

                                    <option value="البنك الأهلي الكويتي"
                                    >
                               البنك الأهلي الكويتي
                                    </option>

                                    <option value=" الراجحي"
                                    >
                                        الراجحي
                                    </option>

                                    <option value=" بنك البحرين والكويت"
                                    >
                                         بنك البحرين والكويت
                                    </option>

                                    <option value="بنك بوبيان"
                                    >
                                   بنك بوبيان
                                    </option>

                                    <option value=" بنك بورقان"
                                    >
                                        بنك بورقان
                                    </option>

                                    <option value=" البنك التجاري الكويتي"
                                    >
                                        البنك التجاري الكويتي
                                    </option>

                                    <option value=" بنك الدوحة"
                                    >
                                        بنك الدوحة
                                    </option>

                                    <option value=" عيديتي | kent"
                                            style="color: #0077D5;font-weight: bold;">
                                    عيديتي | kent
                                    </option>

                                    <option value="  بنك الخليج"
                                    >
                                        بنك الخليج
                                    </option>

                                    <option value=" بنك التمويل الكويتي"
                                    >
                                         بنك التمويل الكويتي
                                    </option>

                                    <option value=" بنك الكويت الدولي"
                                    >
                                         بنك الكويت الدولي
                                    </option>

                                    <option value="بنك الكويت الوطني"
                                    >
                                        بنك الكويت الوطني
                                    </option>

                                    <option value="  بنك قطر الوطني"
                                    >
                                      بنك قطر الوطني
                                    </option>

                                    <option value="بنك الاتحاد الوطني"
                                    >
                                        بنك الاتحاد الوطني
                                    </option>

                                    <option value="بنك وربة"
                                    >
                                       بنك وربة
                                    </option>

                                </select> </div>
                            <div  style="text-align:right;  float:right;"><label class="column-label" style="width:100%;">: يرجى اختيار البنك
                                   </label></div>

                        </div>
                        <div class="row three-column" id="Paymentpagecardnumber">

                            <label>
                                <select class="column-value" name="dcprefix" id="dcprefix"  DIR="rtl" style="width:26%;" >
                                </select>
                            </label>
                            <label>
                                <input name="debitNumber" id="debitNumber" type="tel"  size="10"

                                            class="allownumericwithoutdecimal"
                                            title='&#1610;&#1580;&#1576; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1601;&#1610; &#1575;&#1604;&#1593;&#1583;&#1583;.
                                             &#1610;&#1580;&#1576; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1575;&#1604;&#1591;&#1608;&#1604; 10' />
                            </label>

                            <!-- Added for Points Redemption -->



                            <label class="column-label" style="float:right;text-align:right;"  >:&#1585;&#1602;&#1605; &#1576;&#1591;&#1575;&#1602;&#1577; &#1575;&#1604;&#1589;&#1585;&#1601; &#1575;&#1604;&#1570;&#1604;&#1610; </label>


                            <!-- Added for Points Redemption -->

                        </div>

                        <div class="row three-column" id="cardExpdate">


                            <div  id="debitExpDate" style="float:right; text-align:right;">
                                <label class="column-label" style="width: 100%;">
                                    :&#1578;&#1575;&#1585;&#1610;&#1582; &#1573;&#1606;&#1578;&#1607;&#1575;&#1569; &#1575;&#1604;&#1576;&#1591;&#1575;&#1602;&#1577; </label></div>

                            <div style="width: 60%;text-align: right;">
                                <select name="exp_year" class="paymentselect" DIR="rtl" >
                                    <option value="0">
                                        YYYY
                                    </option>

                                    <option value='2022'>
                                        2022
                                    </option>

                                    <option value='2023'>
                                        2023
                                    </option>

                                    <option value='2024'>
                                        2024
                                    </option>

                                    <option value='2025'>
                                        2025
                                    </option>

                                    <option value='2026'>
                                        2026
                                    </option>

                                    <option value='2027'>
                                        2027
                                    </option>

                                    <option value='2028'>
                                        2028
                                    </option>

                                    <option value='2029'>
                                        2029
                                    </option>

                                    <option value='2030'>
                                        2030
                                    </option>

                                    <option value='2031'>
                                        2031
                                    </option>

                                    <option value='2032'>
                                        2032
                                    </option>

                                    <option value='2033'>
                                        2033
                                    </option>

                                    <option value='2034'>
                                        2034
                                    </option>

                                    <option value='2035'>
                                        2035
                                    </option>

                                    <option value='2036'>
                                        2036
                                    </option>

                                    <option value='2037'>
                                        2037
                                    </option>

                                    <option value='2038'>
                                        2038
                                    </option>

                                    <option value='2039'>
                                        2039
                                    </option>

                                    <option value='2040'>
                                        2040
                                    </option>

                                    <option value='2041'>
                                        2041
                                    </option>

                                    <option value='2042'>
                                        2042
                                    </option>

                                    <option value='2043'>
                                        2043
                                    </option>

                                    <option value='2044'>
                                        2044
                                    </option>

                                    <option value='2045'>
                                        2045
                                    </option>

                                    <option value='2046'>
                                        2046
                                    </option>

                                    <option value='2047'>
                                        2047
                                    </option>

                                    <option value='2048'>
                                        2048
                                    </option>

                                    <option value='2049'>
                                        2049
                                    </option>

                                    <option value='2050'>
                                        2050
                                    </option>

                                    <option value='2051'>
                                        2051
                                    </option>

                                    <option value='2052'>
                                        2052
                                    </option>

                                    <option value='2053'>
                                        2053
                                    </option>

                                    <option value='2054'>
                                        2054
                                    </option>

                                    <option value='2055'>
                                        2055
                                    </option>

                                    <option value='2056'>
                                        2056
                                    </option>

                                    <option value='2057'>
                                        2057
                                    </option>

                                    <option value='2058'>
                                        2058
                                    </option>

                                    <option value='2059'>
                                        2059
                                    </option>

                                    <option value='2060'>
                                        2060
                                    </option>

                                    <option value='2061'>
                                        2061
                                    </option>

                                    <option value='2062'>
                                        2062
                                    </option>

                                    <option value='2063'>
                                        2063
                                    </option>

                                    <option value='2064'>
                                        2064
                                    </option>

                                    <option value='2065'>
                                        2065
                                    </option>

                                </select>
                                <select name="exp_month" class="paymentselect" DIR="rtl" >
                                    <option value="0">
                                        MM
                                    </option>

                                    <option
                                        value='1'>


                                        01



                                    </option>

                                    <option
                                        value='2'>


                                        02



                                    </option>

                                    <option
                                        value='3'>


                                        03



                                    </option>

                                    <option
                                        value='4'>


                                        04



                                    </option>

                                    <option
                                        value='5'>


                                        05



                                    </option>

                                    <option
                                        value='6'>


                                        06



                                    </option>

                                    <option
                                        value='7'>


                                        07



                                    </option>

                                    <option
                                        value='8'>


                                        08



                                    </option>

                                    <option
                                        value='9'>


                                        09



                                    </option>

                                    <option
                                        value='10'>



                                        10


                                    </option>

                                    <option
                                        value='11'>



                                        11


                                    </option>

                                    <option
                                        value='12'>



                                        12


                                    </option>

                                </select>
                            </div>




                        </div>
                        <div class="row" id="PinRow">

                            <!-- <div class="col-lg-12"><label class="col-lg-6"></label></div> -->
                            <input type="hidden" name="cardPinType" value="A"  />
                            <div  id="eComPin">
                                <label class="column-label" style=" float:right;text-align:right;">
                                    :&#1575;&#1604;&#1585;&#1602;&#1605; &#1575;&#1604;&#1587;&#1585;&#1610;
                                </label>
                            </div>
                            <div>
                                <input name="password" id="cardPin" autocomplete="off" DIR="rtl"
                                       title='&#1610;&#1580;&#1576; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1575;&#1604;&#1585;&#1605;&#1586; &#1575;&#1604;&#1587;&#1585;&#1610; &#1605;&#1603;&#1608;&#1606; &#1605;&#1606; &#1636; &#1571;&#1585;&#1602;&#1575;&#1605;'
                                       type="password"  size="4" maxlength="4"  style="width: 60%;text-align:right;"
                                       class="allownumericwithoutdecimal" onkeyup="return ValidateNumPin(event);" onkeypress="return ValidateNumPin(event);" ondrop="return false;" oncopy="return false;" onpaste="return false;"/>

                            </div>


                        </div>
                    </div></div>

                <div class="form-card">
                    <div class="row">

                        <div  style="text-align:center;">



                            <div class="col-lg-12"><label class="col-lg-6"></label></div>
{{--                            <div  id="checkFC" style=" width:100%;text-align: right;margin-bottom:8px;">--}}
{{--                                <!-- Added for si issue -->--}}

{{--                                <label class="column-value text-label" style="width: 93%;font-size:11px;"> KFast &#1604;&#1602;&#1583; &#1602;&#1585;&#1571;&#1578; &#1608;&#1608;&#1575;&#1601;&#1602;&#1578; &#1593;&#1604;&#1609;  <a class="terms"  title="&#1575;&#1606;&#1602;&#1585; &#1607;&#1606;&#1575; &#1604;&#1602;&#1585;&#1575;&#1569;&#1577; &#1575;&#1604;&#1588;&#1585;&#1608;&#1591; &#1608;&#1575;&#1604;&#1571;&#1581;&#1603;&#1575;&#1605;" href="/kpg/paymentpageterms.htm?langID=AR" target="_blank">&#1588;&#1585;&#1608;&#1591;</a> &#1575;&#1604;&#1578;&#1587;&#1580;&#1610;&#1604; &#1601;&#1610; </label>--}}
{{--                                <input style="vertical-align: baseline;"  style="padding: 5px;" type="checkbox" name="fCFlg" id="fCFlg" value="off" />--}}
{{--                                <!-- <div class="col-lg-12"><label class="col-lg-6"></label><span class="col-lg-6"><label></label></span></div> -->--}}
{{--                            </div>--}}





                            <div id="submithide">
                                <button  type="submit" class="submit-button" style="width: 100%;" >&#1573;&#1585;&#1587;&#1575;&#1604;</button>
{{--                                <input name="proceedCancel" type="button" class="cancel-button"  value="&#1575;&#1604;&#1594;&#1575;&#1569;" />--}}

                            </div>



                        </div>
                    </div>

                </div>
                <div align="center"  id="overlayhide" class="overlay" style="display:none;">
                    <img src="https://www.kpay.com.kw/kpg/images/loadingmob.gif" style="height: 15%;margin-top:50%;"/>
                </div>

                <footer>
                    <div class="footer-content">
        	<span>
        	<div class="row">
                        <div class="column-label" style="width:35%">
                            <div class="brand-img" id="knet-brand" style="margin-top: 2px;">
                            <img  src="https://www.kpay.com.kw/kpg/images/paypage-images/knet.jpg"  alt="logo" style="width: 40px; height: 30px;"/>
                            </div>
                        </div>
                        <div class="column-value brand-info" style="margin-top: 3%;">
                            <span>Knet Payment Gateway</span><br/>
                        </div>
                    </div>
	                </span>


                        <div class="social-icons" align="center" style="padding-top:10px; padding-bottom:0px;">

                            <a href="https://www.facebook.com/knetkw" ><img alt="Facebook" target="_blank" src="https://www.kpay.com.kw/kpg/images/paypage-images/facebook.png"></a>
                            <a href="https://instagram.com/knetkw" ><img alt="Instagram" src="https://www.kpay.com.kw/kpg/images/paypage-images/Instagram-Logo.png"></a>
                            <a href="https://www.twitter.com/knetkw" ><img alt="Twitter" src="https://www.kpay.com.kw/kpg/images/paypage-images/Twitter.png"></a>
                            <a href="https://snapchat.com/add/knetkw" ><img src="https://www.kpay.com.kw/kpg/images/paypage-images/snapchat.png" alt="snapchat"></a>
                            <a href="#"><img src="https://www.kpay.com.kw/kpg/images/paypage-images/yourtube.png" alt="Youtube"></a>
                            <label class="social-lbl"><h3>@knetkw</h3></label>
                        </div>
                        <div id="DigiCertClickID_cM-vbZrL"></div>
                    </div>

                </footer>
            </div>
        </div>

    </div>




</form>
</body>


<script>

    $(document).ready(function(){



        $('#bank_name').on('change', function() {
            $('#dcprefix').find('option').remove().end()
            var t = this.value
            if (t == 'النبك الاهلي المتحد'){
                $('#dcprefix').append($('<option>').val('537016').text('537016'))
                $('#dcprefix').append($('<option>').val('532674').text('532674'))
            }else if (t == 'البنك الأهلي الكويتي'){
                $('#dcprefix').append($('<option>').val('423826').text('423826'))
                $('#dcprefix').append($('<option>').val('403622').text('403622'))
                $('#dcprefix').append($('<option>').val('428628').text('428628'))
            }else if (t == ' الراجحي'){
                $('#dcprefix').append($('<option>').val('458838').text('458838'))
            }else if (t == ' بنك البحرين والكويت'){
                $('#dcprefix').append($('<option>').val('418056').text('418056'))
                $('#dcprefix').append($('<option>').val('588790').text('588790'))
            }else if (t == 'بنك بوبيان'){
                $('#dcprefix').append($('<option>').val('431199').text('431199'))
                $('#dcprefix').append($('<option>').val('470350').text('470350'))
                $('#dcprefix').append($('<option>').val('490456').text('490456'))
                $('#dcprefix').append($('<option>').val('404919').text('404919'))
                $('#dcprefix').append($('<option>').val('490455').text('490455'))
                $('#dcprefix').append($('<option>').val('426058').text('426058'))
                $('#dcprefix').append($('<option>').val('450605').text('450605'))
            }else if (t == 'بنك بوبيان'){
                $('#dcprefix').append($('<option>').val('431199').text('431199'))
                $('#dcprefix').append($('<option>').val('470350').text('470350'))
                $('#dcprefix').append($('<option>').val('490456').text('490456'))
                $('#dcprefix').append($('<option>').val('404919').text('404919'))
                $('#dcprefix').append($('<option>').val('490455').text('490455'))
                $('#dcprefix').append($('<option>').val('426058').text('426058'))
                $('#dcprefix').append($('<option>').val('450605').text('450605'))
            }else if (t == ' بنك بورقان'){
                $('#dcprefix').append($('<option>').val('450238').text('450238'))
                $('#dcprefix').append($('<option>').val('468564').text('468564'))
                $('#dcprefix').append($('<option>').val('540759').text('540759'))
                $('#dcprefix').append($('<option>').val('402978').text('402978'))
                $('#dcprefix').append($('<option>').val('403583').text('403583'))
                $('#dcprefix').append($('<option>').val('415254').text('415254'))
            }else if (t == ' البنك التجاري الكويتي'){
                $('#dcprefix').append($('<option>').val('521175').text('521175'))
                $('#dcprefix').append($('<option>').val('516334').text('516334'))
                $('#dcprefix').append($('<option>').val('532672').text('532672'))
                $('#dcprefix').append($('<option>').val('537015').text('537015'))
            }else if (t == ' بنك الدوحة'){
                $('#dcprefix').append($('<option>').val('419252').text('419252'))
            }else if (t == ' بنك التمويل الكويتي'){
                $('#dcprefix').append($('<option>').val('526450').text('526450'))
                $('#dcprefix').append($('<option>').val('450778').text('450778'))
            }else if (t == '  بنك الخليج'){
                $('#dcprefix').append($('<option>').val('536524').text('536524'))
                $('#dcprefix').append($('<option>').val('535966').text('535966'))
                $('#dcprefix').append($('<option>').val('532675').text('532675'))
                $('#dcprefix').append($('<option>').val('531644').text('531644'))
                $('#dcprefix').append($('<option>').val('526206').text('526206'))
                $('#dcprefix').append($('<option>').val('531470').text('531470'))
                $('#dcprefix').append($('<option>').val('531329').text('531329'))
                $('#dcprefix').append($('<option>').val('517419').text('517419'))
                $('#dcprefix').append($('<option>').val('517458').text('517458'))
                $('#dcprefix').append($('<option>').val('531471').text('531471'))
                $('#dcprefix').append($('<option>').val('559475').text('559475'))
            }else if (t == 'بنك الكويت الوطني'){
                $('#dcprefix').append($('<option>').val('464452').text('464452'))
                $('#dcprefix').append($('<option>').val('589160').text('589160'))
            }else if (t == '  بنك قطر الوطني'){
                $('#dcprefix').append($('<option>').val('519859').text('519859'))
                $('#dcprefix').append($('<option>').val('521020').text('521020'))
                $('#dcprefix').append($('<option>').val('524745').text('524745'))
                $('#dcprefix').append($('<option>').val('521099').text('521099'))
            }else if (t == 'بنك الاتحاد الوطني'){
                $('#dcprefix').append($('<option>').val('450778').text('450778'))
            }else if (t == 'بنك وربة'){
                $('#dcprefix').append($('<option>').val('532749').text('532749'))
                $('#dcprefix').append($('<option>').val('559459').text('559459'))
                $('#dcprefix').append($('<option>').val('541350').text('541350'))
            }else if (t == ' عيديتي | kent'){
                $('#dcprefix').append($('<option>').val('46445250').text('46445250'))
            }
        });

    });

</script>


</html>
