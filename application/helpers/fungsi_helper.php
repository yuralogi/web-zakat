<?php

function isLogin()
{
    $ci = &get_instance();

    $userSession = $ci->session->userdata('id_user');

    if ($userSession) {
        redirect('admin/dashboard');
    }
}

function notLogin()
{
    $ci = &get_instance();

    $userSession = $ci->session->userdata('id_user');

    if (!$userSession) {
        redirect('auth');
    }
}