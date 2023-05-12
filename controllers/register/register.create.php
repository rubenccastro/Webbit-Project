<?php
if (isset($_SESSION['userid'])) {
    redirect('');
}
require 'views/register.view.php';