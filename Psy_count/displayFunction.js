function display(table) { //This works for all kinds of elements (except google charts :D)
    if (table.style.display == "") {
        table.style.display = "block";
    } else if (table.style.display == "block") {
        table.style.display = "";
    }

}