<?php
date_default_timezone_set('Asia/Tokyo');
$datetime = new DateTime();
$now = $datetime->format('Y-m-d h:i:s');
$today = $datetime->format('Y-m-d');