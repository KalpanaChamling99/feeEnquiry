
jQuery(document).ready(function(e){
    var header = document.getElementById("nav");
    var sticky = header.offsetTop;
    jQuery(window).scroll(function(){
        if(window.pageYOffset > sticky){
            header.classList.add("sticky");  
        }else{
            header.classList.remove("sticky");  
        }
    
    });

    var windowHeight = jQuery(window).height();
    var headerHeight = jQuery('#header').innerHeight();
    var navHeight = jQuery('#nav').innerHeight(); 
    var footerHeight = jQuery('#footer').innerHeight();
    var KcmitInnerGapHeight = windowHeight - (headerHeight + navHeight + footerHeight);
    jQuery('.kcmit-min-height').css('min-height', KcmitInnerGapHeight + 'px');

    
})
