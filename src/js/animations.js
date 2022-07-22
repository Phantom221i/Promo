import { Expo, TweenMax, TweenLite, gsap, SplitText } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { exist } from "./additional";

document.addEventListener("DOMContentLoaded", () => {
    TweenMax.from(".hero__right--bg", 1.6, {
        delay: 0.6,
        width: 0,
        ease: Expo.easeInOut
    });

    TweenMax.from("header", 1, {
        delay: 1,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".hero__content--center img", 1, {
        delay: 0.4,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".product-title", 2, {
        delay: 1.6,
        opacity: 0,
        y: 20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".desc", 2, {
        delay: 1.8,
        opacity: 0,
        y: 20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".hero__content--right", 2, {
        delay: 2,
        opacity: 0,
        y: 20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".hero .btn", 2, {
        delay: 2.2,
        opacity: 0,
        y: 20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".section .flags", 1, {
        delay: 1.7,
        opacity: 0,
        y: -30,
        ease: Expo.easeInOut
    });

    gsap.registerPlugin(ScrollTrigger)
    if (exist('.our-product__content--box')) {
        let products_img = document.querySelectorAll('.our-product__content--box')
        products_img.forEach(el => {
            el.style.transform = 'translateY(300px)'
            el.style.opacity = '0'
            gsap.to(el, {
                scrollTrigger: el, // start the animation when ".box" enters the viewport (once)
                delay: el.getAttribute('delay'),
                y: 0,
                opacity: 1,
                ease: Expo.easeInOut
            });
        })
    }

    if(exist('.text-animation')) {
        let texts = document.querySelectorAll('.text-animation')
        texts.forEach(el => {
            el.style.transform = 'translateY(300px)'
            el.style.opacity = '0'

            gsap.to(el, {
                scrollTrigger: el,
                duration: 2.5,
                ease: "back.out(1.7)",
                y: 0,
                opacity: 1,
            });
        })
    }

    if(exist(".about-us .list-countries li img")) {
        const list_countries = document.querySelectorAll(".about-us .list-countries li img");
        list_countries.forEach(el => {
            const hover = gsap.to(el, {
                scaleX:2, scaleY:2, scaleZ:3,
                color: "blue",
                duration: 1.5,
                paused: true,
                ease: "ease-in-out"
            });

            el.addEventListener("mouseenter", () => hover.play());
            el.addEventListener("mouseleave", () => hover.reverse());
        })
    }

})

