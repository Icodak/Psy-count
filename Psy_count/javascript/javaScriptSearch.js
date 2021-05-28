function buildSearchBar(div) {

    var prenom_txt = document.createTextNode("Prénom");
    var prenom_p = document.createElement("p");
    prenom_p.appendChild(prenom_txt);
    var prenom_div = document.createElement("div");
    var prenom_input = document.createElement("input");
    var prenom_list = document.createElement("ul");
    prenom_div.appendChild(prenom_input);
    prenom_div.appendChild(prenom_list);
    prenom_div.classList = "search-div";
    prenom_list.classList = "search-list";

    function cleanList() {
        while (prenom_list.firstChild) {
            prenom_list.firstChild.remove()
        }
    }

    prenom_input.oninput = function () {
        $.ajax({
            url: "searchQuery.php",
            type: "GET",
            dataType: 'JSON',
            data: {
                search_value: prenom_input.value + "%",
                search_type: `prenom`
            }
        })
            .done(function (result) {
                //clean list
                cleanList();
                //populate list
                for (res of result) {
                    (function () {
                        var prenom_li_txt = document.createTextNode(res[0]);
                        var prenom_li = document.createElement("li");
                        prenom_li.onclick = function () {
                            prenom_input.value = prenom_li.textContent;
                            cleanList();
                        };
                        console.log(prenom_li);
                        prenom_li.appendChild(prenom_li_txt);
                        prenom_list.appendChild(prenom_li);
                    })()
                }
                console.log(result);
            })
            .fail(function (xhr, thrownError) {
                console.log(xhr);
                console.log(thrownError);
            });


    };

    prenom_list.onblur = function () {
        cleanList();
    }

    div.appendChild(prenom_p);
    div.appendChild(prenom_div);

}