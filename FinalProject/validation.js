function validateForm() {
    var x = document.forms["createPage"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["createPage"]["Alias"].value;
        x = x.replace( /\s/g, "");
        if (x==null || x=="") {
            alert("Alias must be filled out");
            return false;
    }
    var x = document.forms["createPage"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
    var x = document.forms["createPage"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
}



