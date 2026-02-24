/* Dla początkujących */
function sprawdz2() {
    const produkty = ['p1', 'p2', 'p3', 'p4']
    for (let i = 0; i < produkty.length; i++) {
        let ilosc = document.getElementById(produkty[i]).innerHTML
        let produkt = document.getElementById(produkty[i])
        if (ilosc == 0) {
            produkt.style = 'background-color: red;'
        }
        if (ilosc >= 1 && ilosc <= 5) {
            produkt.style = 'background-color: yellow;'
        }
        if (ilosc > 5) {
            produkt.style = 'background-color: Honeydew;'
        }
    }
}

function aktualizuj(produktID) {
    const produkt = document.getElementById(produktID)
    const nowaIlosc = prompt('Podaj nową ilość:')
    produkt.innerHTML = nowaIlosc
    sprawdz2()
}

let idZamowienia = 0
function zamow(nazwaProduktu) {
    alert('Zamówienie nr: ' + idZamowienia + ' Produkt: ' + nazwaProduktu)
    idZamowienia++
}
sprawdz2()