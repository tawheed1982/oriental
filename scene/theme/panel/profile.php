<?php

if (isset($this->row['id'])) {
    getPage('header');
    getPage('navbar');
    echo '<div class="jumbotron">';
    echo $this->row['username'];
    echo '</div>';
    getPage('footer');
} else {
    header("Location: http://192.168.0.25:8081/fwf/index/index");
}

?>