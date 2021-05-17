function display(id, table) { //This works for all kinds of elements (except google charts :D)
    if (table.style.display == "") {
        //alert("GIT");
        table.style.display = "block";

    } else if (table.style.display == "block") {
        //alert("GUD");
        table.style.display = "";
    }

}