import IonIcon from "@reacticons/ionicons";
import { navigationList } from "../docs/navigation";

export const Footer = () => {
    return (
        <footer className="bg-[#0D1133]">
            <div className="container mx-auto w-full p-4 py-6 lg:py-8">
                <div className="md:flex md:justify-between">
                    <div className="mb-6 flex flex-col justify-between md:mb-0">
                        <a href="#home" className="flex items-center">
                            <img
                                src="/icon/logo-footer.png"
                                className="me-3 h-auto w-[180px]"
                                alt="FlowBite Logo"
                            />
                        </a>

                        <div className="mb-5 mt-5 md:mb-0">
                            <h2 className="mb-6 text-base font-semibold uppercase text-gray-400">
                                Hubungi Kami
                            </h2>
                            <ul className="font-medium text-gray-500">
                                <li className="mb-4 flex items-center gap-3 text-base">
                                    <IonIcon name="location"></IonIcon>
                                    <a href="#" className="hover:underline">
                                        SMK Negeri 46 Jakarta
                                    </a>
                                </li>
                                <li className="mb-4 flex items-center gap-3 text-base">
                                    <IonIcon name="mail"></IonIcon>
                                    <a href="#" className="hover:underline">
                                        rebellumin@gmail.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-3 gap-8 sm:gap-8 md:gap-10 lg:gap-28">
                        <div>
                            <h2 className="mb-6 text-sm font-semibold uppercase text-gray-400">
                                Akses Konten
                            </h2>
                            <ul className="font-medium text-gray-500">
                                {navigationList.map((item, index) => (
                                    <li className="mb-4" key={index}>
                                        <a href={item.href} className="hover:underline">
                                            {item.title}
                                        </a>
                                    </li>
                                ))}
                            </ul>
                        </div>

                        <div>
                            <h2 className="mb-6 text-sm font-semibold uppercase text-gray-400">
                                Sumber Data
                            </h2>
                            <ul className="font-medium text-gray-500">
                                <li className="mb-4">
                                    <a
                                        href="https://Detik.com"
                                        className="lowercase hover:underline">
                                        Detik.com
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href="https://Kompasiana.com"
                                        className="lowercase hover:underline">
                                        Kompasiana
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href="https://Channel9.id"
                                        className="lowercase hover:underline">
                                        Channel9.id
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href="https://Goodstats.id"
                                        className="lowercase hover:underline">
                                        Goodstats.id
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href="https://pusiknas.polri.go.id/"
                                        className="lowercase hover:underline">
                                        pusiknas.polri
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href="https://www.okezone.com/"
                                        className="lowercase hover:underline">
                                        okezone.com
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h2 className="mb-6 text-sm font-semibold uppercase text-gray-400">
                                Credit
                            </h2>
                            <ul className="font-medium text-gray-500">
                                <li className="mb-4">
                                    <a
                                        href="https://www.freepik.com/"
                                        className="hover:underline">
                                        Freepik
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr className="my-6 border-gray-700 sm:mx-auto lg:my-8" />
                <div className="sm:flex sm:items-center sm:justify-between">
                    <span className="text-center text-sm text-gray-500">
                        Dibuat oleh tim Rebellum
                    </span>
                </div>
            </div>
        </footer>
    );
};