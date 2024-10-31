jQuery(document).ready(function(){
    
    jQuery('img').each(function(){
        $this = jQuery(this);
        var src = $this.attr('src');
        if(!src.match(/\.(jpeg|jpg|gif|png)$/)){
            $this.attr('src',ajaxobject.home+'/wp-content/plugins/sample-images/sample.jpg');
        }
    });
    
});