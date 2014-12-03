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
}
function validateForm2()
{
    var x = document.forms["updatePage"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["updatePage"]["Alias"].value;
    x = x.replace( /\s/g, "");
    if (x==null || x=="") {
        alert("Alias must be filled out");
        return false;
    }
    var x = document.forms["updatePage"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
}
function formValidate3(){
    var x = document.forms["createArticle"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["createArticle"]["Title"].value;
    if (x==null || x=="") {
        alert("Title must be filled out");
        return false;
    }
    var x = document.forms["createArticle"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
    var x = document.forms["createArticle"]["Page"].value;
    if (x==null || x=="") {
        alert("Page must be filled out");
        return false;
    }
    var x = document.forms["createArticle"]["HTMLSnippet"].value;
    if (x==null || x=="") {
        alert("HTMLSnippet must be filled out");
        return false;
    }
}
function formValidate4(){
    var x = document.forms["updateArticle"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["updateArticle"]["Title"].value;
    if (x==null || x=="") {
        alert("Title must be filled out");
        return false;
    }
    var x = document.forms["updateArticle"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
    var x = document.forms["updateArticle"]["Page"].value;
    if (x==null || x=="") {
        alert("Page must be filled out");
        return false;
    }
    var x = document.forms["updateArticle"]["HTMLSnippet"].value;
    if (x==null || x=="") {
        alert("HTMLSnippet must be filled out");
        return false;
    }
}
function formValidate5(){
    var x = document.forms["updateContent"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["updateContent"]["Alias"].value;
    if (x==null || x=="") {
        alert("Alias must be filled out");
        return false;
    }
    var x = document.forms["updateContent"]["Order"].value;
    if (x==null || x=="") {
        alert("Order must be filled out");
        return false;
    }
    var x = document.forms["updateContent"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
}
function validateForm6(){
    var x = document.forms["createContent"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["createContent"]["Alias"].value;
    if (x==null || x=="") {
        alert("Alias must be filled out");
        return false;
    }
    var x = document.forms["createContent"]["Order"].value;
    if (x==null || x=="") {
        alert("Order must be filled out");
        return false;
    }
    var x = document.forms["createContent"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
}
function validateForm7(){
    var x = document.forms["updateTemplate"]["Name"].value;
    if (x==null || x=="") {
        alert("name must be filled out");
        return false;
    }
    var x = document.forms["updateTemplate"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
    var x = document.forms["updateTemplate"]["CSSSnippet"].value;
    if (x==null || x=="") {
        alert("CSS snippet must be filled out");
        return false;
    }
}
function validateForm8(){
    var x = document.forms["createTemplate"]["Name"].value;
    if (x==null || x=="") {
        alert("name must be filled out");
        return false;
    }
    var x = document.forms["createTemplate"]["Description"].value;
    if (x==null || x=="") {
        alert("Description must be filled out");
        return false;
    }
    var x = document.forms["createTemplate"]["CSSSnippet"].value;
    if (x==null || x=="") {
        alert("CSS snippet must be filled out");
        return false;
    }
}
function validateForm9(){
    var x = document.forms["updateUser"]["first_name"].value;
    if (x==null || x=="") {
        alert("first name must be filled out");
        return false;
    }
    var x = document.forms["updateUser"]["last_name"].value;
    if (x==null || x=="") {
        alert("last name must be filled out");
        return false;
    }
    var x = document.forms["updateUser"]["user_name"].value;
    if (x==null || x=="") {
        alert("user name must be filled out");
        return false;
    }
    var x = document.forms["updateUser"]["password"].value;
    if (x==null || x=="") {
        alert("password must be filled out");
        return false;
    }
    var x = document.forms["updateUser"]["salt"].value;
    if (x==null || x=="") {
        alert("salt must be filled out");
        return false;
    }
}
function validateForm10(){
    var x = document.forms["createUser"]["first_name"].value;
    if (x==null || x=="") {
        alert("first name must be filled out");
        return false;
    }
    var x = document.forms["createUser"]["last_name"].value;
    if (x==null || x=="") {
        alert("last name must be filled out");
        return false;
    }
    var x = document.forms["createUser"]["user_name"].value;
    if (x==null || x=="") {
        alert("user name must be filled out");
        return false;
    }
    var x = document.forms["createUser"]["password"].value;
    if (x==null || x=="") {
        alert("password must be filled out");
        return false;
    }
    var x = document.forms["createUser"]["salt"].value;
    if (x==null || x=="") {
        alert("salt must be filled out");
        return false;
    }
}

