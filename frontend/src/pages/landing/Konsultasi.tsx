export const Konsultasi = () => {
    return (
      <section id="konsultasi" className="w-full overflow-x-hidden">
        <div className="relative w-full sm:w-[90%]">
          <div
            className="flex items-center bg-primary-200 px-4 py-5 sm:rounded-r-full sm:pl-5"
          >
            <div className="container ml-0 w-full sm:ml-8 sm:w-[70%] md:ml-14">
              <h1 className="text-2xl font-bold text-white sm:text-3xl">
                Hindari kenakalan, ceritakan pada kami!
              </h1>
              <p className="my-5 text-xs text-white sm:text-sm">
                Kami memiliki layanan untuk bisa berkonsultasi dengan kami, kami
                tim Rebellum akan selalu memberikan saran dan bimbingan kepadamu!
                Masukkan nama dan email kamu dengan benar!
              </p>
  
              <form className="flex flex-col">
                <input
                  data-aos="fade-right"
                  type="text"
                  placeholder="Masukkan nama"
                  className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                />
                <input
                  data-aos="fade-right"
                  type="email"
                  placeholder="Masukkan email"
                  className="my-2 rounded-2xl border-none pl-4 py-1 focus:ring-yellow"
                />
                <textarea
                  data-aos="fade-right"
                  className="my-2 max-h-28 rounded-2xl border-none p-2 pl-4 focus:ring-yellow"
                  cols={30}
                  placeholder="Masukkan keluhan anda"
                ></textarea>
                <button
                  type="button"
                  className="mt-2 w-full md:w-[100px] rounded-l-3xl rounded-r-3xl bg-yellow px-5 py-3 text-white"
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
      </section>
    )
  }
  
  export default Konsultasi