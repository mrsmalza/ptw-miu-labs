function math() {
    var no1;
    var no2;
    var kurs_pln = 1.00;
    var kurs_eur = 4.55;
    var kurs_usd = 3.27;
    switch (przelicznik.stay.value) {
        case "PLN":
            no1 = przelicznik.ile.value * kurs_pln;
            break;
        case "EUR":
            no1 = przelicznik.ile.value * kurs_eur;
            break;
        case "USD":
            no1 = przelicznik.ile.value * kurs_usd;
            break;
        default:
            no1 = "Error";
    }
    switch (przelicznik.exchange.value) {
        case "PLN":
            no2 = no1 / kurs_pln;
            break;
        case "EUR":
            no2 = no1 / kurs_eur;
            break;
        case "USD":
            no2 = no1 / kurs_usd;
            break;
        default:
            no2 = "Error";
    }
    przelicznik.wynik.value = Math.round(no2 * 100) / 100;
}