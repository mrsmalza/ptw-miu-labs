function add_row() {
    var new_lp = document.getElementById("new_lp").value; 
    var new_name = document.getElementById("new_name").value; 
    var new_surname = document.getElementById("new_surname").value;
    var new_email = document.getElementById("new_email").value;
    var new_age = document.getElementById("new_age").value;
    var new_date = document.getElementById("new_date").value;
    var new_sex = document.getElementById("new_sex").value;
    var new_group1 = document.getElementById("new_group1").value;


    var table = document.getElementById("Sezon2");
    var table_len = (table.rows.length) - 1; 

    
    
    document.getElementById("new_lp").value = "";
    document.getElementById("new_name").value = "";
    document.getElementById("new_surname").value = "";
    document.getElementById("new_email").value = "";
    document.getElementById("new_age").value = "";
    document.getElementById("new_date").value = "";
    document.getElementById("new_sex").value = "";
    document.getElementById("new_group1").value = "";

    var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='lp_row" + table_len + "'>" + new_lp + "</td><td id='name_row" + table_len + "'>" + new_name + "</td><td id='surname_row" + table_len + "'>" + new_surname + "</td><td id='email_row" + table_len + "'>" + new_email + "</td><td id='age_row" + table_len + "'>" + new_age + "</td><td id='date_row" + table_len + "'>" + new_date + "</td><td id='sex_row" + table_len + "'>" + new_sex + "</td><td id='group1_row" + table_len + "'>" + new_group1;

}