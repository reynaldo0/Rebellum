"use client";

import { Accordion } from "flowbite-react";
import { useRef } from "react";
import useScrollAnimation from "../func/scrollAnimation";

export function Dampak() {
    const accordionRef = useRef<HTMLDivElement>(null);

    useScrollAnimation(accordionRef, (element, position) => {
        const positionTop = position.top - window.innerHeight;

        if (positionTop < 0) {
            const newPosition = Math.abs(positionTop);

            if (window.innerWidth <= 768) {
                element.style.transform = `translateX(${0}px)`;
            } else {
                if (newPosition / 5 < 150) {
                    element.style.transform = `translateX(${newPosition / 4}px)`;

                }

            }
        }
    });
    return (
        <div
            ref={accordionRef}
            id="dampak"
            className="block md:relative right-14 md:right-32 w-full rounded-lg border px-5 py-5 shadow-lg md:w-[400px] transition ease-out duration-150"
            style={{ transform: "translateX(-500px)" }}>
            <h2 className="mb-5 text-center text-2xl font-semibold">
                Dampak Kenakalan Remaja
            </h2>
            <Accordion collapseAll>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Tawuran)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">Terjadinya kerusakan fisik</li>
                            <li className="mb-2 text-gray-500">Kegagalan bidang akademik</li>
                            <li className="mb-2 text-gray-500">Tumbuh rasa kriminalitas</li>
                            <li className="mb-2 text-gray-500">
                                Mempunyai kepribadian Tempramen
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menyebabkan kerugian sosial
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Narkoba)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">Terjadinya kerusakan fisik</li>
                            <li className="mb-2 text-gray-500">Mendapat gangguan mental</li>
                            <li className="mb-2 text-gray-500">Pelanggaran terhadap hukum</li>
                            <li className="mb-2 text-gray-500">Rusaknya hubungan sosial</li>
                            <li className="mb-2 text-gray-500">
                                Beresiko overdosis hingga menyebabkan kematian
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Merokok)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">Mengurangi Kreatifitas</li>
                            <li className="mb-2 text-gray-500">
                                Menyebabkan ketergantungan emosional
                            </li>
                            <li className="mb-2 text-gray-500">
                                Mengalami gangguan pernafasan
                            </li>
                            <li className="mb-2 text-gray-500">Meningkatkan resiko kanker</li>
                            <li className="mb-2 text-gray-500">Gangguan kesehatan gigi</li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Seksual)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">Terjadinya pernikahan dini</li>
                            <li className="mb-2 text-gray-500">Tertularnya penyakit HIV</li>
                            <li className="mb-2 text-gray-500">Pengguguran / aborsi</li>
                            <li className="mb-2 text-gray-500">Menurunnya kinerja otak</li>
                            <li className="mb-2 text-gray-500">Timbulnya konflik internal</li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Bullying)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Berdampak pada psikologis dan emosional
                            </li>
                            <li className="mb-2 text-gray-500">Rusaknya kesehatan mental</li>
                            <li className="mb-2 text-gray-500">
                                Penurunan pada prestasi akademik
                            </li>
                            <li className="mb-2 text-gray-500">
                                Cedera yang dimiliki korban
                            </li>
                            <li className="mb-2 text-gray-500">Mengalami isolasi sosial</li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Miras)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb- ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">Terjadinya kerusakan fisik</li>
                            <li className="mb-2 text-gray-500">
                                Gangguan koordinasi pada tubuh
                            </li>
                            <li className="mb-2 text-gray-500">Penurunan daya tangkap</li>
                            <li className="mb-2 text-gray-500">Hilangnya fokus belajar</li>
                            <li className="mb-2 text-gray-500">Jatuh kedalam rasa depresi</li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
            </Accordion>
        </div>
    );
}

export function Solusi() {
    const accordionRef = useRef<HTMLDivElement>(null);

    useScrollAnimation(accordionRef, (element, position) => {
        const positionTop = position.top - window.innerHeight;

        if (positionTop < 0) {
            const newPosition = Math.abs(positionTop);

            if (window.innerWidth <= 768) {
                element.style.transform = `translateX(-${0}px)`;
            } else {
                if (newPosition / 5 < 150) {
                    element.style.transform = `translateX(-${newPosition / 4}px)`;

                }

            }
        }
    });
    return (
        <div
            ref={accordionRef}
            id="solusi"
            className="block md:relative -right-14 md:-right-32 w-full rounded-lg border px-5 py-5 shadow-lg md:w-[400px] transition ease-out duration-150">
            <h2 className="mb-5 text-center text-2xl font-semibold">
                Solusi Kenakalan Remaja
            </h2>

            <Accordion collapseAll>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Tawuran)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Meningkatkan kesadaran diri
                            </li>
                            <li className="mb-2 text-gray-500">
                                Melakukan pendekatan restoratif
                            </li>
                            <li className="mb-2 text-gray-500">
                                Melibatkan keluarga dalam penyelesaian
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menerapkan hukum yang sesuai
                            </li>
                            <li className="mb-2 text-gray-500">
                                Meningkatkan pengawasan di setiap daerah
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Narkoba)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Mempelajari dampak dari penggunaan narkoba
                            </li>
                            <li className="mb-2 text-gray-500">
                                Membuat prinsip yang kuat pada diri sendiri supaya tidak
                                sedikitpun menyentuh narkoba
                            </li>
                            <li className="mb-2 text-gray-500">
                                Melakukan konsisten olahraga, agar semakin mengerti pentingnya
                                kesehatan
                            </li>
                            <li className="mb-2 text-gray-500">
                                Lebih meyakinkan diri lagi dengan larangan-larangan kitab suci
                            </li>
                            <li className="mb-2 text-gray-500">
                                Berusaha konsisten dengan semua hal yang telah dilakukan dan
                                berusaha menjadi lebih baik lag
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Merokok)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Berusaha menghindari teman yang sedang merokok
                            </li>
                            <li className="mb-2 text-gray-500">
                                Yakin dan jangan malu untuk mengatakan tidak merokok
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menggantikan waktu merokok untuk berolahraga dan hal-hal
                                menyehatkan lainnya
                            </li>
                            <li className="mb-2 text-gray-500">
                                Mempelajari dampak menggunakan rokok pada masa remaja
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menciptakan komunitas anti rokok , yang menyediakan gaya hidup
                                sehat dan memberikan hadiah bagi yang mengikutinya
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Seksual)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Mempelajari apa saja dampak orang yang telah melakukan sex
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menjauhi hubungan seperti pacaran
                            </li>
                            <li className="mb-2 text-gray-500">
                                Tidak memiliki rasa ingin tahu lebih terhadap seseorang
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menghindari sekumpulan orang yang dapat menyebabkan terjadinya
                                hubungan diluar pernikahan
                            </li>
                            <li className="mb-2 text-gray-500">
                                Meyakinkan pada diri sendiri agar tidak melakukan hubungan
                                kepada seseorang diluar pernikahan
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Bullying)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Tunjukanlah prestasi yang dapat menyatakan kalau kamu bisa
                            </li>
                            <li className="mb-2 text-gray-500">
                                Menjalinlah pertemanan dengan banyak orang
                            </li>
                            <li className="mb-2 text-gray-500">
                                Jangan pernah menunjukan rasa takutmu dan sedihmu terhadap orang
                                lain
                            </li>
                            <li className="mb-2 text-gray-500">
                                Saat melihat orang lain dibully, jangan takut untuk melapor
                                kepada orang lain
                            </li>
                            <li className="mb-2 text-gray-500">
                                Berbuat baik dan saling menghargai kepada orang sekelilingmu
                                agar terhindar dari persekutuan
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
                <Accordion.Panel>
                    <Accordion.Title>Perilaku Buruk (Miras)</Accordion.Title>
                    <Accordion.Content>
                        <ul className="mb-2 ml-2 list-decimal text-gray-500">
                            <li className="mb-2 text-gray-500">
                                Jangan sekalipun menyentuh mengkonsumsi minuman keras apapun
                            </li>
                            <li className="mb-2 text-gray-500">
                                Berusahalah untuk menjauh kan diri dari orang yang sedang
                                mengkonsumsi miras
                            </li>
                            <li className="mb-2 text-gray-500">
                                Yakinkanlah pada diri sendiri bahwa miras dapat merusak tubuh
                            </li>
                            <li className="mb-2 text-gray-500">
                                Luangkan waktumu untuk berolahraga dan mempelajari pola hidup
                                sehat
                            </li>
                            <li className="mb-2 text-gray-500">
                                Yakin dan konsisten dalam menjalani hal-hal positif tersebut
                            </li>
                        </ul>
                    </Accordion.Content>
                </Accordion.Panel>
            </Accordion>
        </div>
    );
}