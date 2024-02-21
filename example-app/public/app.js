import './bootstrap';
document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");
    let slideIndex = 0;
  
    function showSlide(index) {
      const translateValue = -index * 100 + "%";
      slider.style.transform = "translateX(" + translateValue + ")";
    }
  
    function nextSlide() {
      if (slideIndex < slider.children.length - 1) {
        slideIndex++;
      } else {
        slideIndex = 0;
      }
      showSlide(slideIndex);
    }
  
    function prevSlide() {
      if (slideIndex > 0) {
        slideIndex--;
      } else {
        slideIndex = slider.children.length - 1;
      }
      showSlide(slideIndex);
    }
  
    setInterval(nextSlide, 3000); // Chuyển slide tự động mỗi 3 giây
  
    // Thêm sự kiện click cho phần slider
    slider.addEventListener("click", nextSlide);
  
    // Các sự kiện cho nút next và prev (có thể thêm nút vào HTML để kích hoạt)
    // document.querySelector(".next").addEventListener("click", nextSlide);
    // document.querySelector(".prev").addEventListener("click", prevSlide);
  });