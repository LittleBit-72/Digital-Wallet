// Fungsi untuk menyembunyikan dan menampilkan navbar
function toggleNav() {
var navbar = document.getElementById("navbar");
var hideBtn = document.getElementById("hideBtn");

if (navbar.style.width === "15px") {
// Jika navbar tersembunyi, tampilkan kembali
navbar.style.width = "185px";
hideBtn.style.display = "block"; // Tampilkan tombol hide
var links = navbar.querySelectorAll('a');
links.forEach(link => link.style.display = 'block'); // Tampilkan semua link
} else {
// Jika navbar ditampilkan, sembunyikan
navbar.style.width = "15px";
hideBtn.style.display = "block"; // Tetap tampilkan tombol hide
var links = navbar.querySelectorAll('a');
links.forEach(link => link.style.display = 'none'); // Sembunyikan semua link
}
}