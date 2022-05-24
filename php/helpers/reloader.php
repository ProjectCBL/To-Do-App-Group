<?php
    // Without this script, any jquery script will not work with newly created DOM elements.
    // This script is reloaded upon every new creation of each component.
?>
<script>
    function reload_js(src) {
        $(`script[src="${src}"]`).remove();
        $('<script>').attr('src', src).appendTo('head');
    }
    reload_js("../../js/in-app-actions.js");
</script>