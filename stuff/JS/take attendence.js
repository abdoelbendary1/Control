const card = document.querySelector(".card"),
  qrInput = card.querySelector(".form input"),
  generateBtn = card.querySelector(".form button"),
  qrImg = card.querySelector(".qr-code img");
let preValue;
generateBtn.addEventListener("click", () => {
  let qrValue = "https://www.google.com/";
  if (!qrValue || preValue === qrValue) return;
  preValue = qrValue;
  generateBtn.innerText = "Generating QR Code...";
  qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
  qrImg.addEventListener("load", () => {
    card.classList.add("active");
    generateBtn.innerText = "Generate QR Code";
  });
});
qrInput.addEventListener("keyup", () => {
  if (!qrInput.value.trim()) {
    card.classList.remove("active");
    preValue = "";
  }
});
