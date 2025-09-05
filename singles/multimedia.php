<?php
$posttype = get_post_type();
$url = home_url() . '/' . $posttype;
header('Location: ' . $url);
