function buildSearchInput(title, type) {
    var div = document.createElement("div");
    var search_txt = document.createTextNode(title);
    var search_p = document.createElement("p");
    search_p.appendChild(search_txt);
    var search_div = document.createElement("div");
    var search_input = document.createElement("input");
    var search_list = document.createElement("ul");
    search_div.appendChild(search_input);
    search_div.appendChild(search_list);
    search_div.classList = "search-div";
    search_list.classList = "search-list";

    function cleanList() {
        while (search_list.firstChild) {
            search_list.firstChild.remove()
        }
    }

    search_input.oninput = function () {
        $.ajax({
            url: "searchQuery.php",
            type: "GET",
            dataType: 'JSON',
            data: {
                search_value: search_input.value + "%",
                search_type: type
            }
        })
            .done(function (result) {
                //clean list
                cleanList();
                //populate list
                for (res of result) {
                    (function () {
                        var search_li_txt = document.createTextNode(res[0]);
                        var search_li = document.createElement("li");
                        search_li.onclick = function () {
                            search_input.value = search_li.textContent;
                            cleanList();
                        };
                        console.log(search_li);
                        search_li.appendChild(search_li_txt);
                        search_list.appendChild(search_li);
                    })()
                }
                console.log(result);
            })
            .fail(function (xhr, thrownError) {
                console.log(xhr);
                console.log(thrownError);
            });


    };

    search_list.onblur = function () {
        cleanList();
    }

    div.appendChild(search_p);
    div.appendChild(search_div);

    return div;

}

function buildSearchBar(div){
    div.appendChild(buildSearchInput("Prénom", "prenom"));
    div.appendChild(buildSearchInput("Nom", "nom"));
}