function buildSearchInput(title, type) {
    var div = document.createElement("div");
    var search_txt = document.createTextNode(title);
    var search_p = document.createElement("p");
    search_p.appendChild(search_txt);
    var search_div = document.createElement("div");
    var search_input = document.createElement("input");
    var search_list = document.createElement("ul");
    search_input.disabled=true;
    search_div.appendChild(search_input);
    search_div.appendChild(search_list);
    search_div.classList = "search-div";
    search_list.classList = "search-list";

    div.setAttribute("class","text-And-input");

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
                console.log(result);
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

function createButtonResearch(Text){
    var button = document.createElement("input");
    button.setAttribute("class","button2");
    button.setAttribute("type","button");
    button.setAttribute("id","searchButton");
    button.disabled=true;
    button.value=Text;

    button.onclick = function()
    {
        var searchDiv = document.getElementsByClassName("search-div");
        firstInputVal = searchDiv[0].childNodes[0].value; 
        SecondInputVal = searchDiv[1].childNodes[0].value; 

        $.ajax({
            url: "researchPatient.php",
            type: "post",
            data: {
                researchElementOne: firstInputVal,
                researchElementTwo: SecondInputVal
            },
            success: function (result) {
                alert(result);
                $('#tableau').load('myPatient.php #tableau');
                $('#logicpage').load('myPatient.php #logicpage');
            }
        });
    }

    return button;
}


function buildSearchBar(div){
    div.appendChild(buildSearchInput("Prénom", "prenom"));
    div.appendChild(buildSearchInput("Nom", "nom"));
    div.appendChild( createButtonResearch("rechercher"));
}