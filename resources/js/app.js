import './bootstrap';
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import Lenis from "lenis";
import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import {Navigation, Pagination} from "swiper/modules";

Swiper.use([Navigation, Pagination]);
window.Swiper = Swiper;

livewire_hot_reload();

// don't forget to register plugins
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
window.gsap = gsap;
// window.ScrollTrigger = ScrollTrigger;

const lenis = new Lenis({
    smooth: true,
})
window.lenis = lenis;

function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}
requestAnimationFrame(raf)
document.addEventListener('DOMContentLoaded', function () {
    window.smoothContent = function () {
        // Инициализация Lenis
        window.lenis = lenis;
        // let smoother = ScrollSmoother.create({
        //     wrapper: '#smooth-wrapper',
        //     content: '#smooth-content',
        //     smooth: 2,
        //     smoothTouch: 0.1,
        // })
        // gsap.utils.toArray('.smooth-content').forEach((el) => {
        //     gsap.to(el, {
        //         opacity: 1,
        //         y: 0,
        //         duration: 1,
        //         ease: 'power2.out',
        //         scrollTrigger: {
        //             trigger: el,
        //             start: 'top 70%',
        //             toggleActions: 'play none none reverse',
        //         },
        //     })
        // })
    }
})

if (document.documentElement.clientWidth > 768) {


    const jar1 = document.querySelector("#jar-flying-1");
    const hole1 = document.querySelector("#jar-hole-1");

    const jar1Rect = jar1.getBoundingClientRect();

    const hole1Rect = hole1.getBoundingClientRect();
    const hole1CenterX = hole1Rect.left + hole1Rect.width / 2;
    const hole1CenterY = hole1Rect.top + hole1Rect.height / 2;

    const deltaX1 = hole1CenterX - (jar1Rect.left + jar1Rect.width / 2);
    const deltaY1 = hole1CenterY - (jar1Rect.top + jar1Rect.height / 2);

    gsap.to(jar1, {
        scrollTrigger: {
            trigger: hole1,
            start: "top bottom",
            end: "center+=300 center",
            // markers: true,
            scrub: true,
        },
        x: deltaX1,
        y: deltaY1 + 300,
        scale: 0.7,
        rotate: -40,
        ease: "none",
    });

    const jar2 = document.querySelector("#jar-flying-2");
    const jarFlyingFinish = document.querySelector("#jar-flying-finish");

    const jar2Rect = jar2.getBoundingClientRect();
    const jarFlyingFinishRect = jarFlyingFinish.getBoundingClientRect();

    const jar2CenterX = jar2Rect.left + jar2Rect.width / 2;
    const jar2BottomY = jar2Rect.bottom;

    const deltaX2 = jar2CenterX - (jarFlyingFinishRect.left + jarFlyingFinishRect.width / 2);
    const deltaY2 = jar2BottomY - (jarFlyingFinishRect.top);

    console.log(deltaX2)
    console.log(deltaY2)
    gsap.to(jar2, {
        scrollTrigger: {
            trigger: jar2,
            start: "center center",
            endTrigger: jarFlyingFinish,
            end: "top center",
            // markers: true,
            scrub: true,
        },
        x: "-=" + deltaX2,
        y: "-=" + (deltaY2 + 20),
        scale: 1.4,
        rotate: -8
    });


}


window.addEventListener('livewire:navigated', function () {
    smoothContent()
});
