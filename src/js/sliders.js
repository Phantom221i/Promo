import Glide from "@glidejs/glide";    // slider lib
// import {Controls, Breakpoints} from "@glidejs/glide/dist/glide.modular.esm";
import {exist} from "./additional";


document.addEventListener(
    "DOMContentLoaded", () => {
        if (exist('.glide')) {
            setTimeout(()=> {
                let sliders = document.querySelectorAll('.glide')
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
})
