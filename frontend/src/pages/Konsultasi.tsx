import { useState, FormEvent } from "react";
import axios from "axios";
import Swal from "sweetalert2"; // Import SweetAlert2

const Konsultasi = () => {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState(""); // New field for phone number
  const [location, setLocation] = useState(""); // New field for location
  const [message, setMessage] = useState("");
  const [forms, setForms] = useState<File | null>(null); // Updated field for file upload (forms)

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append("name", name);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("location", location);
    formData.append("message", message);

    if (forms) {
      formData.append("forms", forms); // Appending the file correctly as 'forms'
    }

    try {
      const response = await axios.post("http://localhost:8000/api/consultations", formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });

      if (response.data.success) {
        Swal.fire({
          title: "Pesan Berhasil Dikirim!",
          text: "Baik, Laporanmu akan segera di tindak lanjuti oleh pihak Rebellum. Daftar sekarang agar kamu bisa mengakses lebih banyak fitur lainnya",
          icon: "success",
          showCancelButton: true,
          confirmButtonText: "Tutup",
          cancelButtonText: "Register",
          confirmButtonColor: "#d33", // Customize the close button color (optional)
          cancelButtonColor: "#3085d6", // Customize the redirect button color (optional)
          preConfirm: () => {
            // No action needed here, this will just close the modal
          },
        }).then((result) => {
          if (result.isDismissed && result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = "http://127.0.0.1:8000/"; // Redirect to another page
          }
        });

        // Reset form state after successful submission
        setName("");
        setEmail("");
        setPhone("");
        setLocation("");
        setMessage("");
        setForms(null); // Clear the file
      }
    } catch (error) {
      console.error("Kesalahan saat mengirimkan formulir:", error);
      Swal.fire({
        title: "Terjadi Kesalahan!",
        text: "Ada yang tidak beres, silakan coba lagi.",
        icon: "error",
        confirmButtonText: "Tutup",
      });
    }
  };



  return (
    <section id="konsultasi" className="w-full overflow-y-hidden md:pt-24">
      <div className="relative w-full sm:w-[90%]">
        <div className="flex items-center bg-primary-200 px-4 py-10 sm:rounded-r-full sm:pl-5">
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
              <input
                type="number"
                placeholder="Masukkan nomor telepon (Opsional)"
                className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                value={phone}
                onChange={(e) => setPhone(e.target.value)}
                data-aos="fade-up" data-aos-duration="800"
              />
              <input
                type="text"
                placeholder="Masukkan lokasi kejadian"
                className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                value={location}
                onChange={(e) => setLocation(e.target.value)}
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

              {/* File Upload Section */}
              <div className="flex gap-4 py-2 items-start">
                {/* File Preview Container */}
                <div
                  id="preview"
                  className="flex items-center justify-center border border-gray-300 rounded-2xl bg-white shadow-lg flex-[1] h-40 md:h-32" // Set same height
                  data-aos="fade-up"
                  data-aos-duration="1100"
                >
                  {forms ? (
                    <img
                      src={URL.createObjectURL(forms)}
                      alt="Preview"
                      className="h-full object-contain rounded-2xl"
                    />
                  ) : (
                    <span className="text-sm">No file</span>
                  )}
                </div>

                {/* File Upload Label */}
                <label
                  htmlFor="fileUpload"
                  className="cursor-pointer border-2 border-dashed border-white rounded-2xl bg-transparent flex flex-col items-center justify-center p-6 flex-[2] h-40 md:h-32" // Set same height
                  data-aos="fade-up"
                  data-aos-duration="1200"
                >
                  <div className="text-center">
                    <p className="text-gray-300">
                      <span className="underline">Click to upload</span> or drag and drop
                    </p>
                    <p className="text-sm text-gray-400">
                      Only PNG, JPG, JPEG files are supported
                    </p>
                  </div>
                  <input
                    id="fileUpload"
                    type="file"
                    accept=".png,.jpg,.jpeg"
                    className="hidden"
                    onChange={(e) => setForms(e.target.files ? e.target.files[0] : null)}
                  />
                </label>
              </div>

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
          className="absolute bottom-20 right-0 hidden h-full max-h-[400px] w-auto translate-x-28 md:block"
        />
      </div>
    </section>
  );
};

export default Konsultasi;
