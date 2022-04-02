<?php if($pageTitle=="Login" OR $this->uri->segment(1)=="signup" OR $pageTitle=="Forgot Password" OR $pageTitle=="Reset Password") {?>
<?php } else { ?>
<!-- Footer -->

  <div id="ytWidget"></div><script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=light&autoMode=false" type="text/javascript"></script>
  
<footer class="dt-footer">


   Copyright <?php echo $this->security->xss_clean($this->companyName); ?> © <?php echo date ('Y'); ?>
</footer>

<!-- /footer -->

</div>
<!-- /site content wrapper -->
</main>
</div>
</div>
<?php } ?>
<?php if($this->chatPluginActive == 1) {?>
    <?php if($this->chatPlugin == 'Tawk') {?>
        <p class="hidden" id="tawk" data-value="<?php echo 'https://embed.tawk.to/'.$this->tawkpropertyid.'/default' ?>">
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var ppid = $('#tawk').attr('data-value');   
            var Tawkurl = ppid;
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src=Tawkurl;
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    <?php }?>
<?php }?>
<script src="<?php echo base_url(); ?>assets/dist/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/lang.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/summernote/editor-summernote.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/contact.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masonry.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/sweetalert2.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/customizer.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/script.js"></script>

<!--
  <script src="//code.tidio.co/0cswhn7hwd8rpjzf3lvxa6q2hyy2dq3y.js" async></script>
  
  -->
  <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a6c595af355b44c11d0b302e3b4ba275369637fb';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</body>
</html>