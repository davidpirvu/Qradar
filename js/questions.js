// TODO Prelucrare tabel din db

function getQuestionHTML(question) {
    var id = question.id;                     // validare variabila (valoarea ei)
    var text = question.question || '';       // validare variabila (valoarea ei sau nimic)
    var raspuns      = '';                    // validare variabila (valoarea ei sau nimic)
    // question.answers; // TODO random
    question.answers.forEach(function (answer) {
        raspuns += '<label><input type="radio" name="'+ id + '"> ' + answer + '</label><br>';
    });
    var row ='<div class="question"><h2>' + text + '</h2><div>' + raspuns + '</div></div>';
    return row;
}

var divContent = '';                                    // creez o variabila goala in care voi pune continut

function createDiv(question) {
    divContent += getQuestionHTML(question);            // adaug in divContent continutul rezultat din functia getQuestionHTML. lipeste unul dupa unu
}

$.ajax('date/list-db.php').done(function(intrebari){    // make ajax call to php file
    var intrebareJson = JSON.parse(intrebari);          // convert string response to json (using parseJSON function)
    console.warn('intrebari din php: ', intrebareJson); // afiseaza in consola
    intrebareJson.forEach(createDiv);                   // se creaza un string din variabila contacte, in care am stocat datele venite de pe server
    $("#quiz-container").html(divContent);              // generare HTML
});