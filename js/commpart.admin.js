jQuery(document).ready(function($) {
    var mediaUploader;

    $( '.upload-button' ).on('click', function(e){
        e.preventDefault();
        if( mediaUploader ) {
            mediaUploader.open();
            return;
        }

        title = 'Choose a picture';
        text = "Choose Picture";
        multi = false;
        if ( $( this ).hasClass('pdf') ) {
            title = 'Choose a Document';
            text = "Choose PDF";
        }
        if ( $( this ).hasClass('logo') ) {
            title = 'Choose a Logo';
            text = "Choose Picture";
        }
        if ( $( this ).hasClass('map') ) {
            title = 'Choose a Map';
            text = "Choose Picture";
        }
        if ( $( this ).hasClass('album') ) {
            title = 'Choose photos for album'
            text = "Use Selected Photos"
            multi = true;
        }

        input = $( this ).next();

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: title,
            button: {
                text: text
            },
            multiple: multi
        });
        mediaUploader.on('select', function(){
            attachment =  mediaUploader.state().get('selection').first().toJSON();
            //save url to form input
            input.val(attachment.url);
        });

        mediaUploader.open();
    });

    // unhide form
    $( '.form-table' ).first().css('opacity', '1');

    // staff and board interaction
    current_staff = $( '#current_staff' ).val();

    $( '.form-table' ).first().prev().css('opacity', '1');
    $( '#current_staff' ).on('click', function(e) {
        n = $( this ).val()
        if( $( this ).val() === current_staff ) {return;}
        //exchange and update current staff - no data is lost/ just hidden
        $( '.form-table' ).css( 'opacity', '0' );
        $( 'h2' ).css( 'opacity', '0' );
        table = $( '.form-table' ).first();
        i=0;
        while (  i<n ) {
            table = table.next();
            table = table.next();
            i++;
        }
        table.css( 'opacity', '1' );
        table.prev().css( 'opacity', '1' );
        console.log(n);
        current_staff = $( '#current_staff' ).val();
    });

    // links and partners interaction
    current_partner = $( '#current_partner' );

    $( '.form-table' )
});