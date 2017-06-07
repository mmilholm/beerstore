    <link href="vendor/YTPlayer/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Share" rel="stylesheet">
    <link href="vendor/YTPlayer/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

	<div id="bgndVideo" class="player" data-property="{videoURL:'ekgzCPauXQM',containment:'body', showControls:false, autoPlay:true, loop:true, vol:0, mute:true, startAt:0,ratio:3/3, stopAt:200, opacity:1, addRaster:true, quality:'medium', optimizeDisplay:true}"></div>

	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	<script src="../vendor/YTPlayer/jquery.mb.YTPlayer.js"></script>
    <script>
    var isIframe = function() {
        var a = !1;
        try {
            self.location.href != top.location.href && ( a = !0 )
        } catch ( b ) {
            a = !0
        }
        return a
    };

    jQuery( function() {
        var should_remember = $.mbCookie.get( "YTP_should_remember" );
        if ( should_remember )
            $( "#should_remember" ).attr( "checked", "checked" );

        $( "#should_remember" ).on( "change", function() {
            if ( $( this ).is( ":checked" ) ) {
                $.mbCookie.set( "YTP_should_remember", "true", 1 );
            } else {
                $.mbCookie.remove( "YTP_should_remember" );
            }
        } );

        var myPlayer = jQuery( "#bgndVideo" ).YTPlayer( {
            remember_last_time: should_remember,
            onReady: function( player ) {
                YTPConsole.append( player.id + " player is ready" );
                YTPConsole.append( "<br>" );
            }
        } );

        var YTPConsole = jQuery( "#eventListener" );
        // EVENT: YTPStart YTPEnd YTPLoop YTPPause YTPBuffering
        myPlayer.on( "YTPStart YTPEnd YTPLoop YTPPause YTPBuffering YTPMuted YTPUnmuted", function( e ) {
            YTPConsole.append( "event: " + e.type + " (" + jQuery( "#bgndVideo" ).YTPGetPlayer().getPlayerState() + ") > time: " + e.time );
            YTPConsole.append( "<br>" );
        } );        
    } );    
    </script>