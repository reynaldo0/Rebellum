import { Footer } from "./components/Footer"
import Navbar from "./components/Navbar"
import About from "./pages/landing/About"
import Data from "./pages/landing/Data"
import Dokumentasi from "./pages/landing/Dokumentasi"
import Home from "./pages/landing/Home"
import Kasus from "./pages/landing/Kasus"
import Konsultasi from "./pages/landing/Konsultasi"
import Pengaruh from "./pages/landing/Pengaruh"
import Team from "./pages/landing/Team"

function App() {
  return (
    <>
      <Navbar />
      <Home />
      <About />
      <Kasus />
      <Pengaruh />
      <Data />
      <Konsultasi />
      <Dokumentasi />
      <Team />
      <Footer />
    </>
  )
}

export default App
