
let id = $("input[name*='book_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let bookname = $("input[name*='book_name']");
    let bookpublisher = $("input[name*='book_publisher']");
    let phone = $("input[name*='contact']");
    let bookprice = $("input[name*='book_price']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookpublisher.val(textvalues[2]);
    phone.val(textvalues[3]);
    bookprice.val(textvalues[4].replace("TZ", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}