function cekNilai() {

let nim = document.getElementById("nim").value;
let nama = document.getElementById("nama").value;

let n1 = parseFloat(document.getElementById("n1").value); //masing masing matkul
let n2 = parseFloat(document.getElementById("n2").value);
let n3 = parseFloat(document.getElementById("n3").value);
let n4 = parseFloat(document.getElementById("n4").value);
let n5 = parseFloat(document.getElementById("n5").value);

let hasil = document.getElementById("hasil");

if(
    n1 < 0 || n1 > 100 ||
    n2 < 0 || n2 > 100 ||
    n3 < 0 || n3 > 100 ||
    n4 < 0 || n4 > 100 ||
    n5 < 0 || n5 > 100
){
    hasil.innerHTML = "Nilai tidak valid!"; //kalo diluar rentang
    return;
}

let rata = (n1 + n2 + n3 + n4 + n5) / 5; //ngitung rata rata

let huruf;

if (rata >= 80){
    huruf = "A";
}else if (rata >= 70){
    huruf = "B";
}else if (rata >= 60){
    huruf = "C";
}else if (rata >= 50){
    huruf = "D";
}else{
    huruf = "E";
}

hasil.innerHTML =
"NIM            : " + nim + "<br>" +
"Nama           : " + nama + "<br>" +
"Rata-rata Nilai: " + rata.toFixed(2) + "<br>" +
"Huruf Mutu     : " + huruf;

}

function resetForm() {
    document.getElementById("nim").value ="";
    document.getElementById("nama").value ="";
    document.getElementById("n1").value ="";
    document.getElementById("n2").value ="";
    document.getElementById("n3").value ="";
    document.getElementById("n4").value ="";
    document.getElementById("n5").value ="";
    document.getElementById("hasil").innerHTML ="";
}