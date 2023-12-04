<?php
session_start();

session_destroy();
session_unset();

echo "
<script>
  alert('berhasil logout')
</script>
";

header("Location: login.php");
exit;
