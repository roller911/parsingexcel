<?php
session_start();
unset($_SESSION['teachers']);
header('Location: ../../index.php?page=index_profile');