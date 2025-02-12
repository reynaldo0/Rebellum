import { Footer } from "./components/Footer"
import Navbar from "./components/Navbar"
import About from "./pages/About"
import Data from "./pages/Data"
import Dokumentasi from "./pages/Dokumentasi"
import Home from "./pages/Home"
import Kasus from "./pages/Kasus"
import Konsultasi from "./pages/Konsultasi"
import Pengaruh from "./pages/Pengaruh"
import Team from "./pages/Team"

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
