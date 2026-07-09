// latihan 1
const hargaBarang = 120000;
const diskon = 25;
const hargaDiskon = hargaBarang * diskon / 100;

const hargaSetelahDiskon = hargaBarang - hargaDiskon;

console.log("Harga setelah diskon: " + hargaSetelahDiskon);
console.log("Harga diskon: " + hargaDiskon);

// latihan 2
const nilai = 75;
if (nilai >= 85) {
  console.log("Grade: A");
} else if (nilai >= 70) {
  console.log('Grade: B');
} else if (nilai >= 55) {
  console.log("Grade: C");
} else {
  console.log("Grade: D");
}

// latihan 3
let total = 0;
for (let i = 1; i <= 100; i++) {
  total += i;
}

console.log('total penjumlahan ' + total);

// latihan 4 
for (let i = 1; i <= 5; i++) {
  let baris = "";
  for (let j = 1; j <= i; j++)baris += "*";
  console.log(baris);
}

// latihan 5
let berat = 10;
let zona = "luar";
let tarif = zona === "dalam" ? 10000 : 18000;

// Cara lama
// if (zona == "dalam") {
//   tarif = 10000;
// } else {
//   tarif = 18000;
// }

let totalOngkir = berat * tarif;
console.log('totalOngkir sebelum diskon: ' + totalOngkir);

if (totalOngkir > 100000) totalOngkir = totalOngkir - (totalOngkir * 0.1)
console.log(totalOngkir)

// Latihan 6
function hitung(a, b, operator) {
  if (operator === "+")
    return a + b;
  else if (operator === "-")
    return a - b;
  else if (operator === "*")
    return a * b;
  else if (operator === "/")
    return b === 0 ? "Error: bagi nol" : a / b;
  else
    return "Error: Operator tidak dikenal";
}