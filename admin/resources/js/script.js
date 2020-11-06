$(function() {

    /**
     * validation form for post page
     */
    $(".post form").submit(function() {
        // e.preventDefault();
        var title, content, excerpt;

        title = $(".post form input[name='title']").val();
        content = $(".post form textarea[name='content']").val();
        excerpt = $(".post form input[name='excerpt']").val();
        tags = $(".post form input[name='tags']").val();

        if(title.length < 10 || title.length > 200) {
            $(".post form p.title-error").fadeIn(500);
            return false;
        }else {
            $(".post form p.title-error").fadeOut(500);
        }

        if(content.length < 500 || content.length > 10000) {
            $(".post form p.content-error").fadeIn(500);
            return false;
        }else {
            $(".post form p.content-error").fadeOut(500);
        }

        if(excerpt.length !== 0) {
            if(excerpt.length < 50 || excerpt.length > 500) {
                $(".post form p.excerpt-error").fadeIn(500);
                return false;
            }else {
                $(".post form p.excerpt-error").fadeOut(500);
            }   
        }
        
        if(tags.length < 3 || tags.length > 100) {
            $(".post form p.tags-error").fadeIn(500);
            return false;
        }else {
            $(".post form p.tags-error").fadeOut(500);
        }
        return true;
    });

    /**
     * 
     */

     
});