<?php
    function getHoverableRating(int $rating) {
        switch ($rating) {
            case 1:
                getRating1();
                break;
        }
    }

    function getRating1() {
        echo '
        <form action


        ';
    }

    function getWholeStar() {
        return '<i class="fa-solid fa-star-half fa-xl rating-star"></i><i class="fa-solid fa-star-half fa-flip-horizontal fa-xl"></i>';
    }

    function getHalfStar() {
        return '<i class="fa-solid fa-star-half fa-xl rating-star"></i><i class="fa-regular fa-star-half fa-flip-horizontal fa-xl"></i>';
    }

    function getEmptyStar() {
        return '<i class="fa-regular fa-star-half fa-xl rating-star"></i><i class="fa-regular fa-star-half fa-flip-horizontal fa-xl"></i>';
    }
?>