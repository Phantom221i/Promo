import Glide from "@glidejs/glide";    // slider lib
import {Controls, Breakpoints} from "@glidejs/glide/dist/glide.modular.esm";
import {exist} from "./additional";


document.addEventListener(
    "DOMContentLoaded", () => {
        if (exist('.glide.flag')) {
            setTimeout(()=> {
                let sliders = document.querySelectorAll('.glide.flag')
                sliders.forEach(el => {
                    new Glide(el, {
                        type: 'carousel',
                        startAt: 0,
                        autoplay: true,
                        hoverpause: true,
                        perView: 20,
                        autoplaySpeed: 2000,
                        speed: 8000,
                        animationDuration: 3000,
                        animationTimingFunc: 'linear',
                        breakpoints: {
                            1024: {
                                perView: 6
                            },
                            767: {
                                perView: 3
                            }
                        }
                    }).mount()
                })
            }, 2000)
        }

        if (exist('.glide.comments')) {
            setTimeout(()=> {
                let sliders = document.querySelectorAll('.glide.comments')
                sliders.forEach(el => {
                    new Glide(el, {
                        type: 'carousel',
                        startAt: 0,
                        autoplay: false,
                        hoverpause: true,
                        perView: 1,
                        focusAt: 1,
                        animationDuration: 800,
                        animationTimingFunc: 'linear',
                    }).mount({Controls})
                })
            }, 2000)
        }
})
