
<div>
    
</div>
<script src="<?php echo $js;?>jquery-3.6.0.min.js"></script>
<script src="<?php echo $js;?>bootstrap.js"></script>
<script src="<?php echo $js;?>jquery-ui.min.js"></script>
<script src="<?php echo $js;?>jquery.selectBoxIt.min.js"></script>
<script src="<?php echo $js;?>popper.min.js"></script>
<script src="<?php echo $js;?>frontend.js"></script>
<script>
    $(function() {

    $(".live").keyup(function() {
         $($(this).data('class')).text($(this).val());
    }); 

});
</script>
</body>

</html>






















