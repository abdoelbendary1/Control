// Search function
function searchBook(val) {
  const books = document.getElementById("myTable");
  const values = books.querySelectorAll("tr");
  const regex = /[\s]+/g;
  values.forEach((value) => {
    const text = value.innerText.replace(regex, "").toLowerCase();
    if (text.indexOf(val) != -1) {
      value.style.display = "table-row";
    } else {
      value.style.display = "none";
    }
  });
}

// Searching Book
document.getElementById("search").addEventListener("keyup", (e) => {
  searchBook(e.target.value.toLowerCase());
});

document.getElementById("search-btn").addEventListener("click", (e) => {
  e.preventDefault();
  if (e.target.previousElementSibling.value !== "") {
    searchBook(e.target.previousElementSibling.value.toLowerCase());
  } else {
    alert("Empty search!", "info");
  }
});
