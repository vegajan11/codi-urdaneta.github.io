<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>
<body>
<?php include_once 'navigator.php'; ?>
<?php include_once 'header.php'; ?>


<section class="mbr-section mbr-parallax-background" id="content5-3" style="background-image: url(assets/images/stream.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <h3 class="mbr-section-title display-4">BACKGROUND IMAGE</h3>
        <div class="lead"><p>Background image with solid color overlay and parallax effect. Develop fully responsive, mobile-ready websites that look amazing on any devices and browsers. Preview how your website will appear on phones, tablets and desktops directly in the visual editor.</p></div>
    </div>

</section>

<section class="mbr-section" id="form1-5" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-4">PRAYER REQUEST</h3>
                    <small class="mbr-section-subtitle">Pray at all times in the Spirit with every prayer and request, and stay alert in this with all perseverance and intercession for all the saints..</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


                    


                    <form action="#" method="post">

                        

                        <div class="row row-sm-offset">

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-5-name">Name</label>
                                    <input type="text" class="form-control" name="name" data-form-field="Name" id="form1-5-name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-5-phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="form1-5-phone">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="form1-5-message">Prayer Request</label>
                            <textarea class="form-control" name="message" rows="7" data-form-field="Message" id="form1-5-message"></textarea>
                        </div>

                        <div><button type="submit" class="btn btn-primary pull-xs-right">SEND</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'foot.php'; ?>
<?php include_once 'footer.php'; ?>


  <input name="animation" type="hidden">
  </body>
</html>