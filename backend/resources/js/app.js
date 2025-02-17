import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    localStorage.setItem('color-theme', 'light');


    document.documentElement.classList.remove("dark"); // Paksa hapus dark
    document.documentElement.classList.add("light"); // Tambahkan light sebagai referensi
});
