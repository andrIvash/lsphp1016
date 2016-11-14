<?php
 $file = $_FILES['file'];

if ($file['type'] == 'image/png') {
    echo 'ok';
}

