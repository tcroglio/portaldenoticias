<?php

session_start();
session_destroy();
header('Location: /portaldenoticias/public/');
exit;