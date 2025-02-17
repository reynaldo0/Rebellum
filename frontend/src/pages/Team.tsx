import TeamCard from "../components/SwiperCard";

const Team: React.FC = () => {
    return (
        <section id="team" className="pb-10 pt-20">
            <div className="container">
                <h1
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    className="text-center font-radioCasnada text-3xl font-semibold md:text-4xl">
                    Tim <span className="text-yellow">kami</span>
                </h1>
                <p
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    data-aos-delay="100"
                    className="text-center text-base text-secondary-200">
                    Bersama <span className="font-bold">Rebellum</span>, kenakalan remaja
                    <span className="font-bold"> Terhapuskan!</span>
                </p>

                <TeamCard>
                    <TeamCard.Item
                        image="/team/salman.jpg"
                        name="M. Salman Alfarisi"
                        description="Leader, data analyst">
                        <TeamCard.Link
                            href="https://www.instagram.com/avlfarizii"
                            icon="logo-instagram"
                        />
                        <TeamCard.Link href="#" icon="logo-linkedin" />
                        <TeamCard.Link
                            href="https://github.com/avlfarizii"
                            icon="logo-github"
                        />
                    </TeamCard.Item>
                    <TeamCard.Item
                        image="/team/aldo.jpg"
                        name="Reynaldo Yusellino"
                        description="Programmer, 3D designer">
                        <TeamCard.Link
                            href="https://www.instagram.com/rynldysllino"
                            icon="logo-instagram"
                        />
                        <TeamCard.Link
                            href="https://www.linkedin.com/in/reynaldo-yusellino-564724270"
                            icon="logo-linkedin"
                        />
                        <TeamCard.Link
                            href="https://github.com/reynaldo0"
                            icon="logo-github"
                        />
                    </TeamCard.Item>
                    <TeamCard.Item
                        image="/team/rama.jpg"
                        name="Ramadina A."
                        description="Programmer">
                        <TeamCard.Link
                            href="https://www.instagram.com/ramtxh"
                            icon="logo-instagram"
                        />
                        <TeamCard.Link
                            href="https://www.linkedin.com/in/ramadina-al-muzthazam-5028482a2"
                            icon="logo-linkedin"
                        />
                        <TeamCard.Link
                            href="https://github.com/ramarfx"
                            icon="logo-github"
                        />
                    </TeamCard.Item>
                </TeamCard>
            </div>
        </section>
    );
};

export default Team;