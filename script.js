$(start);


let MyCarsArray = ["Dacia", "Renault", "BMW", "Volvo"];


function start() {

    
    let NewSelectList = $("<select>");
    for (let i = 0; i < MyCarsArray.length; i++) {
        let newOption = $("<option>");
        newOption.html(MyCarsArray[i]);
        NewSelectList.append(newOption);
    }
    NewSelectList.on("change", function() {
        alert($(this).val());
    });
};