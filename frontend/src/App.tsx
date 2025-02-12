import Navbar from "./components/Navbar"
import About from "./pages/About"
import Data from "./pages/Data"
import Home from "./pages/Home"
import Kasus from "./pages/Kasus"
import Konsultasi from "./pages/Konsultasi"
import Pengaruh from "./pages/Pengaruh"

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
    </>
  )
}

export default App
