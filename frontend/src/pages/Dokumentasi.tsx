export const Dokumentasi = () => {
    return (
        <section id="dokumentasi" className="py-20 pt-20">
            <div className="container">
                <h1
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    className="mb-5 text-center font-radioCasnada text-3xl font-semibold md:text-4xl"
                >
                    <span className="text-yellow">Dokumentasi</span>
                </h1>
                <p
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    data-aos-delay="100"
                    className="mx-auto max-w-3xl text-center text-sm text-secondary-200 md:text-base"
                >
                    Sesi tanya jawab secara langsung terkait kenakalan remaja di sekitar,
                    berupa video dokumentasi yang terdapat seorang pelajar serta guru
                    Wakil Kepala Sekolah di SMKN 46 Jakarta. Simak video dokomentasi
                    berikut ini!
                </p>
                <div className="mt-7 flex w-full justify-center">
                    <iframe
                        width="853"
                        height="480"
                        className="h-[250px] w-[640px] max-w-full md:h-[350px]"
                        src="https://www.youtube.com/embed/eeOebdHoq7E?si=Ib71egD9sGth6uXw"
                        title="Bahaya Kenakalan Remaja"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowFullScreen
                    ></iframe>
                </div>
            </div>
        </section>
    )
}

export default Dokumentasi