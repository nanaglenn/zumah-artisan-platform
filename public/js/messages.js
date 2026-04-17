/**
 * Created by Glenn on 19/03/2019.
 */
var alertsCounter = 0;
function capitalizeFirst(toCapitalize){
    var response = toCapitalize.charAt(0).toUpperCase();

    for (var iterator = 1; iterator < toCapitalize.length; iterator++){
        response += toCapitalize.charAt(iterator);
    }
    return response;
}

function showAlert(type, message){

    var alert = document.createElement("DIV");
    alert.className = "new-custom-alert";
    alert.id = "custom-alert-"+alertsCounter;

    var closeSpan = document.createElement("SPAN");
    closeSpan.className = "closebtn";
    closeSpan.setAttribute("data-alert-id", "custom-alert-"+alertsCounter);
    closeSpan.setAttribute("onclick", "closeAlert(this.getAttribute('data-alert-id'))");
    closeSpan.innerHTML = "&times;";

    var title = document.createElement("STRONG");
    title.innerHTML = capitalizeFirst(type)+" !";

    var lineBreak = document.createElement("BR");

    var alertMessage = document.createElement("SPAN");
    alertMessage.innerHTML = message;

    // if(type === "success"){
    //     alert.className = "new-custom-alert"
    // }else if(type === "error"){
    //     alert.className = "new-custom-alert"
    // }

    alert.appendChild(closeSpan);
    alert.appendChild(title);
    alert.appendChild(lineBreak);
    alert.appendChild(alertMessage);

    alert.style.display = "block";
    alert.style.opacity = "1";
    setTimeout(function(){ alert.style.display = "none"; }, 5000);
    document.getElementById("alerts-container").style.display = "block";
    document.getElementById("alerts-container").appendChild(alert);
    ++alertsCounter;
}

function closeAlert(alertId){
    var alert = document.getElementById(alertId);
    setTimeout(function(){ alert.style.display = "none"; }, 5000);
    alert.style.opacity = "0";
    $(alertId).remove();
}

function showConfirm(itemId, title, message, positive, negative){
    document.getElementById("confirm-title").innerHTML = capitalizeFirst(title);
    document.getElementById("confirm-message").innerHTML = message;

    document.getElementById("confirm-positive").innerHTML = positive;
    document.getElementById("confirm-positive").setAttribute('data-for', title);
    document.getElementById("confirm-positive").setAttribute('data-id', itemId);

    document.getElementById("confirm-negative").innerHTML = negative;
    document.getElementById("confirm-negative").setAttribute('data-for', title);
    document.getElementById("confirm-negative").setAttribute('data-id', itemId);

    var confirm = document.getElementById("customConfirmBox");
    confirm.style.display = "block";
    confirm.style.opacity = "1";
    document.getElementById("alerts-container").appendChild(confirm);
}

function closeConfirm(){
    var confirm = document.getElementById("customConfirmBox");
    setTimeout(function(){ confirm.style.display = "none"; }, 500);
    confirm.style.opacity = "0";
}

function confirmResponse(buttonClicked){
    var dataFor = buttonClicked.getAttribute("data-for");
    var dataId = buttonClicked.getAttribute("data-id");
    var dataStatus = buttonClicked.getAttribute("data-status");

    switch (dataFor){
        case "Delete Image":
            if (dataStatus == 1){
                deleteServiceImage(dataId);
            }
            else
                closeConfirm();
            break;
        case "Delete Service":
            if (dataStatus == 1)
                deleteService(dataId);//PASS SERVICE ID TO deleteServiceImage Function
            else
                closeConfirm();
            break
    }
}
