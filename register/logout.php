<?php
session_start();
session_destroy();
?>
<script>
    alert("Successfully logged out");
    location.replace('index.php');
</script>