import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import 'flowbite'
import App from './App.tsx'

import Aos from 'aos';
import 'aos/dist/aos.css'

Aos.init({
})

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <App />
  </StrictMode>,
)
