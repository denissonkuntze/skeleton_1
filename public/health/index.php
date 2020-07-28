<?php

unset($_ENV['DB_PATH_DBTABLES']);
unset($_ENV['DB_ADAPTER']);

if (isset($_GET['phpinfo']) AND ($_GET['hash'] == '29db9beda34a3d59f1088042cc25df4d')) {
    echo phpinfo();
} else {
    echo 'OK';
}
