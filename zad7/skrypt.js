function wyznacz() {
    let polak = document.getElementById("polak").value;
    let nowak = document.getElementById("nowak").value;
    let rysik = document.getElementById("rysik").value;

    if (polak == "" || nowak == "" || rysik == "") {
        alert('wpisz poprawne dane');
    }
    else {
        let polakNum = parseFloat(polak);
        let nowakNum = parseFloat(nowak);
        let rysikNum = parseFloat(rysik);

        let najwyzszaSrednia = Math.min(polakNum, nowakNum, rysikNum);

        document.getElementById("wynik").innerHTML = "Najniższa średnia: " + najwyzszaSrednia;
    }
}