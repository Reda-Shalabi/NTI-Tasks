window.onload = function () {
  document.getElementById("welcome-text").textContent = "أهلاً بك في موقعنا!";
};

document.getElementById("name").addEventListener("input", function () {
  let name = this.value.trim();
  let message = document.getElementById("message");

  if (name.length > 0) {
    message.textContent = `مرحبًا يا ${name} `;
  } else {
    message.textContent = "";
  }
});