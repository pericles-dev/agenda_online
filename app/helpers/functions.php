<?php


function set_message($name, $message, $type, $location = null)
{
    $notfication = "<span class='$type'>$message<span>";

    $_SESSION["validate_notifications"][$name] = $notfication;

    if (isset($location)) {
        header("Location: $location");
    }
}

function get_message($name)
{
    $error = $_SESSION["validate_notifications"][$name];

    if (isset($error)) {
        unset($_SESSION["validate_notifications"][$name]);
        return $error;
    }
}

// function check_if_user_is_logged()
// {
//     if (isset($_SESSION["user_id"])) {
//         redirect("/", "");
//     }
// }

function dd($variable)
{
    echo "<pre>";

    var_dump($variable);

    die();
}
