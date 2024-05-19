@props([
    "class",
])

<div class="stars {{ $class }}">
    <div class="night">
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
        <div class="shooting_star"></div>
    </div>
</div>

<style>
    .stars {
        background: radial-gradient(
            ellipse at bottom,
            #222823 0%,
            #090a0f 100%
        );
        height: 100%;
        overflow: hidden;
        display: flex;
        font-family: 'Anton', sans-serif;
        justify-content: center;
        align-items: center;
    }
    .night {
        position: relative;
        width: 100%;
        height: 100%;
        transform: rotateZ(45deg);
    }
    .shooting_star {
        position: absolute;
        left: 50%;
        top: 50%;
        height: 2px;
        background: linear-gradient(
            -45deg,
            rgba(128, 232, 139, 1),
            rgba(0, 0, 255, 0)
        );
        border-radius: 999px;
        filter: drop-shadow(0 0 6px rgba(105, 155, 255, 1));
        animation:
            tail 3000ms ease-in-out infinite,
            shooting 3000ms ease-in-out infinite;
    }
    .shooting_star::before {
        content: '';
        position: absolute;
        top: calc(50% - 1px);
        right: 0;
        height: 2px;
        background: linear-gradient(
            -45deg,
            rgba(0, 0, 255, 0),
            rgba(13, 214, 35, 1),
            rgba(0, 0, 255, 0)
        );
        transform: translateX(50%) rotateZ(45deg);
        border-radius: 100%;
        animation: shining 3000ms ease-in-out infinite;
    }
    .shooting_star::after {
        content: '';
        position: absolute;
        top: calc(50% - 1px);
        right: 0;
        height: 2px;
        background: linear-gradient(
            -45deg,
            rgba(0, 0, 255, 0),
            rgba(13, 214, 35, 1),
            rgba(0, 0, 255, 0)
        );
        transform: translateX(50%) rotateZ(45deg);
        border-radius: 100%;
        animation: shining 3000ms ease-in-out infinite;
        transform: translateX(50%) rotateZ(-45deg);
    }
    .shooting_star:nth-child(1) {
        top: calc(50% - 92px);
        left: calc(50% - 271px);
        animation-delay: 1195ms;
    }
    .shooting_star:nth-child(1)::before,
    .shooting_star:nth-child(1)::after {
        animation-delay: 1195ms;
    }
    .shooting_star:nth-child(2) {
        top: calc(50% - 132px);
        left: calc(50% - 63px);
        animation-delay: 4315ms;
    }
    .shooting_star:nth-child(2)::before,
    .shooting_star:nth-child(2)::after {
        animation-delay: 4315ms;
    }
    .shooting_star:nth-child(3) {
        top: calc(50% - -55px);
        left: calc(50% - 120px);
        animation-delay: 5874ms;
    }
    .shooting_star:nth-child(3)::before,
    .shooting_star:nth-child(3)::after {
        animation-delay: 5874ms;
    }
    .shooting_star:nth-child(4) {
        top: calc(50% - 173px);
        left: calc(50% - 248px);
        animation-delay: 8034ms;
    }
    .shooting_star:nth-child(4)::before,
    .shooting_star:nth-child(4)::after {
        animation-delay: 8034ms;
    }
    .shooting_star:nth-child(5) {
        top: calc(50% - 112px);
        left: calc(50% - 73px);
        animation-delay: 1570ms;
    }
    .shooting_star:nth-child(5)::before,
    .shooting_star:nth-child(5)::after {
        animation-delay: 1570ms;
    }
    .shooting_star:nth-child(6) {
        top: calc(50% - 107px);
        left: calc(50% - 46px);
        animation-delay: 3222ms;
    }
    .shooting_star:nth-child(6)::before,
    .shooting_star:nth-child(6)::after {
        animation-delay: 3222ms;
    }
    .shooting_star:nth-child(7) {
        top: calc(50% - -95px);
        left: calc(50% - 125px);
        animation-delay: 9507ms;
    }
    .shooting_star:nth-child(7)::before,
    .shooting_star:nth-child(7)::after {
        animation-delay: 9507ms;
    }
    .shooting_star:nth-child(8) {
        top: calc(50% - 191px);
        left: calc(50% - 283px);
        animation-delay: 5985ms;
    }
    .shooting_star:nth-child(8)::before,
    .shooting_star:nth-child(8)::after {
        animation-delay: 5985ms;
    }
    .shooting_star:nth-child(9) {
        top: calc(50% - -63px);
        left: calc(50% - 123px);
        animation-delay: 7402ms;
    }
    .shooting_star:nth-child(9)::before,
    .shooting_star:nth-child(9)::after {
        animation-delay: 7402ms;
    }
    .shooting_star:nth-child(10) {
        top: calc(50% - -5px);
        left: calc(50% - 169px);
        animation-delay: 3939ms;
    }
    .shooting_star:nth-child(10)::before,
    .shooting_star:nth-child(10)::after {
        animation-delay: 3939ms;
    }
    .shooting_star:nth-child(11) {
        top: calc(50% - 38px);
        left: calc(50% - 87px);
        animation-delay: 8501ms;
    }
    .shooting_star:nth-child(11)::before,
    .shooting_star:nth-child(11)::after {
        animation-delay: 8501ms;
    }
    .shooting_star:nth-child(12) {
        top: calc(50% - -185px);
        left: calc(50% - 4px);
        animation-delay: 4969ms;
    }
    .shooting_star:nth-child(12)::before,
    .shooting_star:nth-child(12)::after {
        animation-delay: 4969ms;
    }
    .shooting_star:nth-child(13) {
        top: calc(50% - 68px);
        left: calc(50% - 247px);
        animation-delay: 7037ms;
    }
    .shooting_star:nth-child(13)::before,
    .shooting_star:nth-child(13)::after {
        animation-delay: 7037ms;
    }
    .shooting_star:nth-child(14) {
        top: calc(50% - 177px);
        left: calc(50% - 196px);
        animation-delay: 8954ms;
    }
    .shooting_star:nth-child(14)::before,
    .shooting_star:nth-child(14)::after {
        animation-delay: 8954ms;
    }
    .shooting_star:nth-child(15) {
        top: calc(50% - 195px);
        left: calc(50% - 228px);
        animation-delay: 1346ms;
    }
    .shooting_star:nth-child(15)::before,
    .shooting_star:nth-child(15)::after {
        animation-delay: 1346ms;
    }
    .shooting_star:nth-child(16) {
        top: calc(50% - -162px);
        left: calc(50% - 109px);
        animation-delay: 7230ms;
    }
    .shooting_star:nth-child(16)::before,
    .shooting_star:nth-child(16)::after {
        animation-delay: 7230ms;
    }
    .shooting_star:nth-child(17) {
        top: calc(50% - -119px);
        left: calc(50% - 43px);
        animation-delay: 4642ms;
    }
    .shooting_star:nth-child(17)::before,
    .shooting_star:nth-child(17)::after {
        animation-delay: 4642ms;
    }
    .shooting_star:nth-child(18) {
        top: calc(50% - -46px);
        left: calc(50% - 29px);
        animation-delay: 4988ms;
    }
    .shooting_star:nth-child(18)::before,
    .shooting_star:nth-child(18)::after {
        animation-delay: 4988ms;
    }
    .shooting_star:nth-child(19) {
        top: calc(50% - 105px);
        left: calc(50% - 82px);
        animation-delay: 1477ms;
    }
    .shooting_star:nth-child(19)::before,
    .shooting_star:nth-child(19)::after {
        animation-delay: 1477ms;
    }
    .shooting_star:nth-child(20) {
        top: calc(50% - 83px);
        left: calc(50% - 205px);
        animation-delay: 7035ms;
    }
    .shooting_star:nth-child(20)::before,
    .shooting_star:nth-child(20)::after {
        animation-delay: 7035ms;
    }
    @keyframes tail {
        0% {
            width: 0;
        }
        30% {
            width: 100px;
        }
        100% {
            width: 0;
        }
    }
    @keyframes shining {
        0% {
            width: 0;
        }
        50% {
            width: 30px;
        }
        100% {
            width: 0;
        }
    }
    @keyframes shooting {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(300px);
        }
    }
    @keyframes sky {
        0% {
            transform: rotate(45deg);
        }
        100% {
            transform: rotate(405deg);
        }
    }
</style>

<script>
    function setRandomPosition(element) {
        const nightEl = element.parentElement;
        const nightWidth = nightEl.offsetWidth;
        const nightHeight = nightEl.offsetHeight;

        element.style.top = `${Math.random() * nightHeight}px`;
        element.style.left = `${Math.random() * nightWidth}px`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const shootingStars = document.querySelectorAll('.shooting_star');
        shootingStars.forEach(setRandomPosition);

        shootingStars.forEach((star) => {
            star.addEventListener('animationend', () => setRandomPosition(star));
        });
    });
</script>
