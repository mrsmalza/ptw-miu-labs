function edit_row(no) {
    document.getElementById("edit" + no).style.display = "none";
    document.getElementById("save" + no).style.display = "block";

    var actor = document.getElementById("actor_row" + no);
    var role = document.getElementById("role_row" + no);
    var season = document.getElementById("season_row" + no);

    var actor_data = actor.innerHTML;
    var role_data = role.innerHTML;
    var season_data = season.innerHTML;

    actor.innerHTML = "<input type='text' id='actor_text" + no + "' value='" + actor_data + "'>";
    role.innerHTML = "<input type='text' id='role_text" + no + "' value='" + role_data + "'>";
    season.innerHTML = "<input type='text' id='season_text" + no + "' value='" + season_data + "'>";
}

function save_row(no) {
    var actor_val = document.getElementById("actor_text" + no).value;
    var role_val = document.getElementById("role_text" + no).value;
    var season_val = document.getElementById("season_text" + no).value;

    document.getElementById("actor_row" + no).innerHTML = actor_val;
    document.getElementById("role_row" + no).innerHTML = role_val;
    document.getElementById("season_row" + no).innerHTML = season_val;

    document.getElementById("edit" + no).style.display = "block";
    document.getElementById("save" + no).style.display = "none";
}

function delete_row(no) {
    document.getElementById("row" + no + "").outerHTML = "";
}

function add_row() {
    var new_actor = document.getElementById("new_actor").value;
    var new_role = document.getElementById("new_role").value;
    var new_season = document.getElementById("new_season").value;

    var table = document.getElementById("Sezon2");
    var table_len = (table.rows.length) - 1;
    var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='actor_row" + table_len + "'>" + new_actor + "</td><td id='role_row" + table_len + "'>" + new_role + "</td><td id='season_row" + table_len + "'>" + new_season + "</td><td><input type='button' id='edit_button" + table_len + "' value='Edit' class='edit' onclick='edit_row(" + table_len + ")'> <input type='button' id='save_button" + table_len + "' value='Save' class='save' onclick='save_row(" + table_len + ")'> <input type='button' value='Delete' class='delete' onclick='delete_row(" + table_len + ")'></td></tr>";

    document.getElementById("new_actor").value = "";
    document.getElementById("new_role").value = "";
    document.getElementById("new_season").value = "";
}