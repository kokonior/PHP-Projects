<?php
    function randomSHA256() {
        return hash('sha256', date("Y-m-d H:i:s"));
    }

    echo randomSHA256();
