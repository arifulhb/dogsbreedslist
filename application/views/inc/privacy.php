<?php
$image_path=  getImagePath();
?>
<div class="row home_page">
    <div class="col-lg-2">                
        <?php
         $this->load->view('inc/top10');
        ?>
    </div>    
    <div class="col-lg-8">
        <h2 class="sec_title">Privacy Policy</h2>                           
        <p><strong>Your Privacy</strong></p>
        <p>Your privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices and the choices you can make about the way your information is collected and used. To make this notice easy to find, we make it available on our homepage and at every point where personally identifiable information may be requested.</p>

        <p><strong>Google Adsense and the DoubleClick DART Cookie</strong></p>
        <p>Google, as a third party advertisement vendor, uses cookies to serve ads on this site. The use of DART cookies by Google enables them to serve adverts to visitors that are based on their visits to this website as well as other sites on the internet.</p>

        <p>To opt out of the DART cookies you may visit the Google ad and content network privacy policy at the following url <a href="http://www.google.com/privacy_ads.html" target="_blank">http://www.google.com/privacy_ads.html</a> Tracking of users through the DART cookie mechanisms are subject to Google’s own privacy policies.</p>

        <p>Other Third Party ad servers or ad networks may also use cookies to track users activities on this website to measure advertisement effectiveness and other reasons that will be provided in their own privacy policies, Access 2 Knowledge has no access or control over these cookies that may be used by third party advertisers.</p>

        <p><strong>Collection of Personal Information</strong></p>
        <p>When visiting Access 2 Knowledge, the IP address used to access the site will be logged along with the dates and times of access. This information is purely used to analyze trends, administer the site, track users movement and gather broad demographic information for internal use. Most importantly, any recorded IP addresses are not linked to personally identifiable information.</p>

        <p><strong>Links to third party Websites</strong></p>
        <p>We have included links on this site for your use and reference. We are not responsible for the privacy policies on these websites. You should be aware that the privacy policies of these sites may differ from our own.</p>

        <p><strong>Changes to this Privacy Statement</strong></p>
        <p>The contents of this statement may be altered at any time, at our discretion.</p>

        <p>If you have any questions regarding the privacy policy of DogBreedIndex then you may contact us at admin (at) dogbreedindex.com</p>
                        
    </div>
    <div class="col-lg-2">
        <?php       
        $this->load->view('inc/sidebar');
        ?>
    </div>
</div>