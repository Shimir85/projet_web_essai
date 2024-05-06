<?php
if(!isset($_SESSION['LogOk'])) header("Location: index.php");
else if(!$_SESSION['LogOk']) header("Location: index.php");
include "exception.php";
