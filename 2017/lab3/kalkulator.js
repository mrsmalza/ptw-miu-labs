function licz() {
    var a = parseInt(document.getElementById("a").value); 
    var b = parseInt(document.getElementById("b").value);
    var dzialanie = document.getElementById("dzialanie").value; 
    var wynik;

    switch (dzialanie) {
        case '+': wynik = a + b; break;
        case '-': wynik = a - b; break;
        case '*': wynik = a * b; break;
        case '/': wynik = a / b; break;
    }
    document.getElementById("wynik").innerHTML = wynik; 
}