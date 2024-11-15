$(function(){
    let MyCarManufacturers = ["Dacia", "Renault", "BMW", "Volvo"];

    
    let select = $("<select></select>");

    MyCarManufacturers.forEach(function(manufacturer) {
        let option = $("<option></option>").text(manufacturer);
        select.append(option);
    });

    $("body").append(select);

});  