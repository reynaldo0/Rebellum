import { useRef } from "react";
import useScrollAnimation from "../../func/scrollAnimation";
import Logo from "../../components/Logo";

const About = () => {
  const lineRef = useRef(null);

  useScrollAnimation(lineRef, (element, position) => {
    const positionTop = position.top - window.innerHeight;
    const marginRight = 16;

    if (positionTop < 0) {
      const newWidth = Math.abs(positionTop);
      const maxWidth =
        window.innerWidth - element.getBoundingClientRect().left - marginRight;
      element.style.width = `${Math.min(newWidth, maxWidth)}px`;
    }
  });

  return (
    <section
      id="about"
      className="bg-cover bg-center bg-repeat pb-36 pt-16"
      style={{ backgroundImage: "url('/bg/background.png')" }}>
      <div className="container">
        <div className="flex flex-col-reverse flex-wrap items-center justify-between gap-10 md:flex-row md:gap-0">
          <div className="relative flex w-full items-center justify-center md:w-1/2">
            <Logo />
          </div>
          <div className="w-full md:w-1/2">
            <h1
              id="rebelliumText"
              className="relative mb-8 font-radioCasnada text-4xl font-semibold md:text-5xl">
              Apa itu <span className="text-yellow z-10">Rebellum?</span>
              <div ref={lineRef} className="line bg-yellow z-10"></div>
            </h1>
            <p
              data-aos="fade-zoom-in"
              data-aos-easing="ease-in-back"
              id="rebelliumDesc"
              className="text-sm text-secondary-200 md:max-w-2xl md:text-base">
              Rebellum adalah website yang kami ciptakan untuk membantu
              menyelesaikan permasalahan yang lagi marak dan sulit untuk
              terselesaikan, yaitu Kenakalan Remaja. Kami menjelaskan,
              memberikan data serta membimbing para penjelajah website Rebellum
              untuk mengatasi permasalahannya.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};

export default About;