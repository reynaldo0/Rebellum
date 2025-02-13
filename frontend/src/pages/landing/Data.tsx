import {
    CategoryScale,
    Chart,
    ChartConfiguration,
    LinearScale,
    LineController,
    LineElement,
    PointElement,
    Title,
    Filler,
} from "chart.js";
import { useEffect, useRef } from "react";
import { dataButtonList } from "../../docs/dataButton";
import { data, DataChart } from "../../docs/dataChart";
import City from "../../components/City";

Chart.register(
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    Title,
    CategoryScale,
    Filler
);

export const Data = () => {
    const canvasRef = useRef<HTMLCanvasElement>(null);
    const chartRef = useRef<Chart | null>(null);
    const buttonRefs = useRef<HTMLButtonElement[]>([]);
    const currentData = useRef<DataChart>(data[0]);

    const chartOptions: ChartConfiguration = {
        type: "line",
        data: {
            labels: data[0].map((item) => item.year),
            datasets: [
                {
                    label: "kasus (%)",
                    data: currentData.current.map((item) => item.kasus),
                    pointStyle: "circle",
                    borderWidth: 3,
                    pointRadius: 10,
                    pointHoverRadius: 15,
                    borderColor: "#6171C8",
                    fill: true,
                    backgroundColor: "#F89B11",
                },
            ],
        },
    };

    const handleButtonClick = (index: number) => {
        currentData.current = data[index];

        // Update chart data
        if (chartRef.current) {
            chartRef.current.data.labels = currentData.current.map(
                (item) => item.year
            );
            chartRef.current.data.datasets[0].data = currentData.current.map(
                (item) => item.kasus
            );
            chartRef.current.update();
        }
    };

    useEffect(() => {
        if (canvasRef.current && buttonRefs.current) {
            if (chartRef.current) {
                chartRef.current.destroy();
            }

            chartRef.current = new Chart(canvasRef.current, chartOptions);

            buttonRefs.current.forEach((button, index) => {
                button.onclick = () => handleButtonClick(index);
            });
        }
    }, []);

    return (
        <section id="data" className="pb-[600px] md:pb-[1000px]">
            <City />
            <div
                id="data-children"
                className="z-20 -mt-20 h-96 w-full rounded-t-3xl bg-white pt-10 md:-mt-28 md:rounded-t-[126px]">
                <div id="data-inner" className="container">
                    <h1 className="mb-10 text-center font-poppins text-3xl font-bold md:text-4xl">
                        Kumpulan Data <span className="text-yellow">Kenakalan Remaja </span>
                    </h1>
                    <p className="mx-auto max-w-3xl text-center text-sm text-secondary-200 md:text-base">
                        Dengan data kenakalan remaja kita dapat mencerminkan perilaku
                        negatif seseorang, seperti remaja yang menggunakan narkoba, tawuran,
                        merokok, dan kenakalan remaja lainnya. Dengan demikian kita dapat
                        membantu memahami seriusnya masalah ini dan kita dapat mengembangkan
                        strategi pencegahan yang lebih efektif di kedepannya.
                    </p>

                    <div
                        id="button-container"
                        className="mt-10 grid grid-cols-2 grid-rows-3 flex-wrap items-center justify-center gap-5 md:flex">
                        {dataButtonList.map((button, index) => (
                            <button
                                key={index}
                                ref={(e) => {
                                    if (e) buttonRefs.current[index] = e;
                                }}                                
                                data-aos="fade-in"
                                data-aos-duration={300}
                                className="flex w-full max-w-xs cursor-pointer gap-2 rounded-xl bg-[#6874B9] p-3 transition hover:-translate-y-1 hover:bg-yellow hover:opacity-90 md:w-fit">
                                <div className="flex h-[48px] w-[80px] items-center justify-center rounded-lg bg-white text-black md:h-[96px] md:w-[96px]">
                                    <img src={button.image} className="h-auto w-full" alt="" />
                                </div>

                                <div className="text-start text-white">
                                    <h5 className="text-xs font-bold md:text-xl">
                                        {button.label}
                                    </h5>
                                    <p className="text-xs md:text-lg">{button.description}</p>
                                </div>
                            </button>
                        ))}
                    </div>

                    <h1
                        data-aos="fade-right"
                        data-aos-offset="200"
                        className="my-10 font-poppins text-2xl font-bold md:ml-20">
                        Persentase Data dalam{" "}
                        <span className="text-yellow">Bentuk Grafik</span>
                    </h1>

                    <div className="w-full">
                        <canvas
                            ref={canvasRef}
                            id="myChart"
                            className="my-5 mb-[600px] h-max border md:container md:mx-20 md:py-5"></canvas>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default Data;