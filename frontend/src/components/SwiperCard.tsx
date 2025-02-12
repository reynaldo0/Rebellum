import IonIcon from "@reacticons/ionicons";
import React, { useEffect, useRef } from "react";
import Swiper from "swiper";
import { Navigation, Autoplay, EffectCoverflow } from "swiper/modules";
// import 'swiper/swiper-bundle.min.css';
import { SwiperOptions } from "swiper/types";

Swiper.use([Navigation, Autoplay, EffectCoverflow]);

type TeamCardProps = {
    children: React.ReactNode;
};

type TeamCardItemProps = {
    name: string;
    image: string;
    description: string;
    children: React.ReactNode;
};

type TeamCardLinkProps = {
    href: string;
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    icon: any;
}

const TeamCard = (props: TeamCardProps) => {
    const teamSwiperRef = useRef<HTMLDivElement>(null);

    const swiperOption: SwiperOptions = {
        effect: "coverflow",
        loop: false,
        grabCursor: true,
        centeredSlides: true,
        coverflowEffect: {
            slideShadows: false,
            rotate: 0,
            stretch: -20,
            depth: 200,
            modifier: 2.5,
        },
        navigation: {
            nextEl: ".button-next",
            prevEl: ".button-prev",
        },
        initialSlide: 1.5,
        breakpoints: {
            0: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2,
            },
        },
    };

    useEffect(() => {
        if (teamSwiperRef.current) {
            new Swiper(teamSwiperRef.current, swiperOption);
        }
    }, []);

    return (
        <div
            className="swiper team w-full sm:min-w-[670px] md:w-1/2"
            ref={teamSwiperRef}>
            <div className="swiper-wrapper my-8">{props.children}</div>
            <div className="flex items-center justify-center gap-5">
                <button className="button-prev flex h-[50px] w-[50px] items-center justify-center rounded-full border border-yellow bg-transparent text-yellow transition ease-in-out hover:bg-yellow hover:text-white">
                    <IonIcon name="chevron-back-outline" />
                </button>
                <button className="button-next flex h-[50px] w-[50px] items-center justify-center rounded-full border border-yellow bg-transparent text-yellow transition ease-in-out hover:bg-yellow hover:text-white">
                    <IonIcon name="chevron-forward-outline" />
                </button>
            </div>
        </div>
    );
};

TeamCard.Item = (props: TeamCardItemProps) => {
    return (
        <div className="swiper-slide">
            <div className="flip-card">
                <div className="flip-card-inner">
                    <div className="flip-card-front">
                        <div className="px-2 py-3">
                            <img
                                alt="team image"
                                src={props.image}
                                className="mx-auto h-[165px] w-auto self-start rounded-md object-cover"
                            />
                            <div className="my-4">
                                <h1 className="text-center text-base font-bold">
                                    {props.name}
                                </h1>
                                <p className="text-center text-sm">{props.description}</p>
                            </div>
                            <div className="grid w-full grid-cols-3 justify-items-center gap-3">
                                {props.children}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

TeamCard.Link = (props: TeamCardLinkProps) => {
    return (
        <a
            href={props.href}
            className="flex h-12 w-12 items-center justify-center rounded-full bg-yellow text-3xl">
            <IonIcon name={props.icon} className="text-white" />
        </a>
    );
};

export default TeamCard;