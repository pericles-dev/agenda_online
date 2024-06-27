<?php

function redirect($location, $message)
{

    $_SESSION["validation_errors"][] = $message;
    header("Location: $location");
}

function check_errors()
{
    if (isset($_SESSION["validation_errors"])) {

        foreach ($_SESSION["validation_errors"] as  $erro) {
            echo "<span style=color:orange>$erro</span>";
        }

        unset($_SESSION["validation_errors"]);
    }
}

function dd($variable)
{
    echo "<pre>";

    var_dump($variable);
}
