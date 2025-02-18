import { useState, FormEvent } from "react";
import axios from "axios";

const Konsultasi = () => {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [message, setMessage] = useState("");
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [modalMessage, setModalMessage] = useState("");

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();

    try {
      // Send form data to the Laravel API
      const response = await axios.post("http://localhost:8000/api/consultations", {
        name,
        email,
        message,
      });

      if (response.data.success) {
        setModalMessage("Pesan berhasil dikirimkan!");
        setIsModalOpen(true);
      }
    } catch (error) {
      console.error("Kesalahan saat mengirimkan formulir:", error);
      setModalMessage("Ada yang tidak beres, silakan coba lagi.");
      setIsModalOpen(true);
    }
  };

  const closeModal = () => {
    setIsModalOpen(false);
  };

  const handleOverlayClick = (e: React.MouseEvent) => {
    if (e.target === e.currentTarget) {
      closeModal();
    }
  };

  return (
    <section id="konsultasi" className="w-full overflow-x-hidden md:pt-24">
      <div className="relative w-full sm:w-[90%]">
        <div className="flex items-center bg-primary-200 px-4 py-5 sm:rounded-r-full sm:pl-5">
          <div className="container ml-0 w-full sm:ml-8 sm:w-[70%] md:ml-14">
            <h1 className="text-2xl font-bold text-white sm:text-3xl" data-aos="fade-up" data-aos-duration="500">
              Hadapi Kenakalan, Ceritakan pada Kami!
            </h1>
            <p className="my-5 text-xs text-white sm:text-sm" data-aos="fade-up" data-aos-duration="600">
              Kami akan memproses laporan Anda dengan serius dan menjaga kerahasiaan identitas Anda. Berikan informasi selengkap mungkin agar kami dapat membantu Anda. Tim Rebellum akan segera menghubungi Anda untuk tindak lanjut.
            </p>

            <form className="flex flex-col" onSubmit={handleSubmit}>
              <input
                type="text"
                placeholder="Masukkan nama"
                className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                value={name}
                onChange={(e) => setName(e.target.value)}
                data-aos="fade-up" data-aos-duration="700"
              />
              <input
                type="email"
                placeholder="Masukkan email"
                className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                data-aos="fade-up" data-aos-duration="800"
              />
              <textarea
                className="my-2 max-h-28 rounded-2xl border-none p-2 pl-4 focus:ring-yellow"
                cols={30}
                placeholder="Masukkan keluhan anda"
                value={message}
                onChange={(e) => setMessage(e.target.value)}
                data-aos="fade-up" data-aos-duration="900"
              ></textarea>
              <button
                type="submit"
                className="mt-2 w-full md:w-[100px] rounded-l-3xl rounded-r-3xl bg-yellow px-5 py-3 text-white"
                data-aos="fade-up" data-aos-duration="900"
              >
                Kirim
              </button>
            </form>
          </div>
        </div>
        <img
          src="/icon/Vector.png"
          alt=""
          className="absolute bottom-0 right-0 hidden h-full max-h-[400px] w-auto translate-x-28 md:block"
        />
      </div>

      {/* Modal */}
      {isModalOpen && (
        <div
          className="modal-overlay"
          onClick={handleOverlayClick} // Handle click on overlay
        >
          <div className="modal-content">
            <p>{modalMessage}</p>
            <button onClick={closeModal} className="modal-close-button">
              Close
            </button>
          </div>
        </div>
      )}

      {/* CSS for modal */}
      <style>{`
        .modal-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.5);
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 50;
        }

        .modal-content {
          background-color: white;
          padding: 20px;
          border-radius: 10px;
          max-width: 400px;
          text-align: center;
        }

        .modal-close-button {
          background-color: #f44336;
          color: white;
          border: none;
          padding: 10px;
          border-radius: 5px;
          cursor: pointer;
          margin-top: 15px;
        }

        .modal-close-button:hover {
          background-color: #d32f2f;
        }
      `}</style>
    </section>
  );
};

export default Konsultasi;
