export default function toggleAccordion(button: HTMLButtonElement) {
    const accordionItem = button.closest(".accordion-item");
    const content = accordionItem?.querySelector(".accordion-content");
    const plusIcon = button.querySelector(".plus-icon");
    const minusIcon = button.querySelector(".minus-icon");
    const allAccordionItems = document.querySelectorAll(".accordion-item");

    allAccordionItems.forEach((item) => {
        if (item !== accordionItem && item.classList.contains("open")) {
            const activeButton = item.querySelector(".accordion-title");
            activeButton?.classList.remove("bg-primary-300"); // Mengembalikan opasitas tombol yang tidak diklik
            item.classList.remove("open");
            item.querySelector(".accordion-content")?.classList.add("hidden");
            item.querySelector(".plus-icon")?.classList.remove("hidden");
            item.querySelector(".minus-icon")?.classList.add("hidden");
        }
    });

    if (content?.classList.contains("hidden")) {
        content.classList.remove("hidden");
        accordionItem?.classList.add("open");
        plusIcon?.classList.add("hidden");
        minusIcon?.classList.remove("hidden");
        button.classList.add("bg-primary-300"); // Mengurangi opasitas tombol yang diklik
    } else {
        content?.classList.add("hidden");
        accordionItem?.classList.remove("open");
        plusIcon?.classList.remove("hidden");
        minusIcon?.classList.add("hidden");
        button.classList.remove("bg-primary-300"); // Mengembalikan opasitas tombol yang tidak diklik
    }
}