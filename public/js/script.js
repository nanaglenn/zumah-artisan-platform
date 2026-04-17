/**
 * Created by Glenn on 20/02/2019.
 */
var aboutENG = [
    "Zumah is coined from the Xhosa word, xhuma, a language commonly spoken by the people of the Zulu clan in South Africa. And it simply means connect.",
    "Zumah is a total services hub, connecting all service providers to people who require these and vice versa. Every single service can be found on this platform, from a programmer, a business consultant to a carpenter near you.",
    "The platform works per your given location, bringing out every single service you seek from the remotest place you could find yourself. Zumah helps you develop your services via AD campaigns and targeted marketing techniques to help you reach wide a variety of audience.",
    "Anyone can post their services and anyone can use any of the services from the platform in diverse ways. It is flexible, easy to use works with total efficiency.",
    "Zumah is currently the only platform of its kind in Africa, working solely in 360 degrees services."
];

var aboutTWI = [
    "Zumah y3 as3mfua bi a y3nya firii Xhosa kasa mu a 3y3 Xhuma. Na Xhosa y3 kasa a Zulufo) a w)firi South Africa 3ka. Xhuma ne nkyer3ase3 ne nkabomde3",
    "Zumah y3 as3nka agua bi a 3boa ma nnipa a w)hia mmoa anaa )som w) nne3ma ahodo) mu tumi hyia w)n a w)ma mmoa anaa )som w) saa nne3ma no nso mu.",
    "Mmoa biara a wohia, efiri K)mputa ho dwumadie ek)si duadwumfo) nso adwumadie ho no, Zumah boa ma w)n a w)hia saa )som yi hyia w)n a w)ma saa )som yi.",
    "Zumah de beae3 a wote na 3y3 n'adwuma. 3nfa ho baabibiara a wote, Zumah boa ma wonya nnipa a w)b3 ma wo mmoa w) )fa biara mu w) mmer3 tiawa bi mu p3.",
    "Zumah nso boa ma w'adwuma tu mp)n. Y3hw3 so s3 wob3tumi aka w'adwuma ho as3m anaa atwer3 nne3ma kakra bi afa w'adwuma ho a y3fr3 no adv3te.",
    "Obiara b3tumi ay3 ne nne3 w) Zumah so efiri s3 3kwan a w)fa so 3y3 nne3ma 3w) Zumah so nny3 den na Zumah nso ma mmuae3 s3de3 3s3 fata.",
    "Sesei a y3kasa yi, Zumah p3 ne as3nka agua a w)firi Africa a w)di saa adwumadie yi anaa mpo w)ma saa )som yi."
];

function switchAboutLanguage(switcher){
    var aboutInnerHolder = document.getElementById("about-inner-holder");
    var iterator, paragraph;

    if (switcher.getAttribute("data-current-Lang") === "ENG"){
        aboutInnerHolder.innerHTML = "";
        for (iterator = 0; iterator < aboutTWI.length; iterator++){
            paragraph = document.createElement('P');
            paragraph.innerHTML = aboutTWI[iterator];
            aboutInnerHolder.appendChild(paragraph);
        }
        switcher.setAttribute("data-current-Lang", "TWI");
        switcher.innerHTML = "Get this page in English";
    } else{

        aboutInnerHolder.innerHTML = "";
        for (iterator = 0; iterator < aboutENG.length; iterator++){
            paragraph = document.createElement('P');
            paragraph.innerHTML = aboutENG[iterator];
            aboutInnerHolder.appendChild(paragraph);
        }
        switcher.setAttribute("data-current-Lang", "ENG");
        switcher.innerHTML = "Get this page in Twi";
    }
}

function showOverlay(overlayId) {
    document.getElementById(overlayId).style.display = "flex";
    document.getElementsByTagName("body")[0].className = "no-scroll";
}

function hideOverlay(overlayId) {
    document.getElementById(overlayId).style.display = "none";
    document.getElementsByTagName("body")[0].className = "";
}

function termsAndConditionsClicked() {
    var toTopArrow = document.getElementById('sign-up-to-top-arrow');
    if(toTopArrow.style.display === "none")
        toTopArrow.style.display = "inline-block";
    else
        toTopArrow.style.display = "inline-block";
}

function switchForCollapsibles(id){
    if(document.getElementById(id).style.display === "block")
        document.getElementById(id).style.display = "none";
    else
        document.getElementById(id).style.display = "block";
}

//CHECK BOX ACTIVITY
function checkBoxState(checkBoxId){
    if (document.getElementById(checkBoxId).getAttribute("checked") === "checked")
        document.getElementById(checkBoxId).setAttribute("checked", "");
    else if (document.getElementById(checkBoxId).getAttribute("checked") === "")
        document.getElementById(checkBoxId).setAttribute("checked", "checked");
}

function businessRegisteredCBChangeState(checkBox){
    if (checkBox.hasAttribute("checked")){
        checkBox.removeAttribute("checked")
    } else {
        checkBox.setAttribute("checked","");
    }
}

function businessRegistered(checkBox){
    if (checkBox.hasAttribute("checked")){
        if (checkBox.id === "gbi-business-registered") {
            document.getElementById("gbi-business-reg-no").setAttribute("disabled", "");
            document.getElementById("gbi-tin-number").setAttribute("disabled", "");
        } else if(checkBox.id === "new-service-gbi-business-registered"){
            document.getElementById("new-service-gbi-business-reg-no").setAttribute("disabled", "");
            document.getElementById("new-service-gbi-tin-number").setAttribute("disabled", "");
        } else if(checkBox.id === "edit-service-gbi-business-registered"){
            document.getElementById("edit-service-gbi-business-reg-number").setAttribute("disabled", "");
            document.getElementById("edit-service-gbi-tin-number").setAttribute("disabled", "");
        }
    } else {
        if (checkBox.id === "gbi-business-registered") {
            document.getElementById("gbi-business-reg-no").removeAttribute("disabled");
            document.getElementById("gbi-tin-number").removeAttribute("disabled");
        } else if(checkBox.id === "new-service-gbi-business-registered"){
            document.getElementById("new-service-gbi-business-reg-no").removeAttribute("disabled");
            document.getElementById("new-service-gbi-tin-number").removeAttribute("disabled");
        } else if(checkBox.id === "edit-service-gbi-business-registered"){
            document.getElementById("edit-service-gbi-business-reg-number").removeAttribute("disabled");
            document.getElementById("edit-service-gbi-tin-number").removeAttribute("disabled");
        }
    }
}

function crownService(crown) {
    if (crown.getAttribute("data-crowned") === "0") {
        crown.className = "fas fa-crown crown";
        crown.setAttribute("data-crowned", "1");

    } else if (crown.getAttribute("data-crowned") === "1"){
        crown.className = "fas fa-crown de-crown";
        crown.setAttribute("data-crowned", "0");
    }
}

//IMAGE VALIDATION
function imageValidation(type, fileInputId, imagePreviewPanel){
    var imageInput = document.getElementById(fileInputId);
    var imagePath = imageInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(imagePath)){
        showAlert("Error", 'Please upload image with extensions .jpeg,.jpg,.png or .gif only.');
        imageInput.value = '';
        return false;
    }else{
        //Image preview
         if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById(imagePreviewPanel).innerHTML = '<img src="'+e.target.result+'" style="width: 100%; height: -webkit-fill-available"/>';
                if (type === "create")
                    newImageCounter++;
            };
            reader.readAsDataURL(imageInput.files[0]);
         }
    }
}

// $(document).on('input', '.text-to-copy-container', function(){
//     alert('Input changed');
// });
//
// $('.text-to-copy-container').on('input', function(){
//     alert('Static input');
// });

function copyServiceUrlToClipboard(textToCopy) {
    // var textToCopy = document.getElementById(textToCopy);

    var dummyForm = document.createElement("FORM");
    var dummyInputElement = document.createElement("INPUT");

    dummyForm.appendChild(dummyInputElement);
    document.body.appendChild(dummyForm);
    dummyForm.className = "text-to-copy-container";

    dummyInputElement.setAttribute("type", "text");

    dummyInputElement.className = "text-to-copy-container";

    // document.body.appendChild(dummyInputElement);
    dummyInputElement.setAttribute("value", textToCopy);
    // dummyInputElement.select();
    // document.execCommand("copy");
    // document.body.removeChild(dummyInputElement);
    // showAlert("Success", "Link to service copied to clipboard.");

    if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
        var el = dummyInputElement;
        var editable = el.contentEditable;
        var readOnly = el.readOnly;
        el.contentEditable = true;
        el.readOnly = false;
        var range = document.createRange();
        range.selectNodeContents(el);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
        el.setSelectionRange(0, 999999);
        el.contentEditable = editable;
        el.readOnly = readOnly;
    } else {
        dummyInputElement.select();
    }
    document.execCommand('copy');
    dummyInputElement.blur();
    showAlert("Success", "Link to service copied to clipboard.");
}

var newImageCounter = 0;
function unsetImagePreview(type, serviceImagePreview) {
    switch (type){
        case "create":
            if (newImageCounter > 1) {
                document.getElementById(serviceImagePreview).innerHTML = "";
                newImageCounter = newImageCounter - 1;
            }
            else if (newImageCounter === 1)
                showAlert("Note", "You need at least one service image.");
            break;
        case "":
            if (newImageCounter > 1) {
                document.getElementById(serviceImagePreview).innerHTML = "";
                newImageCounter = newImageCounter - 1;
            }
            else if (newImageCounter === 1)
                showAlert("Note", "You need at least one service image.");
            break;
        case "edit":
            break;

    }
}

function showShareDialog(service_id) {
    var serviceShareDialogs = document.getElementsByClassName("share_dialog");
    for (var counter = 0; counter < serviceShareDialogs.length; counter++){
        if (serviceShareDialogs[counter].id !== "share_dialog_"+service_id)
            serviceShareDialogs[counter].style.display = "none";
    }

    var serviceShareDialog = document.getElementById("share_dialog_"+service_id);

    if (serviceShareDialog.style.display === "none") {
        serviceShareDialog.style.display = "block";
    }
    else {
        serviceShareDialog.style.display = "none";
    }
}

function shareToFacebook(href){
    FB.ui(
        {
            method: 'share',
            display: 'popup',
            href: href,
        }, function(response){
            console.log(response);
        }
    );
}
// function swipeCarousel(){
//     $(document).ready(function() {
//         $(".carousel-inner").swiperight(function() {
//             $("#demo").carousel('prev');
//         });
//         $(".carousel-inner").swipeleft(function() {
//             $("#dem").parent().carousel('next');
//         });
//     });
// }